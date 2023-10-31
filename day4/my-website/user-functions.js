$(document).ready(function(){

    uPrefObj= new userPref();
    
    initUserPref();
    

    $("#mypreflink").click(function(){
        showPreForm();
        logError("Link was clicked");
    });

    
    $("#savePref").click(function(){
uPrefObj.name=$("#myName").val();
uPrefObj.myColor=$("#myColor").val();
logError(" uPref Saave function was called");
logError(uPrefObj);

uPrefObj.setPref();

logError("savePref was called");
    })
})



function showPreForm()
{console.log("show user pref was called");
    $("#prefForm").css("display","block");
}


function initUserPref()
{
    uPrefObj.getPref();
    $("#myName").val(uPrefObj.name);
    $("body").css("color",uPrefObj.myColor);
    $("#greeting").html("Hello " + uPrefObj.name);
}


function logError(str){
console.log(str);
}