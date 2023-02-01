<?php
    session_start();

    require_once("../funkcije.php");

    $username = $_SESSION['username'];
    $db = konekcija();
    $upit = "SELECT * FROM korisnici WHERE korisnicko_ime='$username'";
    fetchAll($db, $upit);
       
?>