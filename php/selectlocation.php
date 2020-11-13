
<?php

session_start();
?>
<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "onlinefoodordering";   
$con = mysqli_connect($host, $user, $password, $db_name); 


//current date
$orderdate=date("Y-m-d");
$address=$_POST['address'];
$hotelname=$_SESSION[myhotelname];
$foodname=$_SESSION[foodname];
$hotelid=$_SESSION[myhotelid];
$contact=$_POST['contact'];

 $sql="INSERT INTO delivered(FOOD_NAME,CONTACT_NO,HOTEL_ID,ORDER_DATE,ADDRESS,HOTEL_NAME) VALUES ('$foodname','$contact','$hotelid','$orderdate','$address','$hotelname')";
 if($con->query($sql) === TRUE){
             
           
    header("Location: ../html/Search.php");
   // echo '<h1>hellomd : ';echo $_SESSION[myhotelname];echo $_SESSION[myhotelid];echo '</h1>';

}
else{
    //echo '<h1>hello1234 : ';echo $_SESSION[myhotelname];echo $_SESSION[myhotelid];echo '</h1>';
}
?>
