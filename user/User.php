<?php

    namespace user;

    final class User{

        private $email;
        private $name;
        private $password;
        
        public function __construct(string $email, string $name, string $password) {
            if(!isset($email) || empty($email)) throw new \InvalidArgumentException("Enter the email");
            if(!isset($name) || empty($name)) throw new \InvalidArgumentException("Enter the name");
            if(!isset($password) || empty($password)) throw new \InvalidArgumentException("Enter the password");
            $this->email = $email;
            $this->name = $name;
            $this->password = md5($password);
        }

        public function getEmail() { return $this->email; }
        
        public function getName() { return $this->name; }
        
        public function getPassword() { return $this->password; }
        
    }

?>