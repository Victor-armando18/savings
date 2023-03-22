<?php

    use event\command\RegisterEventCommand;
    use event\executer\RegisterEventCommandExecuter;

    require_once __DIR__."//..//RegisterEventCommadExecuter.php";
    
    $executer = new RegisterEventCommandExecuter();
    $executer->run(new RegisterEventCommand($_POST['logged_user'],$_POST['year'], $_POST['date']));
    
?>