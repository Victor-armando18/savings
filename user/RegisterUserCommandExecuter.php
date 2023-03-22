<?php

    namespace user\executer;
    use shared\CommandExecuter;
    use user\command\RegisterUserCommand;
    use user\handler\RegisterUserCommandHandler;

    require_once __DIR__."/../shared/CommandExecuter.php";
    require_once __DIR__."/RegisterUserCommandHandler.php";

    final class RegisterUserCommandExecuter extends CommandExecuter{
        
        public function __construct(RegisterUserCommandHandler $commandHandler) {
            parent::__construct($commandHandler);
        }

        public function run(RegisterUserCommand $command){
            parent::execute($command);
            echo "<p class='success'>Account created with success!<?p>";
        }

    }

?>