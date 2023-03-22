<?php

    use income\command\RegisterIncomeCommand;
    use income\executer\RegisterIncomeCommandExecuter;

    require_once __DIR__."//../RegisterIncomeCommandExecuter.php";

    $executer = new RegisterIncomeCommandExecuter();
    $registerIcomeCommand = new RegisterIncomeCommand();
    $registerIcomeCommand
    ->ofUser($_POST['logged_user'])
    ->inYear($_POST['year'])
    ->andMonth($_POST['month'])
    ->withValue(floatval($_POST['value']));
    $executer->run($registerIcomeCommand);
?>