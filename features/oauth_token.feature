
Feature: Connect with oauth
    Scenario:
        When I send a "POST" request to "/oauth/token" with body:
        """
        {
            "client_id": "client_id_1",
            "client_secret": "client_secret_1",
            "username": "admin",
            "password": "admin",
            "scope": "user",
            "grant_type": "password"
        }
        """
        Then the response status code should be 200
        And the response should be in JSON
        And the header "Content-Type" should be equal to "application/json"
        And the JSON node "expires_in" should be equal to "86400"
        And the JSON node "scope" should be equal to "user"
        And the JSON node "token_type" should be equal to "Bearer"
       