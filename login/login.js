$(document).ready(function(){

    $("#prijava").click(function()
    {
        let uname = $("#uname").val();
        let pass = $("#pass").val();
        if(uname!=="" && pass!=="")
        { 
            $.post("login_ajax.php?funkcija=login", {uname: uname, pass: pass}, function(response){
                let odgovor = JSON.parse(response);
                let username = odgovor[0].korisnicko_ime;
                let status = odgovor[0].status;
                
                $.post("../session_ajax.php?funkcija=kreiranje", {uname: username, status:status}, function(){
                    
                });
            });
        }
        else 
        {
            $("#test").html("Morate uneti korisnicko ime i lozinku");
        }
        return false;
    });
});