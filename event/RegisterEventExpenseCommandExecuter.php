<?php

    namespace event\executer;

    use event\command\RegisterEventExpenseCommand;
    use event\handler\RegisterEventExpenseCommandHandler;
    use event\repository\EventRepositoryPDOMySQLImpl;
    use shared\CommandExecuter;

    require_once __DIR__."/../shared/CommandExecuter.php";
    require_once __DIR__."/EventRepositoryPDOMySQLImpl.php";
    require_once __DIR__."/RegisterEventExpenseCommandHandler.php";

    final class RegisterEventExpenseCommandExecuter extends CommandExecuter{

        public function __construct(){
            parent::__construct(new RegisterEventExpenseCommandHandler(new EventRepositoryPDOMySQLImpl()));
        }

        public function run(RegisterEventExpenseCommand $command): void{
            try {
                parent::execute($command);
                echo "<p class='success'>Expense registered with success!</p>";
            } catch (\Exception $error) {
                echo "<p class='error'>".$error->getMessage()."</p>";
            }
        }

    }
?>