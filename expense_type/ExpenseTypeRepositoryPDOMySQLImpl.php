<?php

    namespace expense_type\repository;
    
    use configuration\Connection;
    use expense_type\ExpenseType;
    use expense_type\repository\ExpenseTypeRepository;

    require_once __DIR__."/ExpenseTypeRepository.php";
    require_once __DIR__."/../config/Connection.php";

    final class ExpenseTypeRepositoryPDOMySQLImpl implements ExpenseTypeRepository{
        
        private $connection;

        public function __construct(){ $this->connection = Connection::get(); }

        public function save(ExpenseType $expenseType): void {
            try {
                $this->connection->beginTransaction();
                $transaction = $this->connection->prepare("INSERT INTO despesa VALUES(:name, :user);");
                $transaction->bindValue(':name', $expenseType->getName());
                $transaction->bindValue(':user', $expenseType->getUserCode());
                if($transaction->execute()) $this->connection->commit();
            } catch (\PDOException $th) {
                $this->connection->rollback();
                throw new \RuntimeException("Houve um falha ao tentar cadastrar o tipo de despesa. Motivo: ".$th->getMessage());
            }
        }
        
        public function contains(ExpenseType $expenseType): bool{
            try {
                $transaction = $this->connection->prepare("SELECT nome FROM despesa WHERE nome = :name AND utilizador=:user");
                $transaction->bindValue(':name', $expenseType->getName());
                $transaction->bindValue(':user', $expenseType->getUserCode());
                $transaction->execute();
                if($transaction->fetchColumn()){
                    $transaction->closeCursor();
                    return true;
                }
            } catch (\PDOException $th) {
                throw new \RuntimeException("Houve um falha ao consultar o tipo de depesa. Motivo: ".$th->getMessage());
            }
            return false;
        }
        
        public function findAllByUserCode(string $value): array {
            try {
                $transaction = $this->connection->prepare("SELECT nome FROM despesa WHERE utilizador = :user;");
                $transaction->bindValue(':user', $value);
                $transaction->execute();
                return $transaction->fetchAll(\PDO::FETCH_COLUMN);
            } catch (\PDOException $th) {
                throw new \RuntimeException("Houve um falha ao buscar os tipos de despesas. Motivo: ".$th->getMessage());
            }
        }
    }

?>