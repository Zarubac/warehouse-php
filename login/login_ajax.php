<?php
session_start();
require_once("../funkcije.php");

if(isset($_GET['funkcija']))
{
    $funkcija = $_GET['funkcija'];
    if($funkcija == 'login')
    {
        $username = $_POST['uname'];
        $password = $_POST['pass'];

        $db = konekcija();
        if(mysqli_error($db))
            echo mysqli_error($db);
        $upit = "SELECT * FROM korisnici WHERE korisnicko_ime='$username' AND lozinka='$password'";
        
        fetchAll($db,$upit);
        
    }
    
}

?>



