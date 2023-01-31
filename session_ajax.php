<?php
    session_start();

    if((isset($_POST['uname'])) and (isset($_POST['status'])))
    {
        $username = $_POST['uname'];
        $status = $_POST['status'];
        
        if(isset($_GET['funkcija']))
        {
            $funkcija = $_GET['funkcija'];

            if($funkcija == 'kreiranje')
            {
                $_SESSION['username'] = $username;
                $_SESSION['status'] = $status;
            }
        }
        

    }



?>