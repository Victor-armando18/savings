<?php

    namespace expense_type\repository;

    use expense_type\ExpenseType;

    require_once __DIR__."/ExpenseType.php";

    interface ExpenseTypeRepository{
        
        function save(ExpenseType $expenseType): void;
        function contains(ExpenseType $expenseType): bool;
        function findAllByUserCode(string $value): array;

    }
?>