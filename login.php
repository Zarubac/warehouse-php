<?php
    require_once("funkcije.php");
    session_start();

    //redirekcija ukoliko je korisnik vec prijavljen
    if(isLogedIn())
        header("Location='warehouse.php'");
    
    //Ako je redirektovan na login stranicu preko linka za odjavu
    //poziva se logout funkcija za prekidanje sesije
    if(isset($_GET['odjava']))
        logout();
    
    //Provera konekcije na bazu
    if(!$db=konekcija())
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
    <link rel="stylesheet" type="text/css" href="stilovi.css">
    <title>Login</title>
</head>
<body>
    <!-- Navbar -->
    <ul>
        <li><a href="login.php" class="active"> Login </a></li>
        <li><a href="warehouse.php"> Warehouse </a></li>
        <li><a href="manage.php"> Manage </a></li>
    </ul>
    <br>

    <!-- Login forma -->
    <h2>Login</h2>
    <form action="login.php" method="post">
        <input type="text" name="uname" id="uname" placeholder="Unesite korisnicko ime"><br><br>
        <input type="password" name="pass" id="pass" placeholder="Unesite lozinku"><br><br>
        <input type="checkbox" name="zapamti" id="zapamti" value="1">Zapamti me na ovom racunaru <br><br>
        <button type="submit" name="submit">Prijavi se</button>
    </form>
    <br><br>
    
    <?php
        if(isset($_POST['submit']))
        {
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
            $status =  getAuth($db, $uname, $pass);  //Autentifikacija korisnika i setovanje statusa korisnika
            
            //Autentifikacija je za sada zamisljena na ovaj nacin:
            //Ako je rezultat funkcije getAuth() prazan string korisnik ne postoji u bazi i sledeci blok naredbi ne prolazi
            //Ako rezultat funkcije getAuth() nije prazan string setuje se sesija i cookiji.
            
            if($status)
            {
                $_SESSION['user'] = $uname;
                $_SESSION['status'] = $status;

                //Kreiranje cookija Zapamti me
                if(isset($_POST['zapamti']))
                {
                    setcookie("user", $uname, time()+8400, "/");
                    setcookie("status", $status, time()+8400, "/");
                }

                //Redirekcija na warehouse page nakon uspesne autentifikacije i kreiranja parametara sesije i cookija
                header("Location: warehouse.php");   
            }
            else
            {
                session_unset();
                echo "Nepostojeci kredencijali!";
            }

            


            echo "<br>";
            //var_dump($_SESSION);
            //$test = getAuth($db,$uname,$pass);
            //echo $test;
                
            
            

            
            
            

        }

    ?>
</body>
</html>