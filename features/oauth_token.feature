
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
        And the JSON nodes string should contain:
        """
        {
            "expires_in": 86400,
            "token_type":"Bearer",
            "scope":"user"
        }
        """