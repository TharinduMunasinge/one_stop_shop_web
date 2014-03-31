
function search(e,x)
      {
              
         if (window.XMLHttpRequest){
              xmlhttp=new XMLHttpRequest();
          }else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          
          xmlhttp.onreadystatechange=function()
            {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
              document.getElementById("itemTable").innerHTML= eval('('+xmlhttp.responseText+')').msg;
              }
            }

            var keyword=document.getElementById("field").value;
            var x=document.getElementById("keyword").value;


          xmlhttp.open("GET","store/"+keyword+"/"+x,true);
//xmlhttp.open("GET","store",true);
         
          xmlhttp.send();           

        
        
      }

function addCart( id, qty)
{
if (window.XMLHttpRequest){
              xmlhttp=new XMLHttpRequest();
          }else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          
          xmlhttp.onreadystatechange=function()
            {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
             document.getElementById("message").innerHTML= xmlhttp.responseText;
              }
            }
            qty+=1;
          xmlhttp.open("GET","cart/add/"+id+"/"+qty,true);
          xmlhttp.send(); 
}

function removeCart(id)
{
  if (window.XMLHttpRequest){
              xmlhttp=new XMLHttpRequest();
          }else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          
          xmlhttp.onreadystatechange=function()
            {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
             document.getElementById("message").innerHTML= xmlhttp.responseText;
           
              }
            }

          xmlhttp.open("GET","cart/remove/"+id,true);
          xmlhttp.send(); 
}


function showCart()
{
  if (window.XMLHttpRequest){
              xmlhttp=new XMLHttpRequest();
          }else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          
          xmlhttp.onreadystatechange=function()
            {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
             document.getElementById("cart").innerHTML= xmlhttp.responseText;
               $('#myModal').modal('show');
              }
            }

          xmlhttp.open("GET","cart/show",true);
          xmlhttp.send(); 
}