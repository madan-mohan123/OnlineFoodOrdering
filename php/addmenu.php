<?php 
session_start();  
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "onlinefoodordering";   
    $con = mysqli_connect($host, $user, $password, $db_name);  
     
    $name = ""; 
    $cost = "";
    $quantity = "";
   $filename="";
    $hid="";
    $check=0;
    
    if (isset($_POST['upload'])) { 

      $hid=$_POST['hotelid'];
      $name = $_POST['name'];  
      $cost = $_POST['cost'];  

 
      $quantity = $_POST['quantity'];

      $filename = $_FILES["pic"]["name"]; 
      $tempname = $_FILES["pic"]["tmp_name"];     
          $folder = "..//images/".$filename; 
          
          //move image into folder
          move_uploaded_file($tempname, $folder);


          if($hid!="" && $name!="" && $cost!="" && $quantity!="" $filename!=""){
            $check=1;
          }
  }

if($check==1){
    $sql = "INSERT INTO hotelmenu(HOTEL_ID,COST,FOOD_NAME,PIC,QUANTITY) VALUES ('$hid','$cost','$name','$filename','$quantity')"; 

 if($con->query($sql) === TRUE){            

   header("Location: ../html/hoteldashboard.php");


}
else
{
echo " sorry". "<br>". $sql ."<br>" 
. $con->error;
}
} 

$con->close();        
?> 