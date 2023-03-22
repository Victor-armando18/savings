<?php

    namespace user\handler;
    use shared\Query;
    use shared\QueryHandler;
    use user\repository\UserRepository;

    require_once __DIR__."/../shared/QueryHandler.php";

    final class FindAllUsersQueryHandler implements QueryHandler{
        
        private $repository;

        public function __construct(UserRepository $repository){
            $this->repository = $repository;
        }

        public function handle(Query $query = null) {
            return $this->repository->findAll();
        }
    }

?>