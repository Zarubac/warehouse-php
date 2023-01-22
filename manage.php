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
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="stilovi.css">

</head>
<body>
    <!-- Navbar -->
    <ul>
        <!-- <li><a href="login.php"> Login </a></li> -->
        <li><a href="home.php"> Home </a></li>
        <li><a href="manage.php" class="active"> Manage </a></li>
    </ul>

    <!-- Provera logovanja -->
    <?php
        if(!isLogedIn())
        {
            echo "Morate se prijaviti<br>";
            echo "<a href='login.php'>Prijavi se</a>";
            exit();
        }
    ?>
    <h1>Ispis iz txt baze</h1>
    
    <!-- Forma 1 Ispis iz txt baze-->
    <br>
    <div class="container">
        <form action="manage.php" method="POST">
        <input type="text" name="id" placeholder="Unesite id proizvoda">
        <br>
        <br>
        <button type="submit">pretrazi</button>
        </form>
    </div>
    
    <?php

    echo "<div class='container'>";
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            prikaziPodatke($id);
        }
        else echo "<br>Dobrodosli!";

    echo "</div>";
    ?>
    <hr>

    <h1>Upis u txt bazu</h1>

    <!-- Forma 2 Upis u txt bazu -->
    <div class="container" >
        <br>
        <form action="manage.php" method="POST">
            <input type="text" name="imeProizvoda" placeholder="Unesite ime proizvoda...">
            <br>  
            <br>
            Izaberite kategoriju:
            <br>
            <select name="kategorije" id="kategorije">
            <option value="pekara">Pekara</option>
            <option value="mlecni">Mlecni proizvodi</option>
            <option value="italija">Italijanski proizvodi</option>
            <option value="sok">Sok</option>
            </select>
            <br>
            <br>
            <input type="text" name="cena" placeholder="Unesite cenu proizvoda...">
            <br>
            <br>
            <button type="submit">Unesite proizvod</button>
        </form>
    </div>

    <?php

        echo "<div class='container'>";
        if(isset($_POST['imeProizvoda'])){
            $ime = $_POST['imeProizvoda'];
            $cena = $_POST['cena'];
            $kategorija = $_POST['kategorije'];
            $idP = setIdpNo();

            upisiPodatke($idP,$ime,$kategorija,$cena);
            unset($_POST['imeProizvoda']);
            echo "<br> pritisnuto";

        }
    
    
    ?>
    <hr>
</body>
</html>