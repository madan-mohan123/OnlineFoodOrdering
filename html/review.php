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
    <link rel="stylesheet" href="../css_files/index.css">
    <link rel="stylesheet" href="../css_files/bootstrap.min.css">
    <script src="../javascript/jquery-3.5.1.js"></script>
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
.container-fluid{
    margin:0;
    padding:0;
}


.myprog{
  background-color:white;
  padding:20px;
  border:1px solid gray;
  border-radius:5px;
}
.myprog .shstatus{
  margin-top:30px;
  width:100%;
  justify-content:center;
  align-items:center;
  display:flex;
}
.myprog .mbox{
  margin-right:10px;
}
.myprog .shstatus .box1{
width:20px;
height:20px;
margin-right:10px;
}
.mytarget{
  background-color:white;
  padding:20px;
  width:75%;
  margin:30px auto;
  border:1px solid gray;
  border-radius:5px;
 
}
.mytarget .mtbox{
  justify-content:center;
  align-items:center;
  display:flex; 
}
.mytarget .tbox{
  border:1px solid gray;
margin:10px;
  width:47%;
  padding:20px;
}
.mytarget .tbox:after{
  display:block;
  content:'';
  clear:both;
}

.section-2 .card:hover{
  opacity: 0.9;
  position: relative;
  top:-15px;
  background-image: none;
  

  }
  .section-2 img{
    border-radius:0;
  }


       
    </style>
   
</head>
<body>
    <div class="container-fluid">

        <header>
            <img src="../images/logo.png"  alt="">
            <p><b>Order <span style="color: rgb(9, 223, 238); opacity: 0.7;font-size:30px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> Food Now</span></b></p>
           <nav>
            <ul>
               
                <li><a href="../index.html" class="bg-warning">home</a></li>
                
               
                    <li><a href="../php/logout.php">Logout</a></li>

                </li>
                <li> 
                  <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
              </form></li>
           
              
            </ul>
         
           </nav>
        
           </header>

           <section class="hotel-pic">
            <img src="../images/r2.jpg" alt="">
        </section>

<div class="myprog " style="margin:20px auto;width:75%">
<h1 class=" mt-7 mb-3">Rankings</h1>
<hr>
       <div class="progress mb-2" style="height:40px; width:100%">
  <div class="progress-bar bg-primary h4" role="progressbar" style="width: 35%;height:100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">1,200</div>
</div>
<div class="progress mb-2" style="height:40px; width:100%">
  <div class="progress-bar bg-success h4" role="progressbar" style="width: 50%;height:100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">13,000</div>
</div>
<div class="progress mb-2" style="height:40px; width:100%">
  <div class="progress-bar bg-info h4" role="progressbar" style="width: 15%;height:100%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">45</div>
</div>
<div class="progress mb-2" style="height:40px; width:100%">
  <div class="progress-bar bg-secondary h4" role="progressbar" style="width: 80%;height:100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">1,50,000</div>
</div>
<div class="progress mb-2" style="height:40px; width:100%">
  <div class="progress-bar bg-warning h4" role="progressbar" style="width: 60%;height:100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">50,000</div>
</div>

<div class="shstatus">
  <div class="mbox">
  <div class="box1 bg-primary">
  </div>
  <div>Orders</div>
</div>
<div class="mbox">
  <div class="box1 bg-success"></div>
  <div>Likes</div>
</div>
<div class="mbox">
  <div class="box1 bg-info"></div>
  <div>Dislikes</div>
</div>
<div class="mbox">
  <div class="box1 bg-secondary"></div>
  <div>Visit</div>
</div>
<div class="mbox">
  <div class="box1 bg-warning"></div>
  <div>Customers</div>
</div>
</div>
</div>

<div class="mytarget">
  <h2>Target sales</h2>
  <h5 style="opacity:0.7;">Total performance of this month</h5>
<div class="mtbox">
  <div class="tbox">
    <div class="toptext">
<p style="float:left">Sale</p>
<h4 style="float:right;color:blue;"><b>4,000</b></h4>
</div>
  <div class="progress mb-2" style="height:10px; width:100%">
  <div class="progress-bar bg-primary h4" role="progressbar" style="width: 65%;height:100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="toptext">
<p style="float:left;opacity:0.7;color:gray;">Monthly target</p>
<h4 style="float:right;opacity:0.7;color:gray;">60%</h4>
</div>
  </div>

  <div class="tbox">
    <div class="toptext">
<p style="float:left">Orders</p>
<h4 style="float:right;color:orange;"><b>15,000</b></h4>
</div>
  <div class="progress mb-2" style="height:10px; width:100%">
  <div class="progress-bar bg-warning h4" role="progressbar" style="width: 70%;height:100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="toptext">
<p style="float:left;opacity:0.7;color:gray;">Monthly Orders</p>
<h4 style="float:right;opacity:0.7;color:gray;">70%</h4>
</div>
  </div>
</div>
</div>


        <h1 style="text-align: center; color: blue;">Review Panel</h1>

        <section class="section-2 " >   
         
 
          <div class="row pl-2 pr-2 no-gutters" >
              <div class="col-sm-6 col-md-3 col-lg-3 col-xs-4 pl-2 pr-2 mycarts">
          <div class="card text-left">
            <img class="card-img-top" src="../images/img_avatar2.png" alt="">
            <div class="card-body">
              <h4 class="card-title">Krish</h4>
              <hr>
              <p class="card-text"> Much better</p>
              <p class="card-text">
                <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
              </p>
            </div>
          </div>
          
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3 col-xs-4 pl-2 pr-2 mycarts">
                  <div class="card text-left">
                    <img class="card-img-top" src="../images/User_Avatar-256.png" alt="">
                    <div class="card-body">
                      <h4 class="card-title">Rohan</h4>
                      <hr>
                      <p class="card-text"> Fast Delivery</p>
             
                      <p class="card-text">
                        <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
                      </p>
                    </div>
                  </div>
                  
                      </div>
                      <div class="col-sm-6 col-md-3 col-lg-3 col-xs-4 pl-2 pr-2 mycarts">
                          <div class="card text-left">
                            <img class="card-img-top" src="../images/avatar1.png" alt="">
                            <div class="card-body">
                              <h4 class="card-title">Udit</h4>
                              <hr>
                              <p class="card-text"> Fresh and tasty?</p>
             
                              <p class="card-text">
                                <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
                              </p>
                            </div>
                          </div>
                          
                              </div>
                              <div class="col-sm-6 col-md-3 col-lg-3 col-xs-4 pl-2 pr-2 mycarts">
                                  <div class="card text-left">
                                    <img class="card-img-top" src="../images/img_avatar2.png" alt="">
                                    <div class="card-body">
                                      <h4 class="card-title">Karan</h4>
                                      <hr>
                                      <p class="card-text"> Nice food?</p>
             
                                      <p class="card-text">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span></p>
                                    </div>
                                  </div>
                                  
                                      </div>  
                                      <div class="col-sm-6 col-md-3 col-lg-3 col-xs-4 pl-2 pr-2 mycarts" style="display: none;">
                          <div class="card text-left">
                            <img class="card-img-top" src="../images/avatar1.png" alt="">
                            <div class="card-body">
                              <h4 class="card-title">Udit</h4>
                              <hr>
                              <p class="card-text"> Fresh and tasty?</p>
             
                              <p class="card-text">
                                <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
                              </p>
                            </div>
                          </div>
                                        
                                            </div>  
                                            <div class="col-sm-6 col-md-3 col-lg-3 col-xs-4 pl-2 pr-2 mycarts" style="display: none;">
                                  <div class="card text-left">
                                    <img class="card-img-top" src="../images/img_avatar2.png" alt="">
                                    <div class="card-body">
                                      <h4 class="card-title">Karan</h4>
                                      <hr>
                                      <p class="card-text"> Nice food?</p>
             
                                      <p class="card-text">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span></p>
                                    </div>
                                  </div>
                                  
                                      </div> 
                                                  
                                                                <button  class="mypre" onclick="mplusSlides(-1)">&#10094;</button>
                                                                <button class="mynext" onclick="mplusSlides(1)">&#10095;</button>
          </div>
       
                  </section>
      
        <h1 style="text-align: center;color: blue;font-size: 70px;margin: 30px 0 30px 0;">Order Deliveries</h1>
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
           <script>
var slidein = 4;
function mplusSlides(n) {
if(n>0){
mshowSlides(slidein += n);
}
else{
  mshowSlidesminus(slidein += n);
}
}


function mshowSlides(n) {
var i;

var mslides = $('.mycarts');
if (n > mslides.length) {
    slidein = mslides.length;
    } 
if (n < 1) {
    slidein = mslides.length;
    }
if(n <= mslides.length && n>4){
mslides[n-5].style.display = "none"; 
mslides[n-1].style.display = "block"; 
mslides[n-2].style.display = "block"; 
mslides[n-3].style.display = "block"; 
mslides[n-4].style.display = "block"; 

}

}

function mshowSlidesminus(n) {

var i;
var mslides = document.getElementsByClassName("mycarts");
if (n > mslides.length) {
    slidein = mslides.length;
    } 
if (n < 4) {
    slidein = 4;
    }
if(n <= mslides.length && n>=4){
mslides[n-1].style.display = "block"; 
mslides[n-2].style.display = "block"; 
mslides[n-3].style.display = "block"; 
mslides[n-4].style.display = "block"; 
mslides[n].style.display = "none"; 
}

}
           </script>
           </body>
</html>
