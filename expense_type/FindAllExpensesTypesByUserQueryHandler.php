<?php

    namespace expense_type\handler;

    use expense_type\query\FindAllExpensesTypesByUserQuery;
    use expense_type\repository\ExpenseTypeRepository;
    use shared\Query;
    use shared\QueryHandler;

    require_once __DIR__."/../shared/QueryHandler.php";
    require_once __DIR__."/FindAllExpensesTypeByUserQuery.php";

    final class FindAllExpensesTypesByUserQueryHandler implements QueryHandler{

        private $reposiory;

        public function __construct(ExpenseTypeRepository $repository) {
            $this->reposiory = $repository;
        }

        function handle(Query $query = null): array{
            if(!($query instanceof FindAllExpensesTypesByUserQuery)) return [];
            return $this->reposiory->findAllByUserCode($query->getUserCode());
        }
    }

?>