<?php

    namespace event;

    final class EventExpenseResponseView{

        private $expense;
        private $value;

        private function __construct(string $expense, float $value) {
            $this->expense = $expense;
            $this->value = $value;
        }

        public function getExpense(): string { return $this->expense; }
        public function getValue(): string { return number_format($this->value, 2, ',', '.'); }

        static function fillWith($result): self {
            return new EventExpenseResponseView($result->despesa, $result->valor);
        }

    }

?>