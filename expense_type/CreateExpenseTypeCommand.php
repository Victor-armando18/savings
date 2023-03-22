<?php

    namespace expense_type\command;
    use shared\Command;

    require_once __DIR__."/../shared/Command.php";

    final class CreateExpenseTypeCommand extends Command{

        private $name;
        private $userCode;

        public function __construct(string $name, string $userCode){ 
            $this->name = $name; 
            $this->userCode = $userCode;
        }

        public function getName(): string { return $this->name; }
        public function getUserCode(): string { return $this->userCode; }

    }

?> 