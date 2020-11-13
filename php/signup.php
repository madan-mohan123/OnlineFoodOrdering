<?php 
session_start();  
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "onlinefoodordering";   
    $con = mysqli_connect($host, $user, $password, $db_name);  
     
    $username = $_POST['username'];  
    $password = $_POST['pass'];  
    $email = $_POST['email'];
    
    $check=0;  

    $sqll="SELECT email FROM account where email='$email'";
    $resultl= mysqli_query($con,$sqll);


    if(mysqli_num_rows($resultl)){
        while($row=mysqli_fetch_assoc($resultl)){
         $check=1;
         header("Location: ../html/signup.html");
        
    }
}
   
if($check==0){

    $sql1="SELECT email,password,hotel_id,hotel_name FROM account where  email='$email'";
    $result1= mysqli_query($con,$sql1);
    
    if(mysqli_num_rows($result1)){
    
        while($row=mysqli_fetch_assoc($result1)){
            $_SESSION["hotel_id"]= $row["hotel_id"];
            $_SESSION["hotel_name"]=$row["hotel_name"];
           
        }
    }
       $_SESSION["email"]=$email;

         $sql = "INSERT INTO account(HOTEL_NAME,PASSWORD,EMAIL) VALUES ('$username','$password','$email')"; 
         if($con->query($sql) === TRUE){
             
           
             header("Location: ../html/hotelform.html");


}
else
{
echo " sorry". "<br>". $sql ."<br>" 
. $con->error;
} 
}
$con->close();        
?> 