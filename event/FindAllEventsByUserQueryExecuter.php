<?php

    namespace event\executer;
    use event\query\FindAllEventsByUserQuery;
    use event\repository\EventRepositoryPDOMySQLImpl;
    use event\handler\FindAllEventsByUserQueryHandler;
    use shared\QueryExecuter;
    
    require_once __DIR__."/../shared/QueryExecuter.php";
    require_once __DIR__."/EventRepositoryPDOMySQLImpl.php";
    require_once __DIR__."/FindAllEventsByUserQueryHandler.php";

    final class FindAllEventsByUserQueryExecuter extends QueryExecuter{

        public function __construct(){
            parent::__construct(new FindAllEventsByUserQueryHandler(new EventRepositoryPDOMySQLImpl()));
        }

        public function run(FindAllEventsByUserQuery $query): array{
            $list = [];
            $activities = parent::execute($query);
            foreach($activities as $activity){
                $list[] = array(
                    'number' => $activity->getNumber(),
                    'year' => $activity->getYear(),
                    'date' => $activity->getDate(),
                    'registration_date' => $activity->getRegistrationTime()->getDate(),
                    'registration_time' => $activity->getRegistrationTime()->getTime()
                );
            }
            return $list;
        }

    }

?>