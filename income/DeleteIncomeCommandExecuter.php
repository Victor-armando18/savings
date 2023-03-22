<?php

    namespace income\executer;

    use income\command\DeleteIncomeCommand;
    use income\handler\DeleteIncomeCommandHandler;
    use income\repository\IncomeRepositoryPDOImpl;
    use shared\CommandExecuter;

    require_once __DIR__."/../shared/CommandExecuter.php";
    require_once __DIR__."/DeleteIncomeCommandHandler.php";
    require_once __DIR__."/IncomeRepositoryPDOImpl.php";

    final class DeleteIncomeCommandExecuter extends CommandExecuter{

        public function __construct() {
            parent::__construct(new DeleteIncomeCommandHandler(new IncomeRepositoryPDOImpl()));
        }

        public function run(DeleteIncomeCommand $command){
            try {
                parent::execute($command);
                echo "<p class='success'>Income deleted with success!</p>";
            } catch (\Exception $error) {
                echo "<p class='error'>".$error->getMessage()."</p>";
            }
        }

    }

?>