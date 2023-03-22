<?php

    namespace shared;

    require_once __DIR__."//Query.php";
    require_once __DIR__."//QueryHandler.php";

    abstract class QueryExecuter{
        
        private $queryHanlder;

        protected function __construct(QueryHandler $queryHandler) {
            $this->queryHanlder = $queryHandler;
        }

        protected function execute(Query $query = null) {
            return $this->queryHanlder->handle($query);
        }

    }

?>