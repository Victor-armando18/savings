<?php

    namespace income;

    final class IncomeResponseView{
        private $year;
        private $month;
        private $value;

        private function __construct(int $year, int $month, float $value) {
            $this->year = $year;
            $this->month = $month;
            $this->value = $value;
        }

        public function getYear(): int { return $this->year; }
        public function getMonth(): int { return $this->month; }
        public function getValue(): string { return number_format($this->value, 2, ',', '.'); }

        static function fillWith($result): self{
            $response = new IncomeResponseView($result->ano, $result->mes, $result->valor);
            return $response;
        }

    }

?>