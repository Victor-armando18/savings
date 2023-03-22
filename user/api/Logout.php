<?php
    session_start();
    unset($_SESSION['logged_user']);
    session_destroy();
    echo "We will be waiting for You again. You will be redirect to the login window!";
    print '<meta http-equiv="refresh" content="2; url=../../index.php">';

?>