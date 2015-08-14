<?php 
session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_login.php"); 
    exit();
    }
    $adminAccess = $_SESSION["access"];
    if ($adminAccess > 2){
    header("location: index.php");
}
$adminID = preg_replace('#[^0-9]#i', '', $_SESSION["adminID"]);
$admin = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["admin"]);
$adminPassword = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["adminPassword"]);
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
                                <a href='index.php' class='link'><p>Back to index</p></a>
                                <a href="logout.php" class="link"><p>Logout</p></a>
                                </br>
                                <h4><p>Manage Transactions</p></h4>
            </br>
            </br>
                               <a href="orders_xml.php" class="link"><p>Create XML File</p></a>
            </br>
            </br>
                               <?php

    $con=mysqli_connect("localhost","php_user","php_pass","cookie_kitchens");
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
   

$query = mysqli_query($con,"SELECT * FROM orders ORDER BY orderID");

echo "<table border='1'>
<tr>
<th>orderID</th>
<th>items</th>
<th>customerID</th>
<th>payment</th>
<th>date</th>
<th>total</th>
</tr>";

while($row = mysqli_fetch_array($query)) {
  echo "<tr>";
  echo "<form method='post' action='manage_transactions.php'>";
  echo "<td><input name='type' value='edit' type='hidden'>";
  echo "<input name='id' value='" . $row['orderID'] . "' readonly></td>";
  echo "<td width='50%'><input style='width:100%'  name='first' value='" . $row['items'] . "'></td>";
  echo "<td><input name='last' value='" . $row['customerID'] . "'></td>";
  echo "<td><input name='password' value='" . $row['payment'] . "'></td>";
  echo "<td><input name='address' value='" . $row['date'] . "'></td>";
  echo "<td><input name='telephone' value='" . $row['total'] . "'></td>";
  echo "</form>";
  
  echo "</tr>";
}

  echo "</table>";

  mysqli_close($con);
?> 

                                        


            </div>
        </div>
		<div id="footer"><span style="padding-left: 20px; font-size:23px;">Craig Miller / Cookie Kitchens &copy;</span></div>
    </body>

</html>		