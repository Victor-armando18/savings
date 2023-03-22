<?php

    namespace income\repository;

    use income\Income;

    require_once __DIR__."\\Income.php";

    interface IncomeRepository{
        function register(Income $income): void;
        function delete(Income $income): void;
        function contains(Income $income): bool;
        function findAllByUserEmail(string $value);
    }

?>