
    function change(){
      var type = document.getElementById("myselect").value;

  
           
        

      if(type == "1" ){
        
        document.getElementById("description").innerHTML= "Please Provide Size";
        document.getElementById("size").style.visibility="visible";   
        document.getElementById("weight").style.visibility="hidden";
        document.getElementById("width").style.visibility="hidden";
        document.getElementById("height").style.visibility="hidden";
        document.getElementById("Length").style.visibility="hidden";

      }

      if(type == "2" ){

           document.getElementById("description").innerHTML= "Please Provide weight";
           document.getElementById("size").style.visibility="hidden";
           document.getElementById("weight").style.visibility="visible";
           document.getElementById("width").style.visibility="hidden";
           document.getElementById("height").style.visibility="hidden";
           document.getElementById("Length").style.visibility="hidden";
         }



         if(type == "3" ){

           document.getElementById("description").innerHTML= "Please Provide width x height x length";
           document.getElementById("dimension").style.marginTop = "-100px"; 
           document.getElementById("size").style.visibility="hidden";
           document.getElementById("weight").style.visibility="hidden";
           document.getElementById("width").style.visibility="visible";
           document.getElementById("height").style.visibility="visible";
           document.getElementById("Length").style.visibility="visible";
         }

         
         

     
}
