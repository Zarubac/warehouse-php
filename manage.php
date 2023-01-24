<?php
    require_once("funkcije.php");
    require_once("RadnikClass.php");
    session_start();

    if(!$db = konekcija())
   {
        exit();
   }

   //Brisanje radnika
   if(isset($_POST['obrisi']))
   {
       $idRadnika = $_POST['radnik'];
       fake_delete($db, $idRadnika);
   }

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
        <li><a href="warehouse.php"> Warehouse </a></li>
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
    <h1>Dodavanje radnika</h1>
    
    <!-- Forma 1 Dodavanje radnika u bazu-->
    <br>
    <div>
        <form action="manage.php" method="POST">
        <input type="text" name="imeRadnika" id="imeRadnika" placeholder="Unesite ime radnika">
        <br><br>
        <input type="text" name="prezimeRadnika" id="prezimeRadnika" placeholder="Unesite prezime radnika">
        <br><br>
        <select name="status" id="status">
            <option value="0">--Status radnika--</option>
            <option value="Magacioner">Magacioner</option>
            <option value="Admin">Admin</option>
        </select>
        <br><br>
        <input type="email" name="email" id="email" placeholder="Unesite email radnika">
        <br><br>
        <input type="text" name="username" id="username" placeholder="Unesite username radnika">
        <br><br>
        <input type="password" name="password" id="password" placeholder="Unesite password radnika">
        <br><br>  
        <button type="submit" name="dodaj" id="dodaj">Dodaj</button>
        <br><br>
        </form>
    </div>
    
    <?php
        if(isset($_POST['dodaj']))
        {
            if($_POST['imeRadnika']=="" or $_POST['prezimeRadnika']=="" or $_POST['status']=="0" 
            or $_POST['email']=="" or $_POST['username']=="" or $_POST['password']=="")
            {
                echo "Svi podaci moraju biti uneti";
            }
            else
            {
                $radnik = new Radnik($_POST['imeRadnika'], $_POST['prezimeRadnika'], $_POST['status'], $_POST['email'], $_POST['username'], $_POST['password']);
                $radnik->dodajUBazu($db);
                if(mysqli_errno($db) == 1062)
                    echo "<br>Email vec u upotrebi";
            }
            
        }
        
    ?>

    <hr>

    <h1> Brisanje radnika </h1>

    <!-- Forma 2 Brisanje radnika iz baze -->
    <div>
        <br>
        <form action="manage.php" method="POST">
            <select name="radnik" id="radnik">
                <option value="0">--Izaberite radnika--</option>
                <?php
                    $upit = "SELECT * FROM korisnici WHERE fake_delete = false";
                    $rez = mysqli_query($db,$upit);
                    while($red = mysqli_fetch_array($rez, MYSQLI_ASSOC))
                    {
                        echo "<option value='{$red['id']}'>{$red['ime']} {$red['prezime']} ({$red['status']}) -- {$red['korisnicko_ime']}";
                    }
                ?>
            </select>
            <button type="submit" name="obrisi" id="obrisi">Obrisi radnika</button>
        </form>
    </div>

    <?php

       
    
    ?>
    <hr>
</body>
</html>