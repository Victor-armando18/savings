<?php

    namespace income\executer;

    use income\handler\FindAllIncomesByUserQueryHandler;
    use income\query\FindAllIncomesByUserQuery;
    use income\repository\IncomeRepositoryPDOImpl;
    use shared\QueryExecuter;
    
    require_once __DIR__."/../shared/QueryExecuter.php";
    require_once __DIR__."/FindAllIncomesByUserQueryHandler.php";
    require_once __DIR__."/IncomeRepositoryPDOImpl.php";

    final class FindAllIncomesByUserQueryExecuter extends QueryExecuter{

        public function __construct() {
            parent::__construct(new FindAllIncomesByUserQueryHandler(new IncomeRepositoryPDOImpl()));
        }

        public function run(FindAllIncomesByUserQuery $query){
            $list = [];
            $incomes = parent::execute($query);
            foreach($incomes as $income){
                $list[] = array('year' => $income->getYear(), 'month' => $income->getMonth(), 'value' => $income->getValue());
            }
            return $list;
        }

    }

?>