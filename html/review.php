<?php
session_start();
?>
<?php


$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "onlinefoodordering";   
$con = mysqli_connect($host, $user, $password, $db_name); 

$myemail=$_SESSION[email];
$myhotelid=$_SESSION[hotel_id];
$menufood=array();
$menustatus=array();
$menuaddress=array();
$menuorderdate=array();
$menudeliverdate=array();
$menucontact=array();


 $sql="SELECT food_name,order_date,delivered_date,contact_no,address,status FROM delivered where hotel_id='$myhotelid' ";

$result=mysqli_query($con,$sql);
$i=0;
if(mysqli_num_rows($result)){
  while($rows=mysqli_fetch_assoc($result)){
$menufood[$i]=$rows['food_name'];
// $myfoodname=$rows['food_name']
$menustatus[$i]=$rows['status'];
$menuaddress[$i]=$rows['address'];
$menuorderdate[$i]=$rows['order_date'];
$menudeliverdate[$i]=$rows['delivered_date'];
$menucontact[$i]=$rows['contact_no'];

$i++;
  }
}

$sqlac="SELECT food_name FROM delivered where hotel_id='$myhotelid' ";

$resultac=mysqli_query($con,$sqlac);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../OnlineFoodOrdering/css_files/index.css">
    <title>Hot Food</title>
    <style>
        body{
        background-image: url(../images/pro2.png);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
        }
  


  *{
padding: 0;
margin: 0;
box-sizing: border-box;
font-family: Verdana, Geneva, Tahoma, sans-serif;
}


header{

/* background-color:rgba(53, 3, 68,0.9); */
background-image: linear-gradient(45deg,red,orange,teal);
height: 80px;
padding: 0 20px;
width: 100%;



}
.cbar,.bar{
  display: none;
}

nav{
float: right;
}
nav ul li{
list-style: none;
display: inline-block;
line-height: 80px;
}
nav ul li a{

text-decoration: none;
font-size: 17px;
color: white;
padding: 10px 20px;
border-radius: 10px;
text-transform: uppercase;
transition: 0.6s;
}
nav a:hover{
background-color: rgb(57, 50, 68);

color:rgb(206, 204, 209);


}


header img{
border-radius: 20px 0 20px 0;
width:120px;
height:70px;
padding-top: 5px;
float:left;

position: relative;
left: 0;
z-index: 1;  
}
header p{

display: inline-block;
line-height: 80px;
margin-left: 50px;
font-family: Verdana, Geneva, Tahoma, sans-serif;
font-size: 20px;
color:rgb(209, 209, 200);
}
@media (max-width: 500px){
header p{
  display: none;
}
}
.hotel-pic img{
    width: 100%;
    height: 500px;
    display: block;
    margin: 20px 0 20px 0;
    box-shadow: 0 0 10px 10px goldenrod;
}
.reviews{
    width: 100%;
    margin: 30px 0 30px 0;
}
.reviews .review1{
    width: 80%;
    /* height: 120px; */
 
    background-image: linear-gradient(white,gray);
    opacity: 1;
    border: 1px solid gray;
    margin: 20px 0 20px 0;
    margin: auto;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 20px;
}
.reviews .review1 p{
    opacity: 0.8;
    margin-bottom: 10px;
}

table,th,tr,td{
    border-collapse: collapse;

}
table{
    border:2px solid black;
    width: 80%;
    margin:30px auto;
    background-color: cornflowerblue;
}
table tr th{
    background-color: teal;
}
table th,td{
text-align: center;
}
table tr{
    height: 30px;
    transition: 0.6s;
}
table tr:nth-child(2n+1){
    background-color: gray;
}



       
    </style>
   
</head>
<body>
    <div class="container">
        <header>
            <img src="../images/logo.png"  alt="">
            <p><b>Order <span style="color: rgb(9, 223, 238); opacity: 0.7;font-size:30px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> Food Now</span></b></p>
           <nav>
            <ul>
               
                <li><a href="../index.html">home</a></li>
                
               
                    <li><a href="../php/logout.php">Logout</a></li>

                </li>
           
              
            </ul>
           </nav>
           </header>
           <section class="hotel-pic">
            <img src="../images/r2.jpg" alt="">
        </section>
        <h1 style="text-align: center; color: teal;">Customers Review</h1>
        <section class="reviews">
            <div class="review1">
                <h4 style="margin-bottom: 20px;color: cornflowerblue;">Karan Rajput</h4>
                <hr size="5px" color="gray">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto, facilis odit sequi ea atque doloremque labore magnam quas tempora numquam.</p>
                <hr>
                <p>ratings</p>
            </div>
            <div class="review1">
                <h4 style="margin-bottom: 20px;color: cornflowerblue;">Karan Rajput</h4>
                <hr size="5px" color="gray">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto, facilis odit sequi ea atque doloremque labore magnam quas tempora numquam.</p>
                <hr>
                <p>ratings</p>
            </div>
            <div class="review1">
                <h4 style="margin-bottom: 20px;color: cornflowerblue;">Karan Rajput</h4>
                <hr size="5px" color="gray">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto, facilis odit sequi ea atque doloremque labore magnam quas tempora numquam.</p>
                <hr>
                <p>ratings</p>
            </div>
        </section>
        <h1 style="text-align: center;color: rgb(13, 203, 228);font-size: 70px;margin: 30px 0 30px 0;">Deliveries</h1>
        <section class="orders">
            <table>
                <tr>
                <th>S.N</th>
                <th>OrderDate</th>
                <th>FoodName</th>
                <th>Address</th>
                <th>DeliveredDate</th>
                <th>Contact</th>
                <th>Satatus</th>
                </tr>



<?php
for($j=0 ;$j<$i ; $j++){


    echo '<tr>';
    echo '<td>';echo $j+1;echo '</td>';
    echo '<td>';echo $menuorderdate[$j];echo '</td>';
    echo '<td>';echo $menufood[$j];echo '</td>';
    echo '<td>';echo $menuaddress[$j];echo '</td>';
    echo '<td>';echo $menudeliverdate[$j];echo '</td>';
    echo '<td>';echo $menucontact[$j];echo '</td>';
    echo '<td>';echo $menustatus[$j];echo '</td>';
    echo '</tr>';

}
    ?>


            </table>
        </section>
           </div>
           </body>
</html>
