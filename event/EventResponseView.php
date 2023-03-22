<?php

    namespace event;

    require_once __DIR__."/RegistrationTime.php";

    final class EventResponseView{

        private $number;
        private $year;
        private $date;
        private $registrationTime;

        public function __construct(int $number, string $year, string $date, RegistrationTime $registrationTime) {
            $this->number = $number;
            $this->year = $year;
            $this->date = $date;
            $this->registrationTime = $registrationTime;
        }

        public function getNumber(): int { return $this->number; }

        public function getYear(): string { return $this->year; }

        public function getDate(): string{ return $this->date; }

        public function getRegistrationTime(): RegistrationTime{ return $this->registrationTime; }

        static function fillWith($result): self {
            return new EventResponseView(
                $result->numero,
                $result->ano, 
                $result->data, 
                new RegistrationTime($result->data_registro, $result->hora_registro)
            );
        }

    }

?>