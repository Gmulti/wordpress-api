Feature: Comment WordPress
    @WithoutToken
    Scenario: Get comments without token
    When I add "Accept" header equal to "application/json" 
    And I send a "GET" request to "/comments" 

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
        And I send a "GET" request to "/comments" 

        Then the response status code should be 200
        And the response should be in JSON

        And the header "Content-Type" should be equal to "application/json; charset=utf-8"
        And the JSON should be equal to:
        """
        [
          {
            "commentPostId": "1",
            "commentAuthor": "Doctor strange",
            "commentAuthorEmail": "doctor@strange.com",
            "commentAuthorUrl": "http://doctorstrange.com",
            "commentAuthorIp": "",
            "commentDate": "2016-12-25T17:26:55+01:00",
            "commentDateGmt": "2016-12-25T17:26:55+01:00",
            "commentContent": "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex cupiditate, quo possimus. Asperiores hic temporibus dolores voluptates vel vero, cumque expedita ipsam aut veritatis perspiciatis dicta, iste minus, optio facilis?",
            "commentKarma": 0,
            "commentApproved": "1",
            "commentAgent": "",
            "commentType": "",
            "commentParent": "0",
            "userId": "0",
            "commentId": "1"
          }
        ]
        """