<?php

    namespace income\executer;

    use income\command\RegisterIncomeCommand;
    use income\handler\RegisterIncomeCommandHandler;
    use income\repository\IncomeRepositoryPDOImpl;
    use shared\CommandExecuter;

    require_once __DIR__."//..//shared/CommandExecuter.php";
    require_once __DIR__."//IncomeRepositoryPDOImpl.php";
    require_once __DIR__."//RegisterIncomeCommand.php";
    require_once __DIR__."//RegisterIncomeCommandHandler.php";

    final class RegisterIncomeCommandExecuter extends CommandExecuter{

        public function __construct(){
            parent::__construct(new RegisterIncomeCommandHandler(new IncomeRepositoryPDOImpl()));
        }
        
        public function run(RegisterIncomeCommand $command): void {
            try {
                parent::execute($command);
                echo "<p class='success'>Income registered with success!</p>";
            } catch (\Exception $error) {
                echo "<p class='error'>".$error->getMessage()."</p>";
            }
        }

    }

?>