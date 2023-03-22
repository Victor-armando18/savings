<?php

    use user\command\RegisterUserCommand;
    use user\executer\RegisterUserCommandExecuter;
    use user\handler\RegisterUserCommandHandler;
    use user\repository\UserRepositoryPDOMysqlImpl;

    require_once __DIR__."/../RegisterUserCommandExecuter.php";
    require_once __DIR__."/../UserRepositoryPDOMysqlImpl.php";

    try {
        $executer = new RegisterUserCommandExecuter(new RegisterUserCommandHandler(new UserRepositoryPDOMysqlImpl()));
        $command = new RegisterUserCommand($_POST['email'], $_POST['name'], $_POST['password']);
        $executer->run($command);
    } catch (\Exception $error) {
        echo  "<p class='error'>".$error->getMessage()."</p>";
    }

?>