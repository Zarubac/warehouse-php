<?php
    //Funkcija koja proverava da li je korisnik ulogovan proverom parametara
    //sesije i cookija
    function isLogedIn()
    {
        if(isset($_SESSION['username']) and isset($_SESSION['status']))
        {
            return true;
        }
        else
        {
            if(isset($_COOKIE["username"]) and isset($_COOKIE["status"]))
            {
                $_SESSION["user"] = $_COOKIE["user"];
                $_SESSION["status"] = $_COOKIE["status"];
                return true;
            }
            else
                return false;
        }
    }

    //Funkcija koja unistava sesiju i brise cookije
    function logout()
    {
        session_unset();
        session_destroy();
        setcookie("user", "", time()-1, "/");
        setcookie("status", "", time()-1, "/");
    }

    //Konektuje se na bazu ako su parametri tacni
    function konekcija()
    {
        $db = @mysqli_connect("localhost", "root", "", "mini_web_warehouse");
        if(!$db)
        {
            echo "Neuspesna konekcija na bazu";
            echo mysqli_connect_errno().": ".mysqli_connect_error();
            return false;
        }
        else
        {
            mysqli_query($db, "SET NAMES utf8");
            return($db); 
        }
    }

    function fetchAll($db, $upit)
    {
        $quer = mysqli_query($db, $upit);
        $odgovor = mysqli_fetch_all($quer, MYSQLI_ASSOC);
        echo JSON_encode($odgovor, 256);
    }

    function logItBro($error){
        //Jos nije testirana
        $path = "../errorlog.txt";
        $entry = date("d.m.Y : H:i:s")." -- > ".$error."/n";
        $file = fopen($path,"a");
        fwrite($file, $entry);
        fclose($file);
    }
?>