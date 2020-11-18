<?php


class Products{
    
    private $con;
   
    public  $skuerror=" Sku Alread in use " ;
    
    public function __construct(){
        $this->con= mysqli_connect('localhost','root','','Productlist');
        if(mysqli_connect_error()){
            echo mysqli_connect_error();
        }


    }


  

    public function addDisk($data){
        
        $query= "INSERT INTO Products set SkuID='".$data[ 'SkuID']."', Name='".$data[ 'Name']."', Price='".$data[ 'Price']."', TypeID='".$data[ 'TypeID']."' ";
          
          $runquery= mysqli_query($this->con,$query);
               
            if($runquery){
                $query1= "INSERT INTO Disk set size='".$data[ 'size']."',SkuID='".$data[ 'SkuID']."', TypeID='".$data[ 'TypeID']."' ";
                $runquery= mysqli_query($this->con,$query1);
                return header("Location: show.php");
            }else{
                echo mysqli_errno($this->con);
            }
          

    }


    public function addBook($data){
        
        $query= "INSERT INTO Products set SkuID='".$data[ 'SkuID']."', Name='".$data[ 'Name']."', Price='".$data[ 'Price']."', TypeID='".$data[ 'TypeID']."' ";
          
          $runquery= mysqli_query($this->con,$query);
               
            if($runquery){
                $query2= "INSERT INTO Books set weight='".$data[ 'weight']."',SkuID='".$data[ 'SkuID']."', TypeID='".$data[ 'TypeID']."' ";
                $runquery= mysqli_query($this->con,$query2);
                return header("Location: show.php");
            }else{
                
                 if(mysqli_errno($this->con)==1062){
                      
                    echo $this->skuerror ;
                 } 

            }
          

    }

    public function addFur($data){
        
        $query= "INSERT INTO Products set SkuID='".$data[ 'SkuID']."', Name='".$data[ 'Name']."', Price='".$data[ 'Price']."', TypeID='".$data[ 'TypeID']."' ";
          
          $runquery= mysqli_query($this->con,$query);
               
            if($runquery){
                $query3= "INSERT INTO Furniture set height='".$data[ 'height']."',width='".$data[ 'width']."',Length='".$data[ 'Length']."',SkuID='".$data[ 'SkuID']."', TypeID='".$data[ 'TypeID']."' ";                $runquery= mysqli_query($this->con,$query2);
                $runquery= mysqli_query($this->con,$query3);
                return header("Location: show.php");
            }else{
                echo mysqli_errno($this->con);
            }
          

    }


    





      











}

$product= new Products();
$disk=new Products();






if(isset($_POST["submit"])){
    
    
    if($_POST["TypeID"]==1){
        $disk->addDisk($_POST);
    }
    
    if($_POST["TypeID"]==2){
        $product->addBook($_POST);
    }

    if($_POST["TypeID"]==3){
        $product->addFur($_POST);
    }
    
    if (empty($_POST["Name"])) {
        $nameErr = "Name is required";
      } 

    
    
    
      

       
    
}






?>



















<html>

 <head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <script defer src="script.js"></script> 


</head>

<body>
  <div class=" container" >
  <div class="container-sm">

        <h1>Product Add</h1>
        <div class="c" >
        <a href="show.php"><button class="btn btn-secondary btn-sm" >Cancle</button></a>

        </div>

        <hr style="width:100%;background-color:white;">
        











     <form action=" " method="post" class="form-group">
          Sku<input  class="form-control" type="text" id="SkuID"  name="SkuID"  value=" " required> <br>
          
          Name <input class="form-control" type="text" id="Name"  name="Name"  value=" "  required><br>
          
           <?php echo $skuerror?>
          Price($)<input class="form-control" type="text" id="Price"  name="Price"  value=" " required><br>
          Select Type <select   onchange="change(this.value)"  id="myselect" type="text" name="TypeID" required>
          <option value="s">select Type</option>
          <option value="1" >Disk</option>
          <option value="2">Book</option>
          <option value="3">Furniture</option>
          
          </select><br>
           
          <p id="description" style="margin-top:10px;"></p>
          <div id="size"  style='visibility:hidden;'>Size(MB)<input class="form-control" type="text" name="size"  value=" " required ><br></div>
          
          <div id="weight" style='visibility:hidden;'>Weight(KG)<input class="form-control" type="text" name="weight"  value=" "required ><br></div>
          <p id="description" ></p>
          
          <div id="dimension">

          <div id="height" style='visibility:hidden;'> Height(CM)<input  class="form-control"  type="text" name="height"  value=" " required> <br> </div>   
          <div id="width" style='visibility:hidden;' >  Width(CM)<input class="form-control" type="text" name="width"  value=" " required><br> </div> 
           <div id="Length" style='visibility:hidden;' > Length(CM)<input class="form-control"  type="text" name="Length"  value=" " required><br> </div>
           <p id="description" ></p>
          </div>
          
        
             <div class="s">
             <input   class="btn btn-primary btn-sm"    type="submit" name="submit" value="submit"  text="submit">

             </div>
           

     </form>
     </div>
     </div>















   <script>
      
   </script>












       
</body>

</html>


















