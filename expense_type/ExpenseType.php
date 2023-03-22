<?php

    namespace expense_type;

    final class ExpenseType{

        private $name;
        private $userCode;

        public function __construct(string $name, string $userCode){ 
            if(!isset($name) || empty($name)) throw new \InvalidArgumentException("Write an expense type!");
            if(!isset($userCode) || empty($userCode)) throw new \RuntimeException("User not identified!");
            $this->name = $name; 
            $this->userCode =$userCode;
        }

        public function getName(): string { return $this->name; }        
        public function getUserCode(): string { return $this->userCode; }        
    }

?>