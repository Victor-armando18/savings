<?php

    namespace event;

    require_once __DIR__."/EventExpense.php";

    final class Event{

        private $user;
        private $number;
        private $year;
        private $date;
        private $expensesTypes = [];

        public function __construct(string $user, int $year, string $date) {
            if(!isset($user) || empty($user)) throw new \InvalidArgumentException("Invalid user!");
            $this->user = $user;
            if(isset($year) && !empty($year)) $this->year = $year;
            if(isset($date) && !empty($date)) $this->date = date_format(new \DateTime($date), "Y-m-d");
            if($user != "1" && empty($date))  throw new \InvalidArgumentException("Invalid date!");
        }

        public static function withNumber(int $value): self{
            $event = new Event("1",0, "");
            $event->setNumber($value);
            return $event;
        }
        

        private function setNumber(int $value): void{
            $this->number = $value;
        }

        public function getUser(): string{
            return $this->user;
        }

        public function getNumber(): int{
            return $this->number;
        }

        public function getYear(): int{
            return $this->year;
        }

        public function getDate(): string {
            return $this->date;
        }

        public function add(EventExpense $eventExpense): void {
            $this->expensesTypes[] = $eventExpense;
        }

        public function getAllExpenses(){
            return $this->expensesTypes;
        }

        public function getSubtotal(): float{
            $sum = 0;
            foreach($this->expensesTypes as $exp){
                $sum += $exp->getValue();
            }
            return $sum;
        }

    }

?>