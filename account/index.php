<?php 
session_start();
if (!isset($_SESSION["user"])) {
    header("location: user_login.php"); 
    exit();
}

$userID = preg_replace('#[^0-9]#i', '', $_SESSION["userID"]);
$user = ucfirst(preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["user"]));
$userPassword = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["userPassword"]);
$email = $_SESSION['email'];
include "../scripts/dal.php"; 
$sql = mysql_query("SELECT * FROM customers WHERE customerID='$userID' AND customerFirstName='$user' AND customerPassword='$userPassword' LIMIT 1");
$existCount = mysql_num_rows($sql);
if ($existCount == 0) {
	 echo "Your login credentials were not found on database.";
         session_destroy(); 
     exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
        <meta charset="UTF-8">
        <title>Cookie Kitchens</title>
        <link rel="icon" href="http://icdn.pro/images/en/c/o/cookie-icone-7741-128.png" />
        <link rel="stylesheet" href="../cookies.css" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="../jquery.slides.min.js"></script>
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
                        <div class="point"></div><a href="order.php">Order</a>
                    </div>
                </div>
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="account.php">Account</a>
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
                
				<p>Welcome to the logged in area. You are logged in as <?php echo $user  ?>.<p>
                                <a href="logout.php" class="link"><p>Logout</p></a>
                                </br>
                                </br>
                                    <p><a class="link"href="order.php">Order Items</a>
<a class="link"href="account.php">Account settings</a></p>
            </div>
        </div>
		<div id="footer"><span style="padding-left: 20px; font-size:23;">Craig Miller / Cookie Kitchens &copy;</span></div>
    </body>

</html>