<?php

    namespace event\handler;

    use event\command\RegisterEventCommand;
    use event\Event;
    use event\repository\EventRepository;
    use shared\Command;
    use shared\CommandHandler;
    
    require_once __DIR__."//../shared/CommandHandler.php";
    require_once __DIR__."//RegisterEventCommand.php";

    final class RegisterEventCommandHandler implements CommandHandler{
        
        private $repository;

        public function __construct(EventRepository $repository) {
            $this->repository = $repository;
        }

        public function handle(Command $command): void {
            if (!($command instanceof RegisterEventCommand)) return;
            $event = new Event($command->getUserEmail(), $command->getYear(), $command->getDate());
            if($this->repository->contains($event)) throw new \RuntimeException("This event is just registered!");
            $this->repository->save($event);
        }
    }
?>