<?php
    use expense_type\command\CreateExpenseTypeCommand;
    use expense_type\executer\CreateExpenseTypeExecuter;

    require_once __DIR__."/../CreateExpenseTypeCommandExecuter.php";
    $executer = new CreateExpenseTypeExecuter();
    $executer->run(new CreateExpenseTypeCommand($_POST['name'], $_POST['logged_user']));
?>