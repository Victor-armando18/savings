<?php

    namespace expense_type\handler;

    use expense_type\ExpenseType;
    use expense_type\command\CreateExpenseTypeCommand;
    use expense_type\repository\ExpenseTypeRepository;
    use RuntimeException;
    use shared\Command;
    use shared\CommandHandler;

    require_once __DIR__."/CreateExpenseTypeCommand.php";
    require_once __DIR__."/../shared/CommandHandler.php";

    final class CreateExpenseTypeCommandHandler implements CommandHandler{
        
        private $repository;

        public function __construct(ExpenseTypeRepository $repository) { 
            $this->repository = $repository; 
        }

        public function handle(Command $command): void{
            if(!($command instanceof CreateExpenseTypeCommand)) return;
            $expense = new ExpenseType($command->getName(), $command->getUserCode());
            if($this->repository->contains($expense)) 
                throw new RuntimeException("Expense Type: <b>{$command->getName()}</b> already exists!");
            $this->repository->save($expense);
        }

    }

?>