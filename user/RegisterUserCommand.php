<?php

    namespace user\command;
    use shared\Command;

    require_once __DIR__."/../shared/Command.php";

    final class RegisterUserCommand extends Command{
        
        private $email;
        private $name;
        private $password;

        public function __construct(string $email, string $name, string $password){
            $this->email = $email;
            $this->name = $name;
            $this->password = $password;
        }

        public function getEmail(): string { return $this->email; }
        public function getName(): string { return $this->name; }
        public function getPassword(): string { return $this->password; }

    }

?>