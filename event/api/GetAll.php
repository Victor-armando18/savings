<?php
    
    use event\query\FindAllEventsByUserQuery;
    use event\executer\FindAllEventsByUserQueryExecuter;

    require_once __DIR__."/../FindAllEventsByUserQueryExecuter.php";

    $executer = new FindAllEventsByUserQueryExecuter();
    $listOfEvents = $executer->run(new FindAllEventsByUserQuery($_POST['logged_user']));
    echo json_encode($listOfEvents);

?>