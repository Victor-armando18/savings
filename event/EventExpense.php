<?php

    namespace event;

    final class EventExpense{
        private $eventNumber;
        private $expenseType;
        private $value;

        public function __construct(int $eventNumber, string $expenseType, float $value){
            if(!isset($eventNumber) || $eventNumber == 0) throw new \InvalidArgumentException("Invalid Event Number!");
            if(!isset($expenseType) || empty($expenseType)) throw new \InvalidArgumentException("Select the expense type!");
            $this->eventNumber = $eventNumber;
            $this->expenseType = $expenseType;
            $this->value = $value;
        }

        public function getEventNumber(): int { return $this->eventNumber; }
        public function getExpenseType(): string { return $this->expenseType; }
        public function getValue(): float { return $this->value; }

    }
?>