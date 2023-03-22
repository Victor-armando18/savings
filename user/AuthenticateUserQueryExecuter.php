<?php

    namespace user\executer;

    use event\handler\AuthenticateUserQueryHandler;
    use shared\QueryExecuter;
    use user\query\AuthenticateUserQuery;
    use user\repository\UserRepositoryPDOMysqlImpl;

    require_once __DIR__."/../shared/QueryExecuter.php";
    require_once __DIR__."/AuthenticateUserQuery.php";
    require_once __DIR__."/AuthenticateUserQueryHandler.php";
    require_once __DIR__."/UserRepositoryPDOMysqlImpl.php";

    final class AuthenticateUserQueryExecuter extends QueryExecuter{

        public function __construct() {
            parent::__construct(new AuthenticateUserQueryHandler(new UserRepositoryPDOMysqlImpl()));
        }

        public function run(AuthenticateUserQuery $query){
            return parent::execute($query);
        }

    }

?>