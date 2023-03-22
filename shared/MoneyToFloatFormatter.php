<?php

    namespace shared;

    require_once __DIR__."/MoneyFormatter.php";

    final class MoneyToFloatFormatter implements MoneyFormatter{
        
        private $valor;

        public function __construct(string $valor) {
            $this->valor = $valor;
        }

        public function format(): float {
            return floatval(str_replace(',','.',str_replace('.', '', $this->valor)));
        }
    
    }
?>