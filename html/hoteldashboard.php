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
$menucost=array();
$menuquantity=array();
$menupic=array();
 $sql="SELECT food_name,cost,quantity,pic FROM hotelmenu where hotel_id='$myhotelid' ";

$result=mysqli_query($con,$sql);
$i=0;
if(mysqli_num_rows($result)){
  while($rows=mysqli_fetch_assoc($result)){
$menucost[$i]=$rows['cost'];
$menufood[$i]=$rows['food_name'];
$menupic[$i]=$rows['pic'];
$menuquantity[$i]=$rows['quantity'];

$i++;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../css_files/bootstrap.min.css"> -->

    <title>Hotel DashBoard</title>
    <link rel="stylesheet" href="../css_files/hoteldashboard.css">
    <style>
 .addmenu{
            margin:0 auto;
            width: 50%;
            background-color: rgb(30, 181, 201);
            padding: 20px;
            position:absolute;
            top:-500px;
            left:20%;
            right:20%;
            transition:2s;
            display:none;
            border-radius:20px;
        }
        .addmenu label{
            display: block;
            margin-bottom: 10px;
        }
        .addmenu input{
            display: block;
            margin-bottom: 15px;
            width: 100%;
            height: 30px;
        }


        #delfood{
   display: none;
    width: 400px;
    height: 400px;
    background-color: rgb(49, 49, 49);
    counter-reset: white;
    margin: 100px auto;
    position:absolute;
    top:-500px;
    transition:2s;
left:30%; 
right:30%;   
}
#delfood label{
    display: block;
    margin: 20px 0 20px 20px;
    width: 360px;
    /* border: 2px solid green; */
font-size: 20px;
color: white;
font-family: sans-serif;


}
#delfood input{
    display: block;
    height: 40px;
    width: 360px;
    margin: 20px 0 20px 20px;
    font-size: 20px;
}
#delfood img{
    width: 100px;
    height: 100px;
    display: block;
    margin: 10px auto;
}
#delfood input[type="submit"]{
    background-color: orangered;
    border:none;
    transition: 0.7s;
}
#delfood input[type="submit"]:hover{
    transform: scale(0.9);
}
.fa-sign-out,.fa-home,.fa-grav{
        margin-right: 15px;
       font-size: 20px;
       
    }
    a .fa-times{
      margin-left:10px;
      font-size:20px;
      color:white;
      margin-bottom:10px;
display:block;
    }

</style> 
</head>
<body>
    <div class="container" id="blur">
        <header>
            <img src="../images/logo.png"  alt="">
            <p><b>Order <span style="color: rgb(9, 223, 238); opacity: 0.7;font-size:30px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> Food Now</span></b></p>
           <nav>
            <ul>
                <li><a href="#" class="bar">B</a></li>
                <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>home</a></li>

                     
                <li>
                    <a href="../php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>LogOut</a>
   
                    </li>
                    <li><a href="review.php"><i class="fa fa-grav" aria-hidden="true"></i>More</a>
                       
                    </li>

                </li>
                <li><a href="#" class="cbar">C</a></li> 
              
            </ul>
           </nav>
        </header>
        <section class="menu">
<?php

$sql1="SELECT hotel_name FROM account where hotel_id='$myhotelid' ";
$result1=mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)){
  while($rows=mysqli_fetch_assoc($result1)){
    echo '<h2 style="color:red;text-shadow:0 0 5px 5px orange;">';echo $rows['hotel_name'];echo '</h2>';
    echo '<h2 style="color:red;text-shadow:0 0 5px 5px orange;margin-left:50px;"> Hotel Id : ';echo $myhotelid;echo '</h2>';
  }
}

?>
         <h1></h1>
        </section>

        <section class="slideshow-container">

          <div class="mySlides fade">
        
            <img src="../images/r1.png" >

               <h2 style="color: white;text-align: center;">FOOD FROM YOUR FAVORITE RESTAURENT</h2>
          
          </div>
        
          <div class="mySlides fade">
          
            <img src="../images/r2.jpg" >
            <h2 style="color: white;text-align: center;">GIVE YOU FRESH FOOD</h2>
          
          </div>
        
          <div class="mySlides fade">
           
            <img src="../images/r3.jpg" >
            <h2 style="color: white;text-align: center;">ORDER IN FEW MINUTES INTO YOUR HOMES</h2>
          
          </div>
          <div class="mySlides fade">
        
            <img src="../images/r4.jpg" >
            <h2 style="color: white;text-align: center;">FOOD WITH MONEY BACK</h2>
          
          </div>
        
          <div class="mySlides fade">
          
            <img src="../images/r5.jpg" >
          
          </div>
        
        
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </section>

        <p style="text-align: center; font-size: 120px; color: blue;margin: 40px 0 30px 0;text-shadow: 0 0 10px 10px teal;">Menu Cards</p>
        <section class="mymenu menucard">
            <table>
            <tr>
                  <th>S.N</th>
                  <th>Food</th>
                  <th>Fees</th>
                  <th>Preview</th>
                  <th>Delete</th>
                </tr>

<?php

for($j=0 ;$j<$i ; $j++){

  echo '<tr>';
  echo '<td>';echo $j+1;echo '</td>';
  echo '<td>';echo $menufood[$j];echo '</td>';
  echo '<td> Rs ';echo $menucost[$j];echo '</td>';
  echo '<td>'; echo "<img src='../images/".$menupic[$j]."' >";echo '</td>';
  echo '<td><a href="#" onclick="delfood()">Delete<a></td>';
  echo '</tr>';
}

?>
<tr>
  <td><a href="#" onclick="addmenu()"> Add Food</a></td>
</tr>

              </table>
        </section>
        <p style="text-align: center; font-size: 80px; color: blue;margin: 40px 0 30px 0;text-shadow: 0 0 10px 10px teal;">Best Cooks of The Hotel</p>
       
        <section class="cooks">
            <img src="../images/cook1.jpg" alt="">
            <img src="../images/cook2.jpg" alt="">
            <img src="../images/cook3.jpg" alt="">
            <img src="../images/cook4.jpg" alt="">
            <img src="../images/cook5.jpg" alt="">
        </section>





        <div class="footer">
            <div class="mycontent">
                <div class="about">
                    <h2>About Us</h2>
                    <p>Our caompany is IT company in global market.It provide you best Picture choosen by Author different countries.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolore rem ducimus, id nam totam dicta iusto! Possimus 
                        soluta ad qui praesentium sequi quas earum maiores, laudantium voluptatum corrupti porro.
         
                    </p>
                </div>
                <div class="link">
                    <p>Special</p>
                 <ul>
                     <li><a href="#">Home</a></li>
                     <li><a href="#">Privacy Policy</a></li>
                     <li><a href="#">Disclaimer</a></li>
                     <li><a href="html pages/coantact.html">Contact</a></li>
                     <li><a href=#>Colloboraters</a></li>
                 </ul>
                </div>
                <div class="link">
                    <p>Details</p>
                 <ul>
                     <li><a href="#">Transaction</a></li>
                     <li><a href="#">Best</a></li>
                     <li><a href="#">Location</a></li>
                     <li><a href=#>Customers</a></li>
                     <li><a href=#>Tenants</a></li>
                 </ul>
                </div>
                </div>
               
                <div class="social">
                    <span class="face"><i class="fa fa-facebook"></i></span>
                    <span class="twit"><i class="fa fa-twitter"></i></span>
                    <span class="insta"><i class="fa fa-instagram"></i></span>
                    <span class="linked"><i class="fa fa-linkedin"></i></span>
                    <span class="gmail"><i class="fa fa-google-plus"></i></span>
                </div>
               <span class="last"> Copyright &copy; All Rights Are Reserved.</span>
               
        </div>
        </div>

        <section class="addmenu" id="addmenu">
        <a style="display:block;" onclick="close2()"><i class="fa fa-times"></i></a>

<form action="../php/addmenu.php" method="POST" enctype="multipart/form-data">
<h3 style="text-align:center; color:gray;">Add Food Items</h3>


<label for="">Food Name</label>
<input type="text" name="name" id="">

<label for="">Cost</label>
<input type="text" name="cost" id="">

<label for="">Quantity</label>
<input type="text" name="quantity" id="">

<label for="">Hotel Id</label>
<input type="text" name="hotelid" id="">

<label for="">Pic</label>
<input type="file" name="pic" >
<input type="submit" name="upload"  value="Add">

</form>
</section>


<!-- deletefood  -->

<div id="delfood">
<a style="display:block;" onclick="close1()"><i class="fa fa-times"></i></a>
        <img src="../images/logo.png" alt="">
        <h2 style="text-align: center;color:orangered;">Get Your Food</h2>
        <form action="../php/delfood.php" method="POST">
        
        <label for="">Food Name</label>
        
        <input type="text" name="foodname" required>

        <?php
echo '<input type="text" name="hotelid" style="display:none;"  value="';echo $myhotelid ;echo '">';
        ?>
        
        <input type="submit" value="Enter" name="Enter">
        </form>
        
        </div>

               <script src="../javascript/hoteldashslider.js"></script>
                <script src="../javascript/hoteldashboard.js"></script>
                <script>
                   function close2(){
                    document.getElementById("addmenu").style.top="-600px";
                    document.getElementById("blur").style.opacity="1";
         
         }
         function close1(){
                    document.getElementById("delfood").style.top="-500px";
                    document.getElementById("blur").style.opacity="1";
         }
                </script>
</body>
</html>