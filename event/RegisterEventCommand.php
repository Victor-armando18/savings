<?php

    namespace event\command;
    
    use shared\Command;

    require_once __DIR__."//../shared/Command.php";

    final class RegisterEventCommand extends Command{

        private $userEmail;
        private $year;
        private $date;

        public function __construct(string $userEmail, int $year, string $date){
            $this->userEmail = $userEmail;
            $this->year = $year;
            $this->date = $date;
        }
        
        public function getUserEmail(): string{ return $this->userEmail; }

        public function getYear(): int{ return $this->year; }

        public function getDate(): string{ return $this->date; }

    }

?>