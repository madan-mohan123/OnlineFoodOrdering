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

    $filename = $_FILES["pic"]["name"]; 
    $tempname = $_FILES["pic"]["tmp_name"];     
        $folder = "..//images/".$filename; 
        move_uploaded_file($tempname, $folder);
    
         $sql ="INSERT INTO hoteldetails(HOTEL_NAME,EMAIL,ADDRESS,CONTACT_NO,VEG,NONVEG,PIC,HOTEL_ID) VALUES ('$hotelname','$email','$address','$contact','$foodtype1','$foodtype2','$filename',$_SESSION[hotel_id])"; 
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