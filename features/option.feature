Feature: Option WordPress
    @WithoutToken
    Scenario: Get options without Login
    When I add "Accept" header equal to "application/json" 
    And I send a "GET" request to "/options" 

    Then the response status code should be 401
    And the response should be in JSON
    And the JSON should be equal to:
    """
    {
      "error": "missing_authorization_headers",
      "error_description": "Missing authorization headers"
    }
    """

    @Login
    Scenario: Get options
        When I add "Accept" header equal to "application/json" 
        And I send a "GET" request to "/options" 

        Then the response status code should be 200
        And the response should be in JSON

        And the header "Content-Type" should be equal to "application/json; charset=utf-8"
        And the JSON nodes string should contain:
        """
        [
          {
            "optionName": "siteurl",
            "optionValue": "http://wordpress.local/",
            "autoload": "yes"
          },
          {
            "optionName": "home",
            "optionValue": "http://wordpress.local/",
            "autoload": "yes"
          },
          {
            "optionName": "blogname",
            "optionValue": "WordPress API Project",
            "autoload": "yes"
          },
          {
            "optionName": "blogdescription",
            "optionValue": "Don't panic !",
            "autoload": "yes"
          },
          {
            "optionName": "users_can_register",
            "optionValue": "0",
            "autoload": "yes"
          },
          {
            "optionName": "admin_email",
            "optionValue": "email@mail.com",
            "autoload": "yes"
          },
          {
            "optionName": "start_of_week",
            "optionValue": "1",
            "autoload": "yes"
          },
          {
            "optionName": "date_format",
            "optionValue": "j F Y",
            "autoload": "yes"
          }
        ]
        """