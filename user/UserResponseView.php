<?php

    namespace user;

    final class UserResponseView{

        private $code;
        private $name;

        protected function showEmail(string $value): self{
            $this->code = $value;
            return $this;
        }

        protected function andName(string $value): self{
            $this->name = $value;
            return $this;
        }

        public function getEmail(): string { return $this->code; }
        public function getName(): string { return $this->name; }

        static function fillWith($response): self{
            $data = new UserResponseView();
            $data->showEmail($response->email)->andName($response->nome);
            return $data;
        }

    }

?>