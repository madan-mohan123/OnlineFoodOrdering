<?php

session_start();
// $_SESSION['contact']="";
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Food Search</title>
    <link rel="stylesheet" href="../css_files/search.css" />
    <style>
      a {
        text-decoration: none;
        color: white;
        transition: 0.5s;
      }

      select {
        width: 400px;
        height: 40px;
        margin-top: 20px;
        margin: 30px auto;
        display: block;
        border-radius: 20px;
        padding: 10px;
        color: gray;
      }
      #hotelmenu {
        display: none;
      }
      .item::after {
        content: "";
        clear: both;
        display: block;
      }
      #hotelmenu table {
        width: 90%;
        margin: 30px auto;

        background-image: linear-gradient(gray, rgb(49, 48, 48));

        border-radius: 20px;
      }

      table tr,
      td {
        border-collapse: collapse;
      }

      #hotelmenu table td {
        padding: 20px 20px 0 20px;
        font-size: 20px;
        color: white;
        /* width: 350px; */
      }
      #hotelmenu tr p {
        padding-bottom: 10px;
        /* display: block; */
        margin: auto;
      }
      #hotelmenu td img {
        width: 250px;
        height: 150px;

        border-radius: 10px;
        margin-bottom: 20px;
      }
      .menucard {
        width: 100%;
        display: none;
      }
      .menucard table {
        width: 70%;
        margin: 30px auto;

        background-image: linear-gradient(
          rgb(161, 200, 223),
          rgb(13, 163, 223)
        );

        border-radius: 20px;
      }

      .menucard table th {
        border-bottom: 2px solid rgb(102, 100, 100);
        font-size: 20px;
        padding: 10px;
        color: rgb(124, 7, 233);
      }
      .menucard table tr,
      td,
      th {
        border-collapse: collapse;

        transition: 0.5s;
      }
      .menucard table td {
        text-align: center;
        color: white;
        padding: 5px;
      }
      .menucard table tr:hover:nth-child(n) {
        background-color: rgb(56, 126, 231);
        border-radius: 20px;
      }
      .menucard table tr td img {
        width: 100px;
        height: 50px;
        border-radius: 10px;
      }
      .menucard table tr td:nth-child(1) {
        width: 50px;
      }
      .menucard table tr td img:hover {
        transform: scale(1.3);
      }
      #hotelmenu table tr td img:hover {
        transform: scale(1.2);
        opacity: 0.9;
      }
      #hotelmenu input{
       display:inline-block;
       width:110px;
       height:30px;
       background-color:orange;
       color:white;
       border:none;
       border-radius:20px;
       
      }
      .food input{
        display:block;
        margin:10px auto;
        width:110px;
        height:30px;
        border:none;
        border-radius:20px;
        background-color:orange;
        cursor:pointer;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <img src="../images/logo.png" alt="" />
        <p>
          <b
            >Order
            <span
              style="
                color: rgb(9, 223, 238);
                opacity: 0.7;
                font-size: 30px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
              "
            >
              Food Now</span
            ></b
          >
        </p>
        <nav>
          <ul>
          <li><a href="../index.html">Home</a></li>
           
            <li><a href="#" onclick="menu()">hotels</a></li>
            <li><a href="../html/orderdash.php">myorder</a></li>
          </ul>
        </nav>
      </header>
      <section class="search">
        <form action="search.php" method="POST">
        <select name="restaurant" id="" aria-placeholder="choose hotel">
          <option value="Taj hotel">Taj hotel</option>
          <option value="Brijwasi Hotel">Brijwasi Hotel</option>
          <option value="Abhinanadan">Abhinanadan</option>
          <option value="Baba ka dhaba">Baba ka dhaba</option>
          <option value="centrum">centrum</option>
          <option value="none">none</option>
        </select>
        <input
          type="search"
          name="food"
          id="search"
          placeholder="search here..."
        />
        <input type="submit" name="" id="" value="Search" style="margin-top: 10px;width: 100px;"> 
        </form>

        <p
          style="
            color: white;
            text-align: center;
            margin-top: 20px;
            font-size: 25px;
          "
        >
          Get your Favorite food here...
        </p>
      </section>
        <section class="item" id="item">
      <?php  
    
    $host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "onlinefoodordering";  
  
$con = mysqli_connect($host, $user, $password, $db_name); 

     $food= $_POST['food']; 
     $restaurant=$_POST['restaurant']; 
     $cost="";
     $hotelid="";
     $hotelname="";
 $ch=0;
     if($restaurant!="none"){
      $sql1="SELECT hotel_id FROM account where hotel_name='$restaurant'";
      $result1= mysqli_query($con,$sql1);
      if(mysqli_num_rows($result1)){
        while($row=mysqli_fetch_assoc($result1)){
        $hotelid=$row['hotel_id'];
       $ch=1;
        break;
        }
      }    
     }
  if($ch==1){
    $sql="SELECT food_name,cost,hotel_id,pic FROM hotelmenu where food_name='$food' and  hotel_id='$hotelid'";
   
  }
  else{
    $sql="SELECT food_name,cost,hotel_id,pic FROM hotelmenu where food_name='$food'";
  }
    $result= mysqli_query($con,$sql);

    if(mysqli_num_rows($result)){
       while($row=mysqli_fetch_assoc($result)){
         $cost=$row['cost'];
         $food=$row['food_name'];
         $hotelid=$row['hotel_id'];


       

         echo' <section class="food">';
           echo "<img src='../images/".$row['pic']."' >";
          echo' <h3 style="text-align: center; color: black; margin-bottom: 10px">
             Rs ';
             echo $cost;
          echo' </h3>
           <p style="text-align: center; color: red; size: 15px">';
           if($ch==1){
           echo $restaurant ;
           }
          //  else{
          //   echo $hotelid ;
          //  }
           echo '</p>
          <p style="text-align: center; color: red; size: 15px">';
          echo $food;
          echo'</p>';

          echo '<form action="selectlocation.php" method="POST">';
          echo '<input style="display:none;" type="text" name="foodname" value="';echo $food; echo'">';
          echo '<input style="display:none;" type="text" name="order" value="';echo $hotelid; echo'">';
          echo '<input style="display:none;" type="text" name="hotelname" value="';echo $restaurant; echo'">';
           echo '<input type="submit" id="buy" name="upload" value="order">';
           echo '</form>';
        echo'</section>';

      }
    }
     ?>
      </section>

      <section id="hotelmenu">
      <table>
      <tr>

      <?php
      $htname="";
      $htid="";
      $cond=0;

$sqle="SELECT hotel_name,hotel_id FROM account";
$resulte= mysqli_query($con,$sqle);
if(mysqli_num_rows($resulte)){
  while($row=mysqli_fetch_assoc($resulte)){
   $htname=$row['hotel_name'];
   $htid=$row['hotel_id'];

   echo'<td>
     <a href="#">
     <img src="../images/r1.png" alt="" />
     <p style="padding-bottom: 20px">';
     echo $htname;
     echo '<form action="" method="POST" >';
     echo '<input style="display:none;" type="text" name="order" value="';echo $htid; echo'">';
     echo '<input style="display:none;" type="text" name="hotelname" value="';echo $htname; echo'">';
     echo '<input type="submit" name="menu" value="menu" >';
      echo '</form>';
     echo'</p>
     </a
   >
 </td>';
 $cond++;
 if($cond % 3 == 0){
   echo '</tr>';
   echo '<tr>';
 }
  }
}
      ?>
       
    
          </tr>
        </table>
      </section>

      <section class="menucard" id="menucard">
      <?php


if(isset($_POST['menu'])){
  $hname=$_POST['hotelname'];
 echo ' <h1 style="text-align:center;">';echo $hname;echo '</h1>';
}
      ?>

      
        <table>
        <tr>
            <th>S.N</th>
            <th>Food</th>
            <th>Fees</th>
            <th>Preview</th>
          </tr>


        <?php
   if(isset($_POST['menu'])){
     $id1=$_POST['order'];
   
echo '<script>document.getElementById("menucard").style.display = "block";</script>';
    $sqle="SELECT food_name,cost,hotel_id,pic FROM hotelmenu where hotel_id='$id1'";
    $resulte= mysqli_query($con,$sqle);
    $num=1;
    if(mysqli_num_rows($resulte)){
      while($row=mysqli_fetch_assoc($resulte)){
       echo' <tr>
        <td>';echo $num;echo '</td>
        <td>';
        echo $row['food_name'];
        echo'</td>
        <td>Rs ';
        echo $row['cost'];
        echo '</td>
        <td>';
        echo "<img src='../images/".$row['pic']."' >";
        echo '</td>
      </tr>';
      $num++;
    
    
      }
    
    }
   }
   else{
    echo '<script>document.getElementById("menucard").style.display = "none";</script>';
   }



?>


          
        </table>
      </section>

      <div class="footer">
        <div class="mycontent">
          <div class="about">
            <h2>About Us</h2>
            <p>
              Our caompany is IT company in global market.It provide you best
              Picture choosen by Author different countries. Lorem ipsum dolor
              sit amet consectetur adipisicing elit. Illum dolore rem ducimus,
              id nam totam dicta iusto! Possimus soluta ad qui praesentium sequi
              quas earum maiores, laudantium voluptatum corrupti porro.
            </p>
          </div>
          <div class="link">
            <p>Special</p>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Disclaimer</a></li>
              <li><a href="html pages/coantact.html">Contact</a></li>
              <li><a href="#">Colloboraters</a></li>
            </ul>
          </div>
          <div class="link">
            <p>Details</p>
            <ul>
              <li><a href="#">Transaction</a></li>
              <li><a href="#">Best</a></li>
              <li><a href="#">Location</a></li>
              <li><a href="#">Customers</a></li>
              <li><a href="#">Tenants</a></li>
            </ul>
          </div>
        </div>

        <span class="last"> Copyright &copy; All Rights Are Reserved.</span>
      </div>
    </div>
    <script src="../javascript/search.js">
     
    </script>
  </body>
</html>

