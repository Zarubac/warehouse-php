
//Boji prazno polje tipa input u crveno nakon aktiviranja submit dugmeta
function praznoPolje()
{
    let poljaArray = document.querySelectorAll('input');
    let ispravno = true;
    console.log(poljaArray.length);

    for (let i = 0; i < poljaArray.length; i++)
    {
        if ((poljaArray[i].value == "") || ((poljaArray[i].value == "0") & (poljaArray[i].name == "status")))
        {
            poljaArray[i].style.backgroundColor = "rgba(252, 61, 3, .2)";
            ispravno = false;
        } 
        
    }
    if(ispravno)
    {
        alert("Radnik uspesno dodat");
    }
    else
    {
        alert("Svi podaci su obavezni");
    }

    //return false; //Da browser ne bi osvezio stranicu i vratio boju polja na default
}

function praznoPoljeNull(obj)
{
    obj.style.backgroundColor="white";
    return false;
}