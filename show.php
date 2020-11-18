<?php


class show{
    
    private $con;
    public function __construct(){
        $this->con= mysqli_connect('localhost','root','','Productlist');
        if(mysqli_connect_error()){
            echo mysqli_connect_error();
        }
    }

    public function displaybook(){

      $query='SELECT Products.SkuID,Products.Name,Products.Price,Books.weight FROM Products,Books where Products.SkuID=Books.SkuID';
      $getQuery= mysqli_query($this->con,$query);
      $responseArray= array();
     while( $Data= mysqli_fetch_array($getQuery)){
        $responseArray[]=$Data;
      }
    return $responseArray;     

      

}
public function displaydisk(){

    $query='SELECT Products.SkuID,Products.Name,Products.Price,Disk.size FROM Products,Disk where Products.SkuID=Disk.SkuID';
      $getQuery= mysqli_query($this->con,$query);
      $responseArray= array();
     while( $Data= mysqli_fetch_array($getQuery)){
        $responseArray[]=$Data;
      }
  return $responseArray;     

    

}
public function displayfurniture(){

    $query='SELECT Products.SkuID,Products.Name,Products.Price,Furniture.height,Furniture.width,Furniture.Length FROM Products,Furniture where Products.SkuID=Furniture.SkuID';
      $getQuery= mysqli_query($this->con,$query);
      $responseArray= array();
     while( $Data= mysqli_fetch_array($getQuery)){
        $responseArray[]=$Data;
      }
      return $responseArray;
  return $responseArray;     

    

}

public function massDelete($data)
{
  // print_r($data);die;
  foreach ($data as $key => $value) {
    // echo $key;
    foreach ($value as $k => $v) {
      $query="Delete from  $key where SkuID = '".$v."' ";
      $getQuery= mysqli_query($this->con,$query);
      $query="Delete from  Products where SkuID = '".$v."' ";
      $getQuery= mysqli_query($this->con,$query);



      // if($getQuery){
      //     return true ;
      // } else{
      //      return mysqli_errno($this->con); 
      // }
    }
    // print_r($value);
  }
  // die;
}





}

$show= new show();
$delete= new show();
if ($_POST) {
  $delete->massDelete($_POST);
  
  
}
$recordbook= $show->displaybook();
$recorddisk= $show->displaydisk();
$recordfurniture= $show->displayfurniture();





?>



<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
<link rel="stylesheet" href="index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
<body>

<div class="container">
<div class="container-sm">

<h1>Product List</h1>
<div class="c">
  <a href="add.php"><button class="btn btn-secondary btn-sm">ADD</button></a>

  </div>
  <hr style="width:100%;background-color:white;">



  
    


    <div class=" Productadd" >
<form method="post" action="">
  
          
     <?php  foreach($recordbook as $val){ ?>
 <div class="product" >
          <input type="checkbox" name="Books[]" value="<?php echo $val['SkuID'];?>">
          <?php echo $val['SkuID'];?>
          <?php echo $val['Name'];?>
          <?php echo $val['Price'];?>
          <?php echo $val['weight'];?>
          
     </div>  
          
          

     <?php }?>
     
 
  
          
           
     <?php  foreach($recorddisk as $val){ ?>
       
        <div class="product" >
          <input type="checkbox" name="Disk[]" value="<?php echo $val['SkuID'];?>">
          <?php echo $val['SkuID'];?>
          <?php echo $val['Name'];?>
          <?php echo $val['Price'];?>
          <?php echo $val['size'];?>
          
        
          
          </div>

     <?php }?>
     
     
  
  
         <table border="1">
            
     <?php  foreach($recordfurniture as $val){ ?>

        <div class="product">
  <input type="checkbox" name="Furniture[]" value="<?php echo $val['SkuID'];?>">
          <?php echo $val['SkuID'];?>
          <?php echo $val['Name'];?>
          <?php echo $val['Price'];?>
          <?php echo $val['width'];?> x
          <?php echo $val['Length'];?> x
          <?php echo $val['height'];?>
        
     </div>
          
          

     <?php }?>
     
  

  

  <div class="ss">
  <button class="btn btn-primary btn-sm"  type="submit">Delete</button>

  </div>



</form>
</div>
</div>
</div>
</body>
</html>