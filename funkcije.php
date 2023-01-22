<?php

    //Funkcija koja pravi id novog proizvoda na osnovu broja redova u txt bazi
    function setIdpNo ()
    {
        $rowNo = 1;
        $db_path = "proizbodi.txt";
        if(file_exists($db_path)){
            $file = fopen($db_path,"r");
            while(($red = fgets($file))!=NULL){
                $rowNo++;
            }
            fclose($file);
        }
        return "id"."$rowNo";
    }

    //Funkcija koja iscitava red po red iz txt baze
    //Svaki red exploduje po # delimiteru
    //Poredi id koji je prosledjen kao argument sa id-jem proizvoda u svakom redu
    //Ako se nadje poklapanje ispisuje podatke o proizvodu
    function prikaziPodatke($id)
    {
        $k = 0;
        $db_path = "proizbodi.txt";
        $file = fopen($db_path,"r");
        while(($red = fgets($file))!=NULL)
            {
            $ar_red = explode("#", $red);
            if($ar_red[0] == $id)
            {
                $k=1;
                for($i=1;$i<count($ar_red);$i++){
                    echo "$ar_red[$i] <br>";
                }
            } 
        }
        fclose($file);
        if($k == 0) echo "<br>Id ne postoji u bazi";
    }
    
    //Funkcija za upis novih proizvoda u tekstualnu bazu
    //Ulazni argumenti su: 
    //$idp - id proizvoda (rezultat setIpdNo funkcije)
    //$ime - ime proizvoda dobijeno kroz formu 2 input name imeProizvoda
    //$kategorija - kategorija proizvoda dobijena kroz formu 2 select name kategorije
    //$cena - cena proizvoda dobijena kroz formu 2 input name cena
    function upisiPodatke($idP, $ime, $kategorija, $cena=0)
    {
        $db_path = "proizbodi.txt";
        $upis = $idP."#".$ime."#".$kategorija."#".$cena."\n";
        $file = fopen($db_path,"a");
        fwrite($file,$upis);
        fclose($file);
    }

    function getAuth($uname,$pass)
    {
        $a = false;
        $fPath = "kredencijali.txt";
        $file= fopen($fPath, "r");
        while(($red = fgets($file))!=NULL)
        {
            $ar_red = explode("#", $red);
            if(($ar_red[0]==$uname)and($ar_red[1]==$pass))
                $a = true;
        }
        fclose($file);

        if($a==true)
            return true;
        else
            return false;
    }
    
    function getStatus($uname)
    {
        $status = "";
        $fPath = "kredencijali.txt";
        $file= fopen($fPath, "r");
        while(($red = fgets($file))!=NULL)
        {
            $ar_red = explode("#", $red);
            if(($ar_red[0]==$uname))
                $status = $ar_red[2];
        }
        fclose($file);
        return $status;
    }


    function isLogedIn()
    {
        if(isset($_SESSION['user']) and isset($_SESSION['status']))
        {
            return true;
        }
        else
        {
            if(isset($_COOKIE["user"]) and isset($_COOKIE["status"]))
            {
                $_SESSION["user"] = $_COOKIE["user"];
                $_SESSION["status"] = $_COOKIE["status"];
                return true;
            }
            else
                return false;
        }
    }

    function logout(){
        session_unset();
        session_destroy();
        setcookie("user", "", time()-1, "/");
        setcookie("status", "", time()-1, "/");
    }

?>