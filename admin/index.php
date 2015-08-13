<?php 
session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_login.php"); 
    exit();
}
$adminAccess = $_SESSION["access"];
$adminID = preg_replace('#[^0-9]#i', '', $_SESSION["adminID"]);
$admin = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["admin"]);
$adminPassword = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["adminPassword"]);
include "../scripts/dal.php"; 
$sql = mysql_query("SELECT * FROM staff WHERE id='$adminID' AND username='$admin' AND password='$adminPassword' LIMIT 1");
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
        <link rel="icon" href="/img/icon/cookie.png" />
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
                        <div class="point"></div><a href="index.php">Admin</a>
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
             <h3>Admin</h3>

            <div class="box shadow">
                                </br>
				<p>Logged in as: <?php echo $admin  ?>. Access rights at level: <?php echo $adminAccess  ?></p>
                                </br>
                                <a href="logout.php" class="link"><p>Logout</p></a>
                                </br>
                                <h4><p>Administrative Tasks...</p></h4>
            </br>
            </br>
                                <?php
                                switch($adminAccess){
                                    case 1: 
                                        echo "<a href='manage_staff.php' class='link'><p>Manage Staff</p></a>";
                                        echo "<a href='manage_customers.php' class='link'><p>Manage Customers</p></a>";
                                        echo "<a href='manage_suppliers.php' class='link'><p>Manage Suppliers</p></a>";
                                        echo "<a href='manage_products.php' class='link'><p>Manage Products</p></a>";
                                        echo "<a href='manage_transactions.php' class='link'><p>View Transactions</p></a>";
                                        
                                        break;
                                    case 2:
                                        echo "<a href='manage_customers.php' class='link'><p>Manage Customers</p></a>";
                                        echo "<a href='manage_suppliers.php' class='link'><p>Manage Suppliers</p></a>";
                                        echo "<a href='manage_products.php' class='link'><p>Manage Products</p></a>";
                                        echo "<a href='manage_transactions.php' class='link'><p>View Transactions</p></a>";
                                        break;
                                    default:
                                        echo "<a href='manage_products.php' class='link'><p>Manage Products</p></a>";               
                                }
                                
                                ?>

            </div>
        </div>
		<div id="footer"><span style="padding-left: 20px; font-size:23;">Craig Miller / Cookie Kitchens &copy;</span></div>
    </body>

</html>