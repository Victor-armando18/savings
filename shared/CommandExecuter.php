<?php

    namespace shared;

    require_once __DIR__."//Command.php";
    require_once __DIR__."//CommandHandler.php";

    abstract class CommandExecuter{
        
        private $commandHanlder;

        protected function __construct(CommandHandler $commandHandler) {
            $this->commandHanlder = $commandHandler;
        }

        protected function execute(Command $command): void {
            $this->commandHanlder->handle($command);
        }

    }

?>