<?php

//Zamenjena istoimenom funkcijom koja umesto tekst fajla gadja mysql bazu 23.1.2023.
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

//Zamenjena funkcijom getAuth() koja umesto tekst fajla gadja mysql bazu 23.1.2023.
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

?>