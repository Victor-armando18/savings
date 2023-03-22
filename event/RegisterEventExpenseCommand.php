<?php

    namespace event\command;
    use shared\Command;

    require_once __DIR__."/../shared/Command.php";

    final class RegisterEventExpenseCommand extends Command{
        private $eventNumber;
        private $expense;
        private $value;
    
        public function __construct(int $eventNumber, string $expense, float $value) {
            $this->eventNumber = $eventNumber;
            $this->expense = $expense;
            $this->value = $value;
        }
    
        public function getEventNumber(): int { return $this->eventNumber; }
        public function getExpense(): string { return $this->expense; }
        public function getValue(): float { return $this->value; }
        
    }

?>