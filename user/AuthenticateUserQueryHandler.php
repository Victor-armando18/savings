<?php

    namespace event\handler;

    use shared\Query;
    use shared\QueryHandler;
    use user\query\AuthenticateUserQuery;
    use user\repository\UserRepository;

    require_once __DIR__."/../shared/QueryHandler.php";
    require_once __DIR__."/AuthenticateUserQuery.php";

    final class AuthenticateUserQueryHandler implements QueryHandler{

        private $repository;
        
        public function __construct(UserRepository $repository) {
            $this->repository = $repository;
        }

        public function handle(Query $query = null) {
            if(!($query instanceof AuthenticateUserQuery)) return;
            $foundedUser = $this->repository->findByEmailAndPassword($query->getEmail(), md5($query->getPassword()));
            if(!isset($foundedUser)) throw new \RuntimeException("User not founded!");
            return $foundedUser;
        }
    }
?>