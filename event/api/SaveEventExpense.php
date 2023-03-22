<?php

    use event\command\RegisterEventExpenseCommand;
    use event\executer\RegisterEventExpenseCommandExecuter;

    require_once __DIR__."//..//RegisterEventExpenseCommandExecuter.php";
    
    try {
        $executer = new RegisterEventExpenseCommandExecuter();
        $executer->run(new RegisterEventExpenseCommand($_POST['event_number'], $_POST['expense_type'], floatval($_POST['value'])));
        // $executer->run(new RegisterEventExpenseCommand(1, "Compras Mensal de Alimentação", 130000));
        // $executer->run(new RegisterEventExpenseCommand(1, "Carregamento DSTV", 7600));
    } catch (\RuntimeException $th) {
       echo $th->getMessage();
    }
    
?>