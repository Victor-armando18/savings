<?php

    namespace event\repository;

    use configuration\Connection;
    use event\Event;
    use event\EventExpense;
    use event\EventExpenseResponseView;
    use event\EventResponseView;
    use PDOStatement;
    use RuntimeException;

    require_once __DIR__."/../config/Connection.php";
    require_once __DIR__."//EventRepository.php";
    require_once __DIR__."/EventResponseView.php";
    require_once __DIR__."/EventExpenseResponseView.php";

    final class EventRepositoryPDOMySQLImpl implements EventRepository{
        
        private $connection;
        private $events = [];

        public function __construct() {
            $this->connection = Connection::get();
        }

        public function save(Event $event): void {
            $query = <<<SQL
                INSERT INTO evento VALUES(DEFAULT, :user, :ano, :data, CURRENT_DATE, CURRENT_TIME);
            SQL;
            try {
                $this->connection->beginTransaction();
                $transaction = $this->connection->prepare($query);
                $transaction->bindValue(":user", $event->getUser());
                $transaction->bindValue(":ano", $event->getYear());
                $transaction->bindValue(":data", $event->getDate());
                if($transaction->execute()) $this->connection->commit();
            } catch (\PDOException $th) {
                $this->connection->rollBack();
                throw new RuntimeException("Houve um erro ao tentar cadastrar o evento. Motivo: ".$th->getMessage());
            }
        }

        public function registerEventExpense(EventExpense $event): void{
            $query = <<<SQL
                INSERT INTO gasto VALUES(:evento, :actividade, :valor);
            SQL;
            try {
                $this->connection->beginTransaction();
                $transaction = $this->connection->prepare($query);
                $transaction->bindValue(":evento", $event->getEventNumber());
                $transaction->bindValue(":actividade", $event->getExpenseType());
                $transaction->bindValue(":valor", $event->getValue());
                if($transaction->execute()) $this->connection->commit();
            } catch (\PDOException $th) {
                $this->connection->rollBack();
                throw new RuntimeException("Houve um erro ao tentar registrar o gasto. Motivo: ".$th->getMessage());
            }
        }

        public function containsEventExpense(EventExpense $event) : bool{
            $query = <<<SQL
                SELECT evento, despesa, valor FROM gasto 
                WHERE evento = :evento AND despesa = :actividade
            SQL;
            try {
                $transaction = $this->connection->prepare($query);
                $transaction->bindValue(":evento", $event->getEventNumber());
                $transaction->bindValue(":actividade", $event->getExpenseType());
                $transaction->execute();
                if($transaction->fetchObject()){
                    $transaction->closeCursor();
                    return true;
                }
            } catch (\PDOException $th) {
                throw new RuntimeException("Houve um erro ao tentar verificar o gasto. Motivo: ".$th->getMessage());
            }
            return false;
        }
        public function contains(Event $event) : bool{
            $query = <<<SQL
                SELECT numero, ano, data, data_registro, hora_registro FROM evento
                WHERE utilizador = :user AND ano = :ano AND data = :data
            SQL;
            try {
                $transaction = $this->connection->prepare($query);
                $transaction->bindValue(":user", $event->getUser());
                $transaction->bindValue(":ano", $event->getYear());
                $transaction->bindValue(":data", $event->getDate());
                $transaction->execute();
                if($transaction->fetchObject()){
                    $transaction->closeCursor();
                    return true;
                }
            } catch (\PDOException $th) {
                throw new RuntimeException("Houve um erro ao tentar verificar evento. Motivo: ".$th->getMessage());
            }
            return false;
        }

        public function findAllByUserEmail(string $value) {
            $query = <<<SQL
                SELECT numero, ano, data, data_registro, hora_registro FROM evento WHERE utilizador = :user
            SQL;
            try {
                $transaction = $this->connection->prepare($query);
                $transaction->bindValue(":user", $value);
                $transaction->execute();
                $this->handle($transaction);
            } catch (\PDOException $th) {
                throw new RuntimeException("Houve um erro ao tentar carregar os eventos. Motivo: ".$th->getMessage());
            }
            return $this->events;
        }

        public function findAllExpensesByEventNumber(int $value) {
            $query = <<<SQL
                SELECT despesa, valor FROM gasto WHERE evento = :evento
            SQL;
            try {
                $transaction = $this->connection->prepare($query);
                $transaction->bindValue(":evento", $value);
                $transaction->execute();
                while($result = $transaction->fetch(\PDO::FETCH_OBJ)){
                    $this->events[] = EventExpenseResponseView::fillWith($result);
                }
            } catch (\PDOException $th) {
                throw new RuntimeException("Houve um erro ao carregar os gastos. Motivo: ".$th->getMessage());
            }
            return $this->events;
        }

        private function handle(PDOStatement $transaction){
            while($result = $transaction->fetch(\PDO::FETCH_OBJ)){
                $this->events[] = EventResponseView::fillWith($result);
            }
        }

    }

?>