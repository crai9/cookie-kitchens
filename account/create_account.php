<?php 
session_start();
if (isset($_SESSION["user"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 

if (isset($_POST["firstName"]) && isset($_POST["password"]) && isset($_POST["lastName"]) && isset($_POST["address"]) && isset($_POST["telephone"]) && isset($_POST["mobile"]) && isset($_POST["postcode"]) && isset($_POST["email"])) {
      
$con=mysqli_connect("localhost","php_user","php_pass","cookie_kitchens");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$telephone = mysqli_real_escape_string($con, $_POST['telephone']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$postcode = mysqli_real_escape_string($con, $_POST['postcode']);
$email = mysqli_real_escape_string($con, $_POST['email']);


$sql="INSERT INTO customers (customerID, customerFirstName, customerLastName, customerPassword, customerAddress, customerTelephone, customerMobile, customerPostcode, customerEmail)
VALUES (NULL, '$firstName', '$lastName', '$password', '$address', '$telephone', '$mobile', '$postcode', '$email')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}  

    header("location: user_login.php");
    exit();
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>    
    <head>
        <meta charset="UTF-8">
        <title>Cookie Kitchens</title>
        <link rel="icon" href="/img/icon/cookie.png" />
        <link rel="stylesheet" href="../cookies.css" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css' />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="jquery.slides.min.js"></script>
        <script>
            $(function() {
                $('#slides').slidesjs({
                    width: 960,
                    height: 400
                });
            });
        </script>
    </head>
    
    <body style="overflow-x: hidden;">
        <div class="top">
            <div class="main">
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="../kitchens.php">Kitchens</a>
                    </div>
                </div>
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="../search.php">Search</a>
                    </div>
                </div>
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="../order.php">Order</a>
                    </div>
                </div>
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="../account.php">Account</a>
                    </div>
                </div>
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="../login.php">Login</a>
                    </div>
                </div>
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="../admin/index.php">Admin</a>
                    </div>
                </div>
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="#">Navigation</a>
                    </div>
                </div>
            </div>
            <div class="main2">
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="../index.php" style="padding-left: 80px;">Cookie Kitchens</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container1">
             <h3>Account</h3>

            <div class="box shadow">
                
				<p style="padding-top: 15px;">Account creation</p>
                                <p style="padding-top: 15px;">Fill in the details below to create your Cookie Kitchens account.</p>
                                <br/>
<form id="form1" name="form1" method="post" action="create_account.php">
        <p>First Name:</p>
        <p><input name="firstName" type="text" id="firstName" size="40" /></p>
        <br />
        <br />
        <p>Password:</p>
        <p><input name="password" type="password" id="password" size="40" /></p>
        <br />
        <br />
        <p>Last Name:</p>
        <p><input name="lastName" type="text" id="lastName" size="40" /></p>
        <br />
        <br />
        <p>Address:</p>
        <p><input name="address" type="text" id="address" size="40" /></p>
        <br />
        <br />
        <p>Telephone:</p>
        <p><input name="telephone" type="text" id="telephone" size="40" /></p>
        <br />
        <br />
        <p>Mobile:</p>
        <p><input name="mobile" type="text" id="mobile" size="40" /></p>
        <br />
        <br />
        <p>Postcode:</p>
        <p><input name="postcode" type="text" id="postcode" size="40" /></p>
        <br />
        <br />
        <p>Email:</p>
        <p><input name="email" type="text" id="email" size="40" /></p>
        <br />
        <br />
        <p><input type="submit" name="button" id="button" value="Create" /></p>
       
      </form>

            </div>
        </div>
		<div id="footer"><span style="padding-left: 20px; font-size:23;">Craig Miller / Cookie Kitchens &copy;</span></div>
    </body>

</html>