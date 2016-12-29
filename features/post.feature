Feature: Post WordPress
    @Login
    Scenario: Get posts
        When I add "Accept" header equal to "application/json" 
        And I send a "GET" request to "/posts" 

        Then the response status code should be 200
        And the response should be in JSON

        And the header "Content-Type" should be equal to "application/json; charset=utf-8"
        And the JSON should be equal to:
        """
        [
          {
            "postAuthor": "1",
            "postDate": "2016-12-25T17:26:55+01:00",
            "postDateGmt": "2016-12-25T17:26:55+01:00",
            "postContent": "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eligendi provident quam eveniet sint nesciunt consequuntur reprehenderit velit est molestiae, quisquam, repellendus, aliquid delectus natus! Et optio asperiores, commodi dignissimos.",
            "postTitle": "Lorem ipsum",
            "postExcerpt": "lorem ipsum dolor sit",
            "postStatus": "publish",
            "commentStatus": "open",
            "pingStatus": "open",
            "postPassword": "",
            "postName": "",
            "toPing": "",
            "pinged": "",
            "postModified": "2016-12-25T17:26:55+01:00",
            "postModifiedGmt": "2016-12-25T17:26:55+01:00",
            "postContentFiltered": "",
            "postParent": "0",
            "guid": "",
            "menuOrder": 0,
            "postType": "post",
            "postMimeType": "",
            "commentCount": "0",
            "id": "5"
          }
        ]
        """