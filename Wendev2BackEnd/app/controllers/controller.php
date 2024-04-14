<?php
namespace Controllers;

use Exception;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class Controller {
    
    function checkForJwt() {
        // Check for token header
        if(!isset($_SERVER['HTTP_AUTHORIZATION'])) {
           $this->respondWithError(401, "No token provided");
           die();
       }

       // Read JWT from header
       $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
       // Strip the part "Bearer " from the header
       $arr = explode(" ", $authHeader);
       $jwt = $arr[1];

       // Decode JWT
       $secret_key = "SECRET_KEY";

       if ($jwt) {
           try {
               $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));

               $current_time = time();
               if ($decoded->exp < $current_time) {
                   $this->respondWithError(401, "Token expired");
                   die();
               }
               return $decoded;
           } catch (Exception $e) {
               $this->respondWithError(401, $e->getMessage());
               die();
           }
       }
   }

   public function checkJwtRole($role) {
       $decodedJWT = $this->checkForJwt();
       if(!$decodedJWT || $decodedJWT->data->role != $role) {
           $this->respondWithError(401, "Unauthorized");
           die();
       }
       return true;
    }

    function respond($data) {
        $this->respondWithCode(200, $data);
    }

    function respondWithError($httpcode, $message) {
        $data = array('errorMessage' => $message);
        $this->respondWithCode($httpcode, $data);
    }

    private function respondWithCode($httpcode, $data) {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($httpcode);
        echo json_encode($data);
    }

    function createObjectFromPostedJson($className) {
        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $object = new $className();
        foreach ($data as $key => $value) $object->{$key} = $value;
        return $object;
    }
}