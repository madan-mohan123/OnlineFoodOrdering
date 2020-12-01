
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Dashboard</title>
    <link rel="stylesheet" href="../css_files/orderdash.css" />

</head>
<body>
   


    <div class="container">
        <header>
            <img src="../images/logo.png"  alt="">
            <p><b>Order <span style="color: rgb(9, 223, 238); opacity: 0.7;font-size:30px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> Food Now</span></b></p>
           <nav>
            <ul>
         
                <li><a href="../html/search.php">Leave</a></li>

            </ul>
           </nav>
        </header>
        </div>

        


<div id="container">
<img src="../images/logo.png" alt="">
<h2 style="text-align: center;color:orangered;">Get Your Food</h2>

<form action="orderdash.php" method="POST">

<label for="">Contact No</label>

<input type="text" name="contact" id="" pattern="[6789][0-9]{9}">

<input type="submit" value="Enter" name="Enter">
</form>

</div>

        <section class="section-5">
            <p style="font-size:80px;padding-top:0;">Your's Orders!</p>


             <?php
     
     if(isset($_POST['Enter'])){
     

$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "onlinefoodordering";  
  
$con = mysqli_connect($host, $user, $password, $db_name); 
 
$contact = $_POST['contact']; 


if($contact!=""){
$sql="SELECT hotel_id,food_name,order_date,status,address,hotel_name FROM delivered where contact_no='$contact'";
$result= mysqli_query($con,$sql);
if(mysqli_num_rows($result)){

  

    echo '<script> 
    document.querySelector("#container").style.display="none";
    document.querySelector(".section-5").style.display="block";
    </script>';
    while($row=mysqli_fetch_assoc($result)){
        echo '  <div class="cards1">';
$fname=$row['food_name'];
$hotelid=$row['hotel_id'];

       $sqle="SELECT pic FROM hotelmenu where food_name='$fname' and hotel_id='$hotelid'";
       $resulte= mysqli_query($con,$sqle);

       if(mysqli_num_rows($resulte)){
        while($rowe=mysqli_fetch_assoc($resulte)){
      echo "<img src='../images/".$rowe['pic']."' >";
        }
    }
      echo'
      ';
echo ' <h2 style="text-align: center;">';echo $row['food_name'];echo '</h2>';
 echo '<p style="font-size:17px;color: teal;margin: 0 0;padding:0 10px;"> <b><span style="color:black;">Hotel : </b></span>';echo $row['hotel_name'] ;echo '</p>';    
 echo '<p style="font-size:17px;color: teal;margin: 0 0;padding:0 10px;"><b><span style="color:black;">Address : </b></span>';echo $row['address'] ;echo '</p>';   
 echo '<p style="font-size:17px;color: green;margin: 0 0;padding:0 10px;"><b><span style="color:black;">Order : </b></span>';echo $row['order_date'] ;echo '</p>';     
 echo '<p style="font-size:17px;color: golden;margin: 0 0;padding:0 10px;"><b><span style="color:black;">Status : </b></span>';echo $row['status'] ;echo '</p>'; 
 
 if($row['status']!="Delivered"){
 echo '
 
 <form action="orderdash.php" method="POST"> ';
 echo '<input style="display:none;" type="text" name="contact" value="';echo $contact; echo'">';
 echo '<input style="display:none;" type="text" name="hid" value="';echo $row['hotel_id']; echo'">';
echo '
 <input type="submit" value="Done" name="Done">
 </form>';  
 }  
 
 
 echo ' </div>';
 

}
}
else{
    echo '<script>alert("Invalid number")</script>';
}
}
else{

    header("Location: ../html/orderdash.php");
}

     }

?> 
            
           
        </section> 


</body>
</html>

<?php
if(isset($_POST['Done'])){
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "onlinefoodordering";  
      
    $con = mysqli_connect($host, $user, $password, $db_name); 
   
$cont=$_POST['contact'];
$hid=$_POST['hid'];
$dat=date("Y-m-d");



$sql1="UPDATE delivered SET  status='Delivered' , delivered_date='$dat' where hotel_id='$hid' and contact_no='$cont'";
mysqli_query($con, $sql1); 


}
?>