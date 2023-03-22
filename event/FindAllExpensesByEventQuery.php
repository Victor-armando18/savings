<?php

    namespace event\query;
    use shared\Query;

    require_once __DIR__."/../shared/Query.php";

    final class FindAllExpenseByEventQuery extends Query{
        private $eventNumber;
    
        public function __construct(int $eventNumber) {
            $this->eventNumber = $eventNumber;
        }

        public function getEventNumber(): int { return $this->eventNumber; }
    }

?>