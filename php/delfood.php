<?php 
session_start();  
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "onlinefoodordering";   
    $con = mysqli_connect($host, $user, $password, $db_name);  
     
    $name = ""; 
  $hid="";
    $check=0;
    


      $hid=$_POST['hotelid'];
      $name = $_POST['foodname'];  
    



          if($name!="" ){
            $check=1;
          }
  

if($check==1){
    $sql = "DELETE FROM hotelmenu where hotel_id='$hid' and food_name='$name'"; 

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