<?php

    namespace event\executer;
    use event\handler\FindAllExpensesByEventQueryHandler;
    use event\query\FindAllExpenseByEventQuery;
    use event\repository\EventRepositoryPDOMySQLImpl;
    use shared\QueryExecuter;
    
    require_once __DIR__."/../shared/QueryExecuter.php";
    require_once __DIR__."/EventRepositoryPDOMySQLImpl.php";
    require_once __DIR__."/FindAllExpensesByEventQueryHandler.php";

    final class FindAllExpensesByEventQueryExecuter extends QueryExecuter{

        public function __construct(){
            parent::__construct(new FindAllExpensesByEventQueryHandler(new EventRepositoryPDOMySQLImpl()));
        }

        public function run(FindAllExpenseByEventQuery $query): array{
            $list = [];
            $activities = parent::execute($query);
            foreach($activities as $activity){
                $list[] = array(
                    'expense' => $activity->getExpense(),
                    'value' => $activity->getValue()
                );
            }
            return $list;
        }

    }

?>