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
                                <br>
				<p>Logged in as: <?php echo $admin  ?>. Access rights at level: <?php echo $adminAccess  ?></p>
                                <<br>                                <a href='index.php' class='link'><p>Back to index</p></a>
                                <a href="logout.php" class="link"><p>Logout</p></a>
                                </<br>                               <h4><p>Manage Customers</p></h4>
                                            </b<br>          </br<br>         <?php

    $con=mysqli_connect("localhost","php_user","php_pass","cookie_kitchens");
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

if (isset($_POST['id']) && isset($_POST['first']) && isset($_POST['last']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['telephone']) && isset($_POST['mobile']) && isset($_POST['postcode']) && isset($_POST['email'])){
    $id = preg_replace('#[^0-9]#i', '', $_POST['id']);
    $type = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['type']);
    $first = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['first']);
    $last = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['last']);
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['password']);
    $address = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['address']);
    $telephone = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['telephone']);
    $mobile = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['mobile']);
    $postcode = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['postcode']);
    $email = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['email']);
    
    
    switch($type){
    case "edit" :
    update($con, $id, $first, $last, $password, $address, $telephone, $mobile, $postcode, $email);
    break; 
    case "add":
    add($con, $id, $first, $last, $password, $address, $telephone, $mobile, $postcode, $email);    
    }
        if(isset($_POST['del'])){
        
        delete($con, $id);

    }
}

function update($con, $id, $first, $last, $password, $address, $telephone, $mobile, $postcode, $email)
{
mysqli_query($con,"UPDATE customers SET customerID='$id', customerFirstName='$first', customerLastName='$last', customerPassword='$password', customerAddress='$address', customerTelephone='$telephone', customerMobile='$mobile', customerPostcode='$postcode', customerEmail='$email'
WHERE customerID='$id'");
}

function add($con, $id, $first, $last, $password, $address, $telephone, $mobile, $postcode, $email)
{
mysqli_query($con,"INSERT INTO customers (customerID, customerFirstName, customerLastName, customerPassword, customerAddress, customerTelephone, customerMobile, customerPostcode, customerEmail )
VALUES ('$id', '$first', '$last', '$password', '$address', '$telephone', '$mobile', '$postcode', '$email')");
}

function delete($con, $id)
{
mysqli_query($con,"DELETE FROM customers WHERE customerID='$id'");

}

//$con=mysqli_connect("localhost","php_user","php_pass","cookie_kitchens");
//if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}

$query = mysqli_query($con,"SELECT * FROM customers ORDER BY customerID");

echo "<table border='1'>
<tr>
<th>customerID</th>
<th>customerFirstName</th>
<th>customerLastName</th>
<th>customerPassword</th>
<th>customerAddress</th>
<th>customerTelephone</th>
<th>customerMobile</th>
<th>customerPostcode</th>
<th>customerEmail</th>
<th>Delete?</th>
<th>Submit</th>
</tr>";

while($row = mysqli_fetch_array($query)) {
  echo "<tr>";
  echo "<form method='post' action='manage_customers.php'>";
  echo "<td><input name='type' value='edit' type='hidden'>";
  echo "<input name='id' value='" . $row['customerID'] . "' readonly></td>";
  echo "<td><input name='first' value='" . $row['customerFirstName'] . "'></td>";
  echo "<td><input name='last' value='" . $row['customerLastName'] . "'></td>";
  echo "<td><input name='password' value='" . $row['customerPassword'] . "'></td>";
  echo "<td><input name='address' value='" . $row['customerAddress'] . "'></td>";
  echo "<td><input name='telephone' value='" . $row['customerTelephone'] . "'></td>";
  echo "<td><input name='mobile' value='" . $row['customerMobile'] . "'></td>";
  echo "<td><input name='postcode' value='" . $row['customerPostcode'] . "'></td>";
  echo "<td><input name='email' value='" . $row['customerEmail'] . "'></td>";
  echo "<td><input name='del' type='checkbox'></td>";
  echo "<td><input type='submit' value='Update'></td>";
  echo "</form>";
  
  echo "</tr>";
}
  echo "<tr>";
  echo "<form method='post' action='manage_customers.php'>";
  echo "<td><input name='type' value='add' type='hidden'>";
  echo "<input name='id' value=''></td>";
  echo "<td><input name='first' value=''></td>";
  echo "<td><input name='last' value=''></td>";
  echo "<td><input name='password' value=''></td>";
  echo "<td><input name='address' value=''></td>";
  echo "<td><input name='telephone' value=''></td>";
  echo "<td><input name='mobile' value=''></td>";
  echo "<td><input name='postcode' value=''></td>";
  echo "<td><input name='email' value=''></td>";
  echo "<td></td>";
  echo "<td><input type='submit' value='Add New'></td>";
  echo "</form>";
  
  echo "</tr>";
  echo "</table>";

  mysqli_close($con);
?>
                                
                                
                                
                                
            </br><br>        </br>

            </div>
        </div>
		<div id="footer"><span style="padding-left: 20px; font-size:23px;">Craig Miller / Cookie Kitchens &copy;</span></div>
    </body>

</html>