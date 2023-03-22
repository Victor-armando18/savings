<?php
    
    use user\executer\FindAllUsersQueryExecuter;
    use user\handler\FindAllUsersQueryHandler;
    use user\repository\UserRepositoryPDOMysqlImpl;

    require_once __DIR__."/../FindAllUsersQueryExecuter.php";
    require_once __DIR__."/../UserRepositoryPDOMysqlImpl.php";

    $executer = new FindAllUsersQueryExecuter(new FindAllUsersQueryHandler(new UserRepositoryPDOMysqlImpl()));
    $results = $executer->run();
    $resultToArray = [];
    foreach($results as $result){
        $resultToArray[] = array('codigo' => $result->getCode(), 'name' => $result->getName());
    }
    $json = json_encode($resultToArray);
    
    echo "<pre>";
    echo $json;
    echo "</pre>";

?>