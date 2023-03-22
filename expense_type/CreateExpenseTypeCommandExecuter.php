<?php

    namespace expense_type\executer;

    use Exception;
    use expense_type\command\CreateExpenseTypeCommand;
    use expense_type\handler\CreateExpenseTypeCommandHandler;
    use expense_type\repository\ExpenseTypeRepositoryPDOMySQLImpl;
    use shared\CommandExecuter;

    require_once __DIR__."/ExpenseTypeRepositoryPDOMySQLImpl.php";
    require_once __DIR__."/CreateExpenseTypeCommandHandler.php";
    require_once __DIR__."/../shared/CommandExecuter.php";

    final class CreateExpenseTypeExecuter extends CommandExecuter{

        public function __construct() {
            parent::__construct(new CreateExpenseTypeCommandHandler(new ExpenseTypeRepositoryPDOMySQLImpl()));
        }

        public function run(CreateExpenseTypeCommand $command): void{
            try {
                parent::execute($command);
                echo "<p class='success'>Expense type registered with sucess!</p>";
            } catch (Exception $error) {
                echo "<p class='error'>".$error->getMessage()."</p>";
            }
        }
    }
?>