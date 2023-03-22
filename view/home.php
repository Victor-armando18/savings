<?php
    require_once __DIR__."/../config/WebsiteInfo.php";
    session_start();
    $loggedUser;
    if(!isset($_SESSION['logged_user'])){
        echo "Your are not logged, You will be redirect to the login window!";
        print '<meta http-equiv="refresh" content="2; url=../index.php">';
        exit;
    }

    if(isset($_GET['logged_user'] ) && $_GET['logged_user'] != $_SESSION['logged_user']){
        echo "Your are not logged, You will be redirect to the login window!";
        print '<meta http-equiv="refresh" content="2; url=../index.php">';
        exit;
    }
    $_SESSION['logged_user'] = $_GET['logged_user'];
    $loggedUser = $_SESSION['logged_user'];
    
    $baseDir = "/view/home.php?logged_user=".$loggedUser;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This website has the objective of to offer the Personal Management Savings in Expenses">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME." | ".SITE_NAME_DESCRIPTION ?></title>
    <link rel="stylesheet" media="all" href="../assets/css/home.css">
    <!-- <link rel="stylesheet" media="all" href="../assets/css/fontawesome-free/css/all.min.css"> -->
</head>
<body>
    <p id="logged_user_code" hidden><?=$loggedUser?></p>
    <main>
        <header id="page-header">
            <div id="top">
                <h1 id="website-name" title="Personal Expense Management Savings"><?= SITE_NAME?></h1>
            </div>
            <nav id="navigation">
                <ul id="navigation-links">
                    <li><a href="#">Home</a></li>
                    <li><i class="fas fa-comments"></i><a href="<?=$baseDir?>&incomes">Incomes</a></li>
                    <li><i class="fas fa-shopping-bag"></i><a href="<?=$baseDir?>&expenses_types">Expenses Types</a></li>
                    <li><a href="<?=$baseDir?>&events">Events</a></li>
                    <li><i class="fas fa-house-user"></i><a href="../user/api/Logout.php?logged_user=<?=$loggedUser?>">Logout</a></li>
                </ul>
            </nav>
        </header>
        <div id="logged-user-details-area">
            <span><b>Logged User:</b> @<b><?= $loggedUser?></b></span>
        </div>
        <?php
            if(isset($_REQUEST['incomes'])){ require_once __DIR__."/Incomes.php";}
            if(isset($_REQUEST['expenses_types'])){ require_once __DIR__."/ExpensesTypes.php";}
            if(isset($_REQUEST['events'])){ require_once __DIR__."/Events.php";}
            if(isset($_REQUEST['expenses'])){ require_once __DIR__."/Expenses.php";}
        ?>
    </main>
    <?php
        if(isset($_REQUEST['incomes'])){ 
            echo "<script src='../income/consumer/FillTable.js'></script>"; 
            echo "<script src='../income/consumer/DeleteIncome.js'></script>"; 
            echo "<script src='../income/consumer/RegisterIncome.js'></script>"; 
        }

        if(isset($_REQUEST['expenses_types'])){ 
            echo "<script src='../expense_type/consumer/FillTable.js'></script>";
            echo "<script src='../expense_type/consumer/CreateExpenseType.js'></script>"; 
        }

        if(isset($_REQUEST['events'])){ 
            echo "<script src='../event/consumer/FillTable.js'></script>";
            echo "<script src='../event/consumer/SaveEvent.js'></script>"; 
        }
        if(isset($_REQUEST['expenses'])){ 
            echo "<script src='../event/consumer/FillEventsExpensesTable.js'></script>";
            echo "<script src='../expense_type/consumer/FillSelect.js'></script>";
            echo "<script src='../event/consumer/SaveEventExpense.js'></script>"; 
            // echo "<script src='../expense_type/consumer/CreateExpenseType.js'></script>"; 
        }
    ?>
</body>
</html>