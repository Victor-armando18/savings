<?php

    use income\command\DeleteIncomeCommand;
    use income\executer\DeleteIncomeCommandExecuter;
    use shared\MoneyToFloatFormatter;
    
    require_once __DIR__."//../DeleteIncomeCommandExecuter.php";
    require_once __DIR__."/../../shared/MoneyToFloatFormatter.php";

    $json = json_decode($_POST['data']);

    $executer = new DeleteIncomeCommandExecuter();
    $registerIcomeCommand = new DeleteIncomeCommand();
    $moneyFormatter = new MoneyToFloatFormatter($json->value);
    $registerIcomeCommand
    ->ofUser($json->user)
    ->inYear($json->year)
    ->andMonth($json->month)
    ->withValue($moneyFormatter->format());
    $executer->run($registerIcomeCommand);
?>