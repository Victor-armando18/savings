<?php

    namespace income\handler;

    use income\command\DeleteIncomeCommand;
    use income\Income;
    use income\repository\IncomeRepository;
    use shared\Command;
    use shared\CommandHandler;

    require_once __DIR__."/../shared/CommandHandler.php";
    require_once __DIR__."/DeleteIncomeCommand.php";

    final class DeleteIncomeCommandHandler implements CommandHandler{
        
        private $repository;

        public function __construct(IncomeRepository $repository){
            $this->repository = $repository;
        }

        public function handle(Command $command): void {
            if(!($command instanceof DeleteIncomeCommand)) return;
            $this->repository->delete(new Income($command->getUser(), $command->getYear(), $command->getMonth(), $command->getValue()));
        }
    }

?>