<?php

    namespace event\handler;

    use event\query\FindAllEventsByUserQuery;
    use event\repository\EventRepository;
    use shared\Query;
    use shared\QueryHandler;

    require_once __DIR__."/../shared/QueryHandler.php";
    require_once __DIR__."/FindAllEventsByUserQuery.php";

    final class FindAllEventsByUserQueryHandler implements QueryHandler{
        
        private $repository;

        public function __construct(EventRepository $repository) {
            $this->repository = $repository;
        }

        public function handle(Query $query = null){
            if(!($query instanceof FindAllEventsByUserQuery)) return [];
            return $this->repository->findAllByUserEmail($query->getUserEmail());
        }

    }
?>