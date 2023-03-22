<?php

    namespace expense_type\executer;

    use expense_type\handler\FindAllExpensesTypesByUserQueryHandler;
    use expense_type\query\FindAllExpensesTypesByUserQuery;
    use expense_type\repository\ExpenseTypeRepositoryPDOMySQLImpl;
    use shared\QueryExecuter;

    require_once __DIR__."/FindAllExpensesTypesByUserQueryHandler.php";
    require_once __DIR__."/ExpenseTypeRepositoryPDOMySQLImpl.php";
    require_once __DIR__."/../shared/QueryExecuter.php";

    final class FindAllExpensesTypesByUserQueryExecuter extends QueryExecuter{

        public function __construct() {
            parent::__construct(new FindAllExpensesTypesByUserQueryHandler(new ExpenseTypeRepositoryPDOMySQLImpl()));
        }

        public function run(FindAllExpensesTypesByUserQuery $query): array{
            $list = [];
            $activities = parent::execute($query);
            foreach($activities as $activity){
                $list[] = array('name' => $activity);
            }
            return $list;
        }
    }

?>