<?php

    namespace income\repository;

    use configuration\Connection;
    use income\Income;
    use income\IncomeResponseView;

    require_once __DIR__."\\..\\config\\Connection.php";
    require_once __DIR__."\\IncomeRepository.php";
    require_once __DIR__."/IncomeResponseView.php";

    final class IncomeRepositoryPDOImpl implements IncomeRepository{

        private $dataBaseConnection;

        public function __construct() {
            $this->dataBaseConnection = Connection::get();
        }

        public function register(Income $income): void {
            try {
                $this->dataBaseConnection->beginTransaction();
                $transaction = $this->dataBaseConnection->prepare("INSERT INTO rendimento VALUES(:user, :ano, :mes, :valor);");
                $transaction->bindValue(":user", $income->getUser());
                $transaction->bindValue(":ano", $income->getYear());
                $transaction->bindValue(":mes", $income->getMonth());
                $transaction->bindValue(":valor", $income->getValue());
                if($transaction->execute()) $this->dataBaseConnection->commit();
            } catch (\PDOException $err) {
                $this->dataBaseConnection->rollBack();
                throw new \RuntimeException("Impossível registrar o rendimento. Motivo: ".$err->getMessage());
            }
        }

        public function delete(Income $income): void {
            try {
                $this->dataBaseConnection->beginTransaction();
                $transaction = $this->dataBaseConnection->prepare("DELETE FROM rendimento WHERE utilizador = :user AND ano = :ano AND mes = :mes;");
                $transaction->bindValue(":user", $income->getUser());
                $transaction->bindValue(":ano", $income->getYear());
                $transaction->bindValue(":mes", $income->getMonth());
                if($transaction->execute()) $this->dataBaseConnection->commit();
            } catch (\PDOException $err) {
                $this->dataBaseConnection->rollBack();
                throw new \RuntimeException("Impossível excluir o rendimento. Motivo: ".$err->getMessage());
            }
        }

        public function contains(Income $income): bool {
            $query = <<<QUERY
                SELECT utilizador, ano, mes, valor FROM rendimento WHERE utilizador = :user AND ano = :ano AND mes = :mes; 
            QUERY;
            $transaction = $this->dataBaseConnection->prepare($query);
            $transaction->bindValue(":user", $income->getUser());
            $transaction->bindValue(":ano", $income->getYear());
            $transaction->bindValue(":mes", $income->getMonth());
            $transaction->execute();
            if($transaction->fetch(\PDO::FETCH_OBJ)) {
                $transaction->closeCursor();
                return true;
            }
            return false;
        }

        public function findAllByUserEmail(string $value) {
            $query = <<<QUERY
                SELECT utilizador, ano, mes, valor FROM rendimento WHERE utilizador = :user; 
            QUERY;
            $incomes = [];
            $transaction = $this->dataBaseConnection->prepare($query);
            $transaction->bindValue(":user", $value);
            $transaction->execute();
            while($result = $transaction->fetch(\PDO::FETCH_OBJ)) {
                $incomes[] = IncomeResponseView::fillWith($result);
            }
            return $incomes;
        }
    }

?>