<?php

    namespace user\query;
    use shared\Query;

    require_once __DIR__."/../shared/Query.php";

    final class AuthenticateUserQuery extends Query{

        private $email;
        private $password; 

        public function __construct(string $email, string $password) {
            if(!isset($email) || empty($email)) throw new \InvalidArgumentException("Enter the email!");
            if(!isset($password) || empty($password)) throw new \InvalidArgumentException("Enter the password!");
            $this->email = $email;
            $this->password = $password;
        }

        public function getEmail(): string { return $this->email; } 
        public function getPassword(): string { return $this->password; } 
        
    }

?>