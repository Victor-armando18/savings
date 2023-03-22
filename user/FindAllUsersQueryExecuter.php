<?php

    namespace user\executer;

    use shared\QueryExecuter;
    use user\handler\FindAllUsersQueryHandler;
    use user\query\FindAllUsersQuery;

    require_once __DIR__."/FindAllUsersQueryHandler.php";
    require_once __DIR__."/../shared/QueryExecuter.php";

    final class FindAllUsersQueryExecuter extends QueryExecuter{

        public function __construct(FindAllUsersQueryHandler $queryHandler){
            parent::__construct($queryHandler);
        }

        public function run(){
            return parent::execute();
        }

    }

?>