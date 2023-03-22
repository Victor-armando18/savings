<?php

    namespace income\command;
    use shared\Command;

    require_once __DIR__."//..//shared/Command.php";

    abstract class AbstractIncomeComman extends Command{

        private $user;
        private $year;
        private $month;
        private $value;

        public function ofUser(string $value): self{
            $this->user = $value;
            return $this;
        }
        public function inYear(int $value): self{
            $this->year = $value;
            return $this;
        }

        public function andMonth(int $value): self{
            $this->month = $value;
            return $this;
        }

        public function withValue(float $value): self{
            $this->value = $value;
            return $this;
        }

        public function getUser(): string { return $this->user; }
        public function getYear(): int { return $this->year; }
        public function getMonth(): int { return $this->month; }
        public function getValue(): float { return $this->value; }

    }

?>