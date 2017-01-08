Feature: Comment WordPress
    @WithoutToken
    Scenario: Get comments without token
        When I add "Accept" header equal to "application/json" 
        And I send a "GET" request to "/commentmetas" 

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
    Scenario: Get comments
        When I add "Accept" header equal to "application/json" 
        And I send a "GET" request to "/commentmetas" 

        Then the response status code should be 200
        And the response should be in JSON

        And the header "Content-Type" should be equal to "application/json; charset=utf-8"
        And the JSON nodes string should contain:
        """
        [
          {
            "metaKey": "_comment_meta_one",
            "metaValue": "A comment meta"
          }
        ]
        """