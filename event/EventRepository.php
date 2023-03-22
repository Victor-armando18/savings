<?php

    namespace event\repository;

    use event\Event;
    use event\EventExpense;

    require_once __DIR__."/Event.php";

    interface EventRepository{
        function save(Event $event): void;
        function registerEventExpense(EventExpense $event): void;
        function containsEventExpense(EventExpense $event): bool;
        function contains(Event $event): bool;
        // function findByYearAndDate(int $year, string $date);
        function findAllByUserEmail(string $value);
        function findAllExpensesByEventNumber(int $value);
    }

?>