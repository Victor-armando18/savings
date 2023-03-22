<?php

    use income\executer\FindAllIncomesByUserQueryExecuter;
    use income\query\FindAllIncomesByUserQuery;

    require_once __DIR__."/../FindAllIncomesByUserQueryExecuter.php";

    $executer = new FindAllIncomesByUserQueryExecuter();
    $incomes = $executer->run(new FindAllIncomesByUserQuery($_POST['logged_user']));
    echo json_encode($incomes);

?>