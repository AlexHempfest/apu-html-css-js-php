
function getValue()
{
    let mynameonly=$("#myname").val();
    console.log(mynameonly);

    anything();
    
  //  $("#greeting").html(" Hello " + mynameonly);
    $("#greeting").append( mynameonly);

}
function anything(){

    console.log("I am being called.");
}

$('#mybutton').click(function() {
    $('#myparagraph').hide();
//    alert('Button was clicked!');
});


