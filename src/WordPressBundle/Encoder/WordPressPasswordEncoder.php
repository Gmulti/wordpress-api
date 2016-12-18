<?php

namespace WordPressBundle\Encoder;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class WordPressPasswordEncoder implements PasswordEncoderInterface
{   
    const MAX_PASSWORD_LENGTH = 4096;
    
    public function __construct($iteration_count_log2, $portable_hashes){
        $this->itoa64    = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        if ($iteration_count_log2 < 4 || $iteration_count_log2 > 31){
            $iteration_count_log2 = 8;
        }

        $this->iteration_count_log2 = $iteration_count_log2;
        $this->portable_hashes      = $portable_hashes;
        $this->random_state         = microtime() . uniqid(rand(), TRUE);
    }

    public function comparePasswords($password1, $password2){
        return hash_equals($password1, $password2);
    }

    public function encode64($input, $count){
        $output = '';
        $i = 0;
        do {
            $value = ord($input[$i++]);
            $output .= $this->itoa64[$value & 0x3f];
            if ($i < $count)
                $value |= ord($input[$i]) << 8;
            $output .= $this->itoa64[($value >> 6) & 0x3f];
            if ($i++ >= $count)
                break;
            if ($i < $count)
                $value |= ord($input[$i]) << 16;
            $output .= $this->itoa64[($value >> 12) & 0x3f];
            if ($i++ >= $count)
                break;
            $output .= $this->itoa64[($value >> 18) & 0x3f];
        } while ($i < $count);

        return $output;
    }

    protected function encodePasswordUpTo32($password, $setting){

        $output = '*0';
        if (substr($setting, 0, 2) == $output){
            $output = '*1';
        }

        $id = substr($setting, 0, 3);

        if ($id != '$P$' && $id != '$H$'){
            return $output;
        }

        $count_log2 = strpos($this->itoa64, $setting[3]);
        if ($count_log2 < 7 || $count_log2 > 30){
            return $output;
        }

        $count = 1 << $count_log2;

        $salt = substr($setting, 4, 8);
        if (strlen($salt) != 8){
            return $output;
        }

        if (PHP_VERSION >= '5') {
            $hash = md5($salt . $password, TRUE);
            do {
                $hash = md5($hash . $password, TRUE);
            } while (--$count);
        } else {
            $hash = pack('H*', md5($salt . $password));
            do {
                $hash = pack('H*', md5($hash . $password));
            } while (--$count);
        }

        $output = substr($setting, 0, 12);
        $output .= $this->encode64($hash, 16);

        if ($output[0] == '*'){
            $output = crypt($password, $stored_hash);
        }

        return $output;
    }

    protected function encodePasswordLessTo32($password){
        return md5($password);
    }

    /**
     * {@inheritdoc}
     */
    public function encodePassword($password, $encoded)
    {
        if ($this->isPasswordTooLong($password)) {
            throw new BadCredentialsException('Invalid password.');
        }

        if ( strlen($encoded) <= 32 ) {
            return $this->encodePasswordLessTo32($password);
        }

        return $this->encodePasswordUpTo32($password, $encoded);
        
    }

    public function isPasswordValid($encoded, $password, $salt)
    {

        return !$this->isPasswordTooLong($password) && $this->comparePasswords($encoded, $this->encodePassword($password, $encoded));
    }


    protected function isPasswordTooLong($password)
    {
        return strlen($password) > static::MAX_PASSWORD_LENGTH;
    }

}