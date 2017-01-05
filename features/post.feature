Feature: Post WordPress
    @Login
    Scenario: Get posts
        When I add "Accept" header equal to "application/json" 
        And I send a "GET" request to "/posts" 

        Then the response status code should be 200
        And the response should be in JSON

        And the header "Content-Type" should be equal to "application/json; charset=utf-8"
        And the JSON nodes string should contain:
        """
        [
          {
            "postAuthor": "1",
            "postDate": "2017-01-05T19:20:42+01:00",
            "postDateGmt": "2017-01-05T19:20:42+01:00",
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
            "postModified": "2017-01-05T19:20:42+01:00",
            "postModifiedGmt": "2017-01-05T19:20:42+01:00",
            "postContentFiltered": "",
            "postParent": "0",
            "guid": "",
            "menuOrder": 0,
            "postType": "post",
            "postMimeType": "",
            "commentCount": "0"
          },
          {
            "postAuthor": "1",
            "postDate": "2017-01-05T19:20:42+01:00",
            "postDateGmt": "2017-01-05T19:20:42+01:00",
            "postContent": "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eligendi provident quam eveniet sint nesciunt consequuntur reprehenderit velit est molestiae, quisquam, repellendus, aliquid delectus natus! Et optio asperiores, commodi dignissimos. <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam rem nemo animi consequatur optio aut unde numquam, sed cumque ullam labore explicabo necessitatibus mollitia consectetur. Et quasi hic inventore ratione.</div>\n        <div>Amet recusandae maiores dolores sequi voluptate quas, quis incidunt molestias commodi qui accusamus labore ipsum, quibusdam culpa voluptatem sapiente. Non voluptatem eum commodi ipsa labore eveniet! Iusto voluptates sint, dolores.</div>",
            "postTitle": "Lorem ipsum 2",
            "postExcerpt": "lorem ipsum dolor sit 2",
            "postStatus": "publish",
            "commentStatus": "open",
            "pingStatus": "open",
            "postPassword": "",
            "postName": "-1",
            "toPing": "",
            "pinged": "",
            "postModified": "2017-01-05T19:20:42+01:00",
            "postModifiedGmt": "2017-01-05T19:20:42+01:00",
            "postContentFiltered": "",
            "postParent": "0",
            "guid": "",
            "menuOrder": 0,
            "postType": "post",
            "postMimeType": "",
            "commentCount": "0"
          }
        ]
        """