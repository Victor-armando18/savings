<?php
    
    use user\repository\UserRepositoryPDOMysqlImpl;

    require_once __DIR__."//..//user//UserRepositoryPDOMysqlImpl.php";

    $repository = new UserRepositoryPDOMysqlImpl();
    try {
        $result = $repository->findByCodeAndPassword(20200238, 1234);
        if(isset($result)){
            echo $result->getCode();
            echo " - ";
            echo $result->getName();
        }
    } catch (\RuntimeException $th) {
        echo $th->getMessage();
    }
?>