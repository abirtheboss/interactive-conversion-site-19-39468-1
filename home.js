    function isValid(){
    var flag = true;
    var convo=document.forms["home"]["convo"].value;
    var value=document.forms["home"]["value"].value;
    if(convo ==="")
    {
        flag = false;
        document.getElementById('convoErr').innerHTML="  Conversion type can not be empty.";
    }
    if(value ==="")
    {
        flag = false;
        document.getElementById('valueErr').innerHTML=" Value can not be empty.";
        
    }
    return flag;
    }

    