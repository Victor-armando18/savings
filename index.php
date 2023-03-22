<?php
    require_once __DIR__."/config/WebsiteInfo.php";

    session_start();
    if(isset($_SESSION['logged_user'])){
        $loggedUser = $_SESSION['logged_user'];
        $baseDir = "view/home.php?logged_user=".$loggedUser;
        header('Location: '.$baseDir);
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This website has the objective of to offer the Personal Management Savings in Expenses">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME." | ".SITE_NAME_DESCRIPTION ?></title>
    <link rel="stylesheet" href="/assets/css/index.css">
</head>
<body>
    <main>
        <header>
            <h1 title="Personal Expense Management Savings"><?= SITE_NAME ?></h1>
        </header>
        <section id="container">
            <div id="brief-description">
                <p>
                    Welcom to <b><?= SITE_NAME ?></b>, the best plataform already developed that offer great mechanisms to manager 
                    expenses and savings.
                </p>
                <p>This is the first version of the plataform, we are working on more features that will be usefull for You.</p>
                <br>
                <p>To use this plataform You have before to create an account. 
                If You already have an account do <a href="#" id="login-link">Login</a></p>
            </div>
        </section>
        <section id="form-container">
            <h5>Create Account</h5>
            <form action="#" id="create-account-form">
                <label>Email</label>
                <div>
                <input type="email" name="email" placeholder="Enter Your email">
                </div>
                <label>Name</label>
                <div>
                <input type="text" name="name" placeholder="Enter Your name">
                </div>
                <label>Password</label>
                <div>
                <input autocomplete type="password" name="password" placeholder="Enter Your Password">
                </div>
                <input type="submit" value="Create">
            </form>
            <div class="alert-message"></div>
        </section>
        <section id="form-login-container">
            <h5>Login</h5>
            <form action="#" id="login-form">
                <label>Email</label>
                <div>
                <input type="email" name="email" placeholder="Enter Your email">
                </div>
                <label>Password</label>
                <div>
                <input autocomplete type="password" name="password" placeholder="Enter Your Password">
                </div>
                <input type="submit" value="Login">
                <a href="#" id="showCreateAccountForm">Create account</a>
            </form>
            <div class="alert-message"></div>
        </section>
    </main>
    <footer>
        <span style="font-size: 12px;">Developed By: Victor Armando</span>
        <div style="float:right;">
            <ul>
                <li><a href="#">Help</a></li>
                <li><a href="#">How to use</a></li>
            </ul>
        </di>
    </footer>
    <script src="/user/consumer/RegisterUser.js"></script>
    <script src="/user/consumer/AuthenticateUser.js"></script>
    <script>
        onload = function(){
            document.querySelector('#login-link').addEventListener('click', function(){
                document.querySelector('#form-container').style.display = "none";
                document.querySelector('#form-login-container').style.display = "block";
            });
            document.querySelector('#showCreateAccountForm').addEventListener('click', function(){
                document.querySelector('#form-container').style.display = "block";
                document.querySelector('#form-login-container').style.display = "none";
            });
            document.querySelector('#form-container').style.display = "block";
        }
    </script>
</body>
</html>