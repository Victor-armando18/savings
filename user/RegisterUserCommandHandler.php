<?php

    namespace user\handler;
    
    use shared\Command;
    use shared\CommandHandler;
    use user\command\RegisterUserCommand;
    use user\repository\UserRepository;
    use user\User;

    require_once __DIR__."//..//shared/CommandHandler.php";
    require_once __DIR__."//RegisterUserCommand.php";

    final class RegisterUserCommandHandler implements CommandHandler{

        private $repository;

        public function __construct(UserRepository $repository){
            $this->repository = $repository;
        }
        
        public function handle(Command $command): void {
            if(!($command instanceof RegisterUserCommand)) return;
            $user = new User($command->getEmail(), $command->getName(), $command->getPassword());
            if($this->repository->contains($user)) 
                throw new \RuntimeException("This user is already registered!");
            $this->repository->register($user);
        }
    }

?>