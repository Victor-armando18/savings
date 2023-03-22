<?php

    namespace event\query;

    use shared\Query;
    
    require_once __DIR__."/../shared/Query.php";

    final class FindAllEventsByUserQuery extends Query{

        private $userEmail;

        public function __construct(string $userEmail){
            $this->userEmail = $userEmail;
        }

        public function getUserEmail(): string { return $this->userEmail; }
}

?>