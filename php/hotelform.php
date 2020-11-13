<?php   
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "onlinefoodordering";   
    $con = mysqli_connect($host, $user, $password, $db_name);  
     
    $hotelname = $_POST['name'];  
    $contact = $_POST['contact'];  
    $email = $_POST['email'];
    $address=$_POST['address'];
    $foodtype1=$_POST['foodtype1'];
    $foodtype2=$_POST['foodtype2'];
    
         $sql ="INSERT INTO hoteldetails(HOTEL_NAME,EMAIL,ADDRESS,CONTACT_NO,VEG,NONVEG) VALUES ('$hotelname','$email','$address','$contact','$foodtype1','$foodtype2')"; 
         if($con->query($sql) === TRUE){
         header("Location: ../html/hoteldashboard.php");


}
else
{
echo " sorry". "<br>". $sql ."<br>" 
. $con->error;
} 

$con->close();        
?> 