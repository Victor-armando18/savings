<?php
    
    use user\executer\AuthenticateUserQueryExecuter;
    use user\query\AuthenticateUserQuery;

    require_once __DIR__."/../AuthenticateUserQueryExecuter.php";

    try {
        $executer = new AuthenticateUserQueryExecuter();
        $query = new AuthenticateUserQuery($_POST['email'], $_POST['password']);
        $result = $executer->run($query);
        $resultToArray = array('email' => $result->getEmail(), 'name' => $result->getName());
        session_start();
        $_SESSION['logged_user'] = $_POST['email'];
        echo json_encode($resultToArray);
    } catch (\Exception $error) {
        echo json_encode(array('error' => $error->getMessage()));
    }

?>