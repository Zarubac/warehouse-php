<?php
    require_once("funkcije.php");
    session_start();

    if(isLogedIn())
        header("Location='home.php'");
    
    if(isset($_GET['odjava']))
        logout();
    

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
        <li><a href="home.php"> Home </a></li>
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
            $auth =  getAuth($uname, $pass);  //Boolean koji se setuje na true ako kredencijali postoje u bazi
            $status = "notSet";
            
            //Kreiranje parametara sesije ako je autentifikacija uspesna
            if($auth==true)
            {
                $status = getStatus($uname); 

                $_SESSION['user'] = $uname;
                $_SESSION['status'] = $status;

                //Kreiranje cookija Zapamti me
                if(isset($_POST['zapamti']))
                {
                    setcookie("user", $uname, time()+8400, "/");
                    setcookie("status", $status, time()+8400, "/");
                }

                //Redirekcija na home page nakon uspesne autentifikacije i kreiranja parametara sesije i cookija
                header("Location: home.php");   
            }
            else
            {
                session_unset();
                echo "Nepostojeci kredencijali!";
            }

            


            echo "<br>";
            //var_dump($_SESSION);

                
            
            

            
            
            

        }

    ?>
</body>
</html>