<?php
    
    require_once("../funkcije.php");
    session_start();

    //redirekcija ukoliko je korisnik vec prijavljen
    if(isLogedIn())
    {
        header("Location: ../warehouse/warehouse.php");
    }
   
    //Ako je redirektovan na login stranicu preko linka za odjavu
    //poziva se logout funkcija za prekidanje sesije
    if(isset($_GET['odjava']))
        logout();

    if(!$db = konekcija())
    {
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
    <script src="login.js"></script>
    <title>Login</title>
</head>
<body>
    <!-- Navbar -->
    <ul>
        <li><a href="../login/login.php" class="active"> Login </a></li>
        <li><a href="../warehouse/warehouse.php"> Warehouse </a></li>
        <li><a href="../profil/profil.php"> Profil </a></li>
        
    </ul>
    <br>

    <!-- Login forma -->
    <h2>Login</h2>
    <form action="login.php" method="post">
        <input type="text" name="uname" id="uname" placeholder="Unesite korisnicko ime"><br><br>
        <input type="password" name="pass" id="pass" placeholder="Unesite lozinku"><br><br>
        <input type="checkbox" name="zapamti" id="zapamti" value="1">Zapamti me na ovom racunaru <br><br>
        <button name="prijava" id="prijava">Prijavi se</button>
    </form>
    <br><br>
    <div id="test"></div>
    <?php
       echo (var_dump($_SESSION));
    ?>
    
</body>
</html>

<?php
    
?>