<?php

    namespace event\handler;

    use event\command\RegisterEventExpenseCommand;
    use event\EventExpense;
    use event\repository\EventRepository;
    use shared\Command;
    use shared\CommandHandler;

    require_once __DIR__."/../shared/CommandHandler.php";
    require_once __DIR__."/RegisterEventExpenseCommand.php";

    final class RegisterEventExpenseCommandHandler implements CommandHandler{

        private $repository;

        public function __construct(EventRepository $repository){
            $this->repository = $repository;
        }

        public function handle(Command $command): void {
            if(!($command instanceof RegisterEventExpenseCommand)) return;
            $eventExpense = new EventExpense(
                $command->getEventNumber(),
                $command->getExpense(),
                $command->getValue()
            );
            if($this->repository->containsEventExpense($eventExpense)) 
                throw new \RuntimeException("This expense is already registered!");
            $this->repository->registerEventExpense($eventExpense);
        }
    }

?>