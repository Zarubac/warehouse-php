<?php
    require_once("funkcije.php");
    session_start();
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stilovi.css">
    <title>Warehouse</title>
</head>
<body>
    <!-- Navbar -->
    <ul>
        <!--<li><a href="login.php"> Login </a></li>-->
        <li><a href="warehouse.php"  class="active"> Warehouse </a></li>
        <li><a href="manage.php"> Manage </a></li>
    </ul>
    <?php
        if(!isLogedIn())
        {
            echo "Morate se prijaviti<br>";
            echo "<a href='login.php'>Prijavi se</a>";
            exit();
        }
        echo "<br>Prijavljeni ste kao: ".$_SESSION['user']." sa statusom: ".$_SESSION['status'];
        echo "<br><a href='login.php?odjava'>Odjavi se</a><br>";
        //var_dump($_COOKIE);
        //var_dump($_SESSION);
    ?>

    <h2>Coming soon</h2>


    
</body>
</html>