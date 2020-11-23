function terms()
{
    alert("Vous acceptez l'exploitation et la vente de vos données personnelles envers la Chine.");
}

function unlock()
{
    document.getElementById("btn").disabled = false;
}

function validation()
{
    var x = document.forms["myForm"]["cname"]["cnumber"]["expmonth"]["expyear"]["cvv"].value;
    var y = document.getElementById["TC"].checked;
    if ((x == "") && (y == false))
    {
        alert("Il fait remplir la/les case(s) vides");
        return false;
    }
}
