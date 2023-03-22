<?php
    
    use event\executer\FindAllExpensesByEventQueryExecuter;
    use event\query\FindAllExpenseByEventQuery;

    require_once __DIR__."/../FindAllExpensesByEventQueryExecuter.php";

    $executer = new FindAllExpensesByEventQueryExecuter();
    $listOfEvents = $executer->run(new FindAllExpenseByEventQuery($_POST['event_number']));
    echo json_encode($listOfEvents);

?>