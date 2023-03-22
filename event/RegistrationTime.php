<?php

    namespace event;

    final class RegistrationTime{
        private $date;
        private $time;

        public function __construct(string $date, string $time) {
            $this->date = $date;
            $this->time = $time;
        }

        public function getDate(): string{ return $this->date; }
        public function getTime(): string { return $this->time; }

    }

?>