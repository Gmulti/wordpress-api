Feature: Option WordPress
    @WithoutToken
    Scenario: Get user metas without Login
    When I add "Accept" header equal to "application/json" 
    And I send a "GET" request to "/usermetas" 

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
    Scenario: Get user metas
        When I add "Accept" header equal to "application/json" 
        And I send a "GET" request to "/usermetas" 

        Then the response status code should be 200
        And the response should be in JSON

        And the header "Content-Type" should be equal to "application/json; charset=utf-8"
        And the JSON nodes string should contain:
        """
        [
          {
            "metaKey": "nickname",
            "metaValue": "Big Admin"
          },
          {
            "metaKey": "first_name",
            "metaValue": "John"
          },
          {
            "metaKey": "last_name",
            "metaValue": "Snow"
          }
        ]
        """