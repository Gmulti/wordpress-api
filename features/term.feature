Feature: Term WordPress
    @Login
    Scenario: Get terms
        When I add "Accept" header equal to "application/json" 
        And I send a "GET" request to "/terms" 

        Then the response status code should be 200
        And the response should be in JSON

        And the header "Content-Type" should be equal to "application/json; charset=utf-8"
        And the JSON nodes string should contain:
        """
        [
          {
            "name": "Category 1",
            "slug": "category-1",
            "termGroup": "0"
          },
          {
            "name": "Category 2",
            "slug": "category-2",
            "termGroup": "0"
          },
          {
            "name": "Category 3",
            "slug": "category-3",
            "termGroup": "0"
          }
        ]
        """