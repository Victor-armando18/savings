<?php

    namespace user\repository;

    use user\User;
    use user\UserResponseView;

    require_once __DIR__."/User.php";
    require_once __DIR__."/UserResponseView.php";

    interface UserRepository{

        function register(User $user): void;
        function contains(User $user): bool;
        function findByEmailAndPassword(string $user, string $password);
        function findAll(): array;

    }

?>