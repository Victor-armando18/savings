<?php

    namespace income;

    use InvalidArgumentException;

    final class Income{
        
        private $user;
        private $year;
        private $month;
        private $value;

        public function __construct(string $user, int $year, int $month, float $value) {
            if(!isset($user) || empty($user)) new InvalidArgumentException("Invalid user!");
            if(!isset($year)) new InvalidArgumentException("Enter the Year");
            if(!isset($month)) new InvalidArgumentException("Enter the month");
            $this->user = $user;
            $this->year = $year;
            $this->month = $month;
            $this->value = $value;
        }

        public function getUser(): string { return $this->user; }
        public function getYear(): int { return $this->year; }
        public function getMonth(): int { return $this->month; }
        public function getValue(): string { return $this->value; }

    }

?>