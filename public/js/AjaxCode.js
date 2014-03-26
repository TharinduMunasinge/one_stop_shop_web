
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
          xmlhttp.send();           

        
        
      }
