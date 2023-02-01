
$(document).ready(function(){
    
    
    $("#okaciSliku").value = "Zameni sliku"
    $.post("profil_ajax.php", function(response){
        
        let odgovor = JSON.parse(response);
        

        let ime = odgovor[0].ime;
        let prezime = odgovor[0].prezime;
        let status = odgovor[0].status;
        let email = odgovor[0].email;
        let korisnicko = odgovor[0].korisnicko_ime; 

        $("#profilInfo").html("Ime i prezime: "+ime+" "+prezime+"<br>Korisnicko ime: "+korisnicko+"<br>Radni status: "+status+"<br>Email: "+email);
        
    });
    
    
    
});