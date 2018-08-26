# REST API with OAuth2
In today's world, RESTful web services are very popular as they allow data transfer between two hosts and run over HTTP giving several advantages over other web services such as SOAP. However many APIs are used to transfer private data and therefore an authentication process is to be implemented. One of the popular authentication frameworks is the OAuth2 framework. This project utilizes the popular PHP MVC framework, Symfony 4.1, as the backbone of the application and the FOSUserBundle & FOSOAuthServerBundle. The FOSUserBundle is just a wrapper around the typical Symfony built-in user authentication process so if you were to create your own user authentication provider, you would have to edit the security.yaml config file. And the FOSOAuthServerBundle enables the OAuth2 functionality. Before you utilize this functionality, be sure to understand how OAuth2 works.

<strong>Note:</strong>
Before you run this project, here are a couple things you need to do:
1. Go to this path: /vendor/friendsofsymfony/oauth-server-bundle/Resources/config/routing
2. You will see two routing files: authorize.xml and token.xml. Open each of them up and modify the route so that it doesn't include "v2" in it. The reason for this is aesthetic purposes of the URL and also enables you to write your own version routes. Here's what token.xml and authorize.xml should look like respectively:
    ```xml 
     <route id="fos_oauth_server_token" path="/oauth/token" methods="GET POST">
            <default key="_controller">fos_oauth_server.controller.token:tokenAction</default>
     </route>
     <route id="fos_oauth_server_authorize" path="/oauth/auth" methods="GET POST">
        <default key="_controller">fos_oauth_server.controller.authorize:authorizeAction</default>
    </route>
    ```

## HTTP Requests
Here is what the http request for getting the token should look like: <br>
![](https://github.com/myasir2/PHP/blob/REST_API_with_OAuth2.0/http-token-request.JPG)

Here is what the http message request should look like: <br>
![](https://github.com/myasir2/PHP/blob/REST_API_with_OAuth2.0/http-message-request.JPG)
