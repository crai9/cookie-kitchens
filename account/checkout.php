<?php 
session_start();
if (!isset($_SESSION["user"])) {
    header("location: user_login.php"); 
    exit();
}

$userID = preg_replace('#[^0-9]#i', '', $_SESSION["userID"]);
$user = ucfirst(preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["user"]));
$userPassword = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["userPassword"]);
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
                
				<p>Welcome to the logged in area. You are logged in as <?php echo $user  ?>.</p>
                                <a href="logout.php" class="link"><p>Logout</p></a>
                                <br>
                                <h4><p>Checkout</p></h4>
                                <br>
                                <?php
foreach ($_SESSION['cart'] as $product_id => $quantity) {
        
        //get the name, description and price from the database - this will depend on your database implementation.
        //use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
        $sql = sprintf("SELECT itemDesc, itemStock, itemCost FROM products WHERE itemID = %d;", $product_id);
        
        $result = mysql_query($sql);
        
        //Only display the row if there is a product (though there should always be as we have already checked)
        if (mysql_num_rows($result) > 0) {
            
            list($name, $stock, $price) = mysql_fetch_row($result);
            
            $line_cost = $price * $quantity; //work out the line cost
            
            echo "<p>";
            //show this information in table cells
            echo "Item: ".$name.", ";
            //along with a 'remove' link next to the quantity - which links to this page, but with an action of remove, and the id of the current product
            echo "Quantity: ".$quantity . ", ";
            echo "Line total: ".$line_cost.", ";
            
            echo "</p><br>";
            
        }
        
    }
                            

                            echo "</p><br>";
                            
                            echo "<p>";
                            echo "Total is: £" . $_SESSION['total'];
                            echo "</p><br>";
                            
                            echo "<p>";
                            echo "Days till expected installation: " .(rand(1,5));
                            echo "</p>";
                            
                            //form
                            echo "<form action ='complete.php' method='post'>";
                            echo "<input name='items' value='".implode(", ", $_SESSION['cart'])."' type='hidden'>";
                            echo "<input name='total' value='".$_SESSION['total']."' type='hidden'>";
                            echo "<input name='customer' value='".$_SESSION['userID']."' type='hidden'>";
                            echo "<br><p>Payment method: <select name='payment'>
                            <option value='cash'>Cash on installation</option>
                            <option value='paypal'>PayPal</option>
                            <option value='card'>Card</option>
                            </select></p>";
                            echo "<br><p><input type='submit' value='Confirm'></p></form>"
                            ?>
            </div>
        </div>
		<div id="footer"><span style="padding-left: 20px; font-size:23px;">Craig Miller / Cookie Kitchens &copy;</span></div>
    </body>

</html>