<?php

    namespace configuration;
    use PDO;
    use PDOException; 

    require_once __DIR__."/ConnectionProperties.php";

    final class Connection{
        
        private static $connection;

        public static function get() : PDO {

            if(!isset(self::$connection)){
                try{
                    $conexaoFormatada = sprintf("mysql:host=%s;dbname=%s", HOST, DBNAME);
                    $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                    $connection = new PDO($conexaoFormatada, USER, PASSWORD, $opcoes);
                    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    print "Erro: " . $e->getMessage();
                }
            }
            return $connection;
        }

    }

?>