<?php
    session_start();
    require_once("../funkcije.php");

    if(!isLogedIn())
        {
            echo "Morate se prijaviti<br>";
            echo "<a href='../login/login.php'>Prijavi se</a>";
            exit();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stilovi.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
     <!-- Navbar -->
     <ul>
        <li><a href="../login/login.php"> Login </a></li>
        <li><a href="../warehouse/warehouse.php"> Warehouse </a></li>
        <li><a href="../profil/profil.php" class="active"> Profil </a></li>
    </ul>
    <div class="profilnaSlika">
        <img src="../profilne_slike/moja.jpg" alt="nema slike">
    </div>
    <div class="profilInfo">

    </div>
    <?php
        $username = $_SESSION['username'];
        $status = $_SESSION['status'];
        //echo "<div>Ulogovani ste kao: ".$username." sa statusom: ".$status."</div><br>";

    ?>
    
    <br>
</body>
</html>