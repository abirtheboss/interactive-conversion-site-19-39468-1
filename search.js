    function result(pForm)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function()
        {
            document.getElementById("hist").innerHTML = this.responseText;
        }
        xhttp.open("POST", pForm.action + "?rate=" + pForm.rate.value,true);
        xhttp.send();
    }