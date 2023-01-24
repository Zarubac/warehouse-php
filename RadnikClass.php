<?php
    class Radnik
    {
        private $ime;
        private $prezime;
        private $status;
        private $email;
        private $username;
        private $password;

   

        public function __construct($ime, $prezime, $status, $email, $username, $password)
        {
            $this->ime = $ime;
            $this->prezime = $prezime;
            $this->status = $status;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
        }

        public function __destruct()
        {
            
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function __get($name)
        {
            return $this->$name;
        }
        
        public function __toString()
        {
            return $this->ime." ".$this->prezime." ".$this->status;
        }

        //Dodaje radnika u bazu
        public function dodajUBazu($db)
        {
            $upit = "INSERT INTO korisnici (ime, prezime, status, email, korisnicko_ime, lozinka)
            VALUES ('$this->ime', '$this->prezime', '$this->status', '$this->email', '$this->username', '$this->password')";
            mysqli_query($db, $upit);
            if(mysqli_error($db)) echo "Error: ".mysqli_error($db);
        }

    }
?>