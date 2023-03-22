<?php

    namespace income\query;
    use shared\Query;

    require_once __DIR__."/../shared/Query.php";

    final class FindAllIncomesByUserQuery extends Query{
        private $userEmail;

        public function __construct(string $userEmail){
            $this->userEmail = $userEmail;
        }

        public function getUserEmail(): string { return $this->userEmail; }

    }

?>