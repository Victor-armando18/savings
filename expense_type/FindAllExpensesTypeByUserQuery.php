<?php

    namespace expense_type\query;
    use shared\Query;

    final class FindAllExpensesTypesByUserQuery extends Query{
        private $userCode;

        public function __construct(string $userCode) {
            $this->userCode = $userCode;
        }

        public function getUserCode(): string { return $this->userCode; }

    }
?>