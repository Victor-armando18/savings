<?php

    namespace income\handler;

    use income\repository\IncomeRepository;
    use income\query\FindAllIncomesByUserQuery;
    use shared\Query;
    use shared\QueryHandler;

    require_once __DIR__."/../shared/QueryHandler.php";
    require_once __DIR__."/FindAllIncomesByUserQuery.php";

    final class FindAllIncomesByUserQueryHandler implements QueryHandler{
        private $repository;

        public function __construct(IncomeRepository $repository){
            $this->repository = $repository;
        }

        public function handle(Query $query = null) {
            if(!($query instanceof FindAllIncomesByUserQuery)) return [];
            return $this->repository->findAllByUserEmail($query->getUserEmail());
        }
    }

?>