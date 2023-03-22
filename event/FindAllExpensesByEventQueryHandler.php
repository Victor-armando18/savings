<?php

    namespace event\handler;

    use event\query\FindAllExpenseByEventQuery;
    use event\repository\EventRepository;
    use shared\Query;
    use shared\QueryHandler;

    require_once __DIR__."/../shared/QueryHandler.php";
    require_once __DIR__."/FindAllExpensesByEventQuery.php";

    final class FindAllExpensesByEventQueryHandler implements QueryHandler{
        
        private $repository;

        public function __construct(EventRepository $repository){
            $this->repository = $repository;
        }

        public function handle(Query $query = null) {
            if(!($query instanceof FindAllExpenseByEventQuery)) return [];
            return $this->repository->findAllExpensesByEventNumber($query->getEventNumber());
        }
    }

?>