<?php

    namespace event\executer;

    use event\command\RegisterEventCommand;
    use event\handler\RegisterEventCommandHandler;
    use event\repository\EventRepositoryPDOMySQLImpl;
    use shared\CommandExecuter;

    require_once __DIR__."//..//shared//CommandExecuter.php";
    require_once __DIR__."/RegisterEventCommandHandler.php";
    require_once __DIR__."/EventRepositoryPDOMySQLImpl.php";

    final class RegisterEventCommandExecuter extends CommandExecuter{

        public function __construct() {
            parent::__construct(new RegisterEventCommandHandler(new EventRepositoryPDOMySQLImpl()));
        }

        public function run(RegisterEventCommand $command){
            try{
                parent::execute($command);
                echo "<p class='success'>Event registered with success!</p>";
            } catch (\Exception $th) {
                echo "<p class='error'>".$th->getMessage()."</p>";
            }
        }
        
    }
?>