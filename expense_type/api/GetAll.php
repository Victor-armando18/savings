<?php

    use expense_type\executer\FindAllExpensesTypesByUserQueryExecuter;
    use expense_type\query\FindAllExpensesTypesByUserQuery;

    require_once __DIR__."/../FindAllExpensesTypesByUserQueryExecuter.php";
    require_once __DIR__."/../ExpenseTypeRepositoryPDOMySQLImpl.php";

    $executer = new FindAllExpensesTypesByUserQueryExecuter();
    $activities = $executer->run(new FindAllExpensesTypesByUserQuery($_POST['logged_user']));
    echo json_encode($activities);

?>