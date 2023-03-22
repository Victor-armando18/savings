<?php

    namespace user\repository;

    use configuration\Connection;
    use user\User;
    use user\UserResponseView;

    require_once __DIR__."//..//config/Connection.php";
    require_once __DIR__."//UserRepository.php";

    final class UserRepositoryPDOMysqlImpl implements UserRepository{

        private $databaseConnection;

        public function __construct(){
            $this->databaseConnection = Connection::get();
        }
        
        public function register(User $user): void {
            try {
                $this->databaseConnection->beginTransaction();
                $transaction = $this->databaseConnection->prepare("INSERT INTO utilizador VALUES(:email, :nome, :senha);");
                $transaction->bindValue(":email", $user->getEmail());
                $transaction->bindValue(":nome", $user->getName());
                $transaction->bindValue(":senha", $user->getPassword());
                if($transaction->execute()) $this->databaseConnection->commit();
            } catch (\PDOException $error) {
                $this->databaseConnection->rollback();
                throw new \RuntimeException("Falha ao registrar o usuario. Motivo: ".$error->getMessage());
            }
        }
            
        public function contains(User $user): bool {
            try {
                $query = "SELECT email, nome FROM utilizador WHERE email = :email;";
                $transaction = $this->databaseConnection->prepare($query);
                $transaction->bindValue(":email", $user->getEmail());
                $transaction->execute();
                if($transaction->fetch()) {
                    $transaction->closeCursor();
                    return true;
                }
            } catch (\PDOException $error) {
                throw new \RuntimeException("Falha ao verificar o usuario. Motivo: ".$error->getMessage());
            }
            return false;
        }

        public function findByEmailAndPassword(string $email, string $password) {
            try {
                $query = "SELECT email, nome FROM utilizador WHERE email = :email AND senha = :senha;";
                $transaction = $this->databaseConnection->prepare($query);
                $transaction->bindValue(":email", $email);
                $transaction->bindValue(":senha", $password);
                $transaction->execute();
                if($result = $transaction->fetchObject()) {
                    $transaction->closeCursor();
                    return UserResponseView::fillWith($result);
                }
            } catch (\PDOException $error) {
                throw new \RuntimeException("Falha ao buscar o usuario. Motivo: ".$error->getMessage());
            }
            return null;
        }

        public function findAll(): array{
            $users = [];
            try {
                $transaction = $this->databaseConnection->query("SELECT email, nome FROM utilizador;");
                while($result = $transaction->fetch(\PDO::FETCH_OBJ)) {
                    $users[] = UserResponseView::fillWith($result);
                }
            } catch (\PDOException $error) {
                throw new \RuntimeException("Falha ao carregar os usuarios. Motivo: ".$error->getMessage());
            }
            return $users;
        }

    }

?>