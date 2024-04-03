<?php

namespace Controllers;

use Services\UserService;
use Exception;
use Firebase\JWT\JWT;

class UserController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new UserService();
    }

    public function login() {
        
        // read user data from request body
        $postedUser = $this->createObjectFromPostedJson("Models\User");

        // get user from db
        $user = $this->service->checkUsernamePassword($postedUser->username, $postedUser->password);

        // if the method returned false, the username and/or password were incorrect
        if (!$user) {
            $this->respondWithError(401, "Invalid login");
        }

        // generate jwt
        $jwt = $this->generateJwt($user);

        // return jwt
        $this->respond($jwt);
    }

    public function generateJwt($user)
    {
        $secret_key = 'SECRET_KEY';

        $issuer = "THE_ISSUER"; // this can be the domain/servername that issues the token
        $audience = "THE_AUDIENCE"; // this can be the domain/servername that checks the token

        $issuedAt = time(); // issued at
        $notbefore = $issuedAt; //not valid before 

        $expire = $issuedAt + 9000;
        $token_payload = array(
            "iss" => $issuer,
            "aud" => $audience,
            "iat" => $issuedAt,
            "nbf" => $notbefore,
            "exp" => $expire,
            "data" => array(
                "id" => $user->id,
                "username" => $user->username,
                "email" => $user->email,
                "role" => $user->role
            )
        );

        // Encode the JWT token
        $jwt = JWT::encode($token_payload, $secret_key, 'HS256'); // error here

        // $this->respondWithError(500, "Error generating token");
        // return;

        return array(
                "message" => "Successful login.",
                "jwt" => $jwt,
                "username" => $user->username,
                "expireAt" => $expire,
                "role" => $user->role
            );
    }
}