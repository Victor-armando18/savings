<?php

    namespace income\handler;

    use income\command\RegisterIncomeCommand;
    use income\Income;
    use income\repository\IncomeRepository;
    use shared\Command;
    use shared\CommandHandler;

    require_once __DIR__."//..//shared/CommandHandler.php";
    require_once __DIR__."//RegisterIncomeCommand.php";

    final class RegisterIncomeCommandHandler implements CommandHandler{
        
        private $repository;

        public function __construct(IncomeRepository $repository) {
            $this->repository = $repository;
        }

        public function handle(Command $command): void {
            if(!($command instanceof RegisterIncomeCommand)) return;
            $income = new Income($command->getUser(), $command->getYear(), $command->getMonth(), $command->getValue());
            if($this->repository->contains($income)) 
                throw new \RuntimeException("This income is already registered.");
            $this->repository->register($income);
        }
    
    }

?>