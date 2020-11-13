

<?php
session_start();


if (isset($_POST['order'])) { 
$_SESSION["myhotelid"]=$_POST['order'];
$_SESSION["myhotelname"]=$_POST['hotelname'];
$_SESSION["foodname"]=$_POST['foodname'];

// echo '<h1>hello : ';echo $_SESSION[myhotelname];echo $_SESSION[myhotelid];echo '</h1>';
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="../css_files/LocationForm.css" />
    <style>
      body{
        background-image: linear-gradient(blue,white);
        height: 100vh;
      }
      .container{
        background-image: linear-gradient(blue,white);
      }
    </style>
    <title>Select Location</title>
  </head>
  <body>
    <h1 style="text-align: center;color: white;margin: 20px 0 30px 0;">Enter Your Location</h1>
    <div class="container">
      <form action="../php/selectlocation.php" class="location" method="POST">
        <fieldset>
          <legend>
            <i class="fa fa-map-marker"></i> Add Your Delivery Location
          </legend>
          <div class="text-adder">
            <h3>Address Line 1:</h3>
            <input
              type="text"
              name="address"
              class="Address"
              id="Address1"
              placeholder="H No./Flat No."
              required
            />
            <h3>Address Line 2:</h3>
            <input
              type="text"
              name="address2"
              class="Address"
              id="Address2"
              placeholder="Locality"
              required
            />
            <h3>Enter Your City:</h3>
            <input
              type="text"
              name="city"
              class="Address"
              id="Address3"
              placeholder="City"
              required
            />
            <h3>Enter Your State:</h3>
            <input
              type="text"
              name="state"
              class="Address"
              id="Address4"
              placeholder="State/UT"
              required
            />

            <div class="pin-num">
              <h3>Enter PIN:</h3>
              <input
                type="text"
                name="pin"
                class="NumberField"
                id="NumberField1"
                required
                pattern="[0-9]{6}"
              />
              <h3>Enter Your Mobile No.:</h3>
              <input
                type="text"
                name="contact"
                class="NumberField"
                id="NumberField2"
                required
                pattern="[6789][0-9]{9}"
              />
            </div>
            <div class="submit">
              <input type="submit" value="Add Address" />
              <input type="reset" value="Reset Address" />
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>
