$( document ).ready(function() {
$(function() {
    $( "input[type=submit], button" ).button();
    $( "#radio" ).buttonset();
    
  });
      $("a[id*='delete']").click(function(e){
           e.preventDefault();
          var r=confirm("are you sure you want to delete this data?");
        if (r==true)
          {
               window.location.href = $(this).attr("href");
          }
         
      });

});


function updateerror(t)
{
    var g=document.getElementById("validateTips");
     document.getElementById("validateTips").innerHTML=t ;
        g.className= "ui-state-error";
          setTimeout(function() {
    document.getElementById("validateTips").innerHTML="" ;
          g.className="validateTips"
  }, 10000);
}
function updateTips(t)
{
    var g=document.getElementById("validateTips");
     document.getElementById("validateTips").innerHTML=t ;
        g.className= "ui-state-highlight";
          setTimeout(function() {
    document.getElementById("validateTips").innerHTML="" ;
          g.className="validateTips"
  }, 3000);
}



