Feature: Post WordPress
    @Login
    Scenario: Get posts
        When I add "Accept" header equal to "application/json" 
        And I send a "GET" request to "/postmetas" 

        Then the response status code should be 200
        And the response should be in JSON

        And the header "Content-Type" should be equal to "application/json; charset=utf-8"
        And the JSON nodes string should contain:
        """
        [
          {
            "metaKey": "_meta_post_1",
            "metaValue": "One meta post 1",
            "metaId": "1"
          }
        ]
        """

