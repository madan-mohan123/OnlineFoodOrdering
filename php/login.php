<?php
session_start();
?>

<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "onlinefoodordering";  
  
$con = mysqli_connect($host, $user, $password, $db_name); 
 
$password = $_POST['pass'];  
$email = $_POST['email'];


$sql="SELECT email,password,hotel_id,hotel_name FROM account where password='$password' and email='$email'";
$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)){

    while($row=mysqli_fetch_assoc($result)){
        $_SESSION["hotel_id"]= $row["hotel_id"];
        $_SESSION["hotel_name"]=$row["hotel_name"];
       
    }
   $_SESSION["email"]=$email;
   header("Location: ../html/hoteldashboard.php");



 }
else {
    echo "<script>alert('Check your email and password!')</script>";
    header("Location: ../html/signin.html");
 
}
mysqli_close($con);
?>