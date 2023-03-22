<?php

    namespace shared;

    require_once __DIR__."/Query.php";

    interface QueryHandler{
        function handle(Query $query = null);
    }

?>