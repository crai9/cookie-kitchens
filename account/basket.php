<?php

error_reporting(0);

session_start();
if (!isset($_SESSION["user"])) {
    header("location: user_login.php");
    exit();
}

$userID       = preg_replace('#[^0-9]#i', '', $_SESSION["userID"]);
$user         = ucfirst(preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["user"]));
$userPassword = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["userPassword"]);
include "../scripts/dal.php";
$sql        = mysql_query("SELECT * FROM customers WHERE customerID='$userID' AND customerFirstName='$user' AND customerPassword='$userPassword' LIMIT 1");
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
                
				<p>Welcome to the logged in area. You are logged in as <?php
echo $user;
?>.</p>
                                <a href="logout.php" class="link"><p>Logout</p></a>
                                </br>
                                <h4><p>Basket</p></h4>
                                </br>

<?php
include "../scripts/dal.php";
?>


<?php

$product_id = $_GET[id]; //the product id from the URL 
$action     = $_GET[action]; //the action from the URL 

//if there is an product_id and that product_id doesn't exist display an error message
if ($product_id && !productExists($product_id)) {
    die("Error. Product Doesn't Exist");
}

switch ($action) {
    
    case "add":
        $_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id $product_id 
        break;
    
    case "remove":
        $_SESSION['cart'][$product_id]--; //remove one from the quantity of the product with id $product_id 
        if ($_SESSION['cart'][$product_id] == 0)
            unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 
        break;
    
    case "empty":
        unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart. 
        break;
        
}

?>


<?php

if ($_SESSION['cart']) { //if the cart isn't empty
    //show the cart
    
    echo "<table border='1'>"; //format the cart using a HTML table
    echo "<tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        </tr>";
    
    //iterate through the cart, the $product_id is the key and $quantity is the value
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        
        //get the name, description and price from the database - this will depend on your database implementation.
        //use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
        $sql = sprintf("SELECT itemDesc, itemStock, itemCost FROM products WHERE itemID = %d;", $product_id);
        
        $result = mysql_query($sql);
        
        //Only display the row if there is a product (though there should always be as we have already checked)
        if (mysql_num_rows($result) > 0) {
            
            list($name, $stock, $price) = mysql_fetch_row($result);
            
            $line_cost = $price * $quantity; //work out the line cost
            $total     = $total + $line_cost; //add to the total cost
            
            echo "<tr>";
            //show this information in table cells
            echo "<td align=\"center\">$name</td>";
            //along with a 'remove' link next to the quantity - which links to this page, but with an action of remove, and the id of the current product
            echo "<td align=\"center\">$quantity <a class='link' style='font-size: 16;' href='basket.php?action=remove&id=$product_id'>(Remove)</a></td>";
            echo "<td align=\"center\">$line_cost</td>";
            
            echo "</tr>";
            
        }
        
    }
    
    //show the total
    echo "<tr>";
    echo "</br>";
    echo "<td colspan=\"2\" align=\"center\"></td>";
    echo "<td align=\"center\">Total:    $total</td>";
    echo "</tr>";
    echo "</br>";
    echo "</table>";
    $_SESSION['total'] = $total;
    
    
} else {
    //otherwise tell the user they have no items in their cart
    echo "<p>You have no items in your shopping cart.</p>";
    
}

//function to check if a product exists
function productExists($product_id)
{
    //use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
    $sql = sprintf("SELECT * FROM products WHERE itemID = %d;", $product_id);
    
    return mysql_num_rows(mysql_query($sql)) > 0;
}
?>
</br>
<p>
<a class='link' href="basket.php?action=empty" onclick="return confirm('Are you sure?');">Empty Basket</a>
<a class="link"href="order.php">Continue Shopping</a>
<a class="link"href="checkout.php">Go to checkout</a>
</p>


            </div>
        </div>
		<div id="footer"><span style="padding-left: 20px; font-size:23;">Craig Miller / Cookie Kitchens &copy;</span></div>
    </body>

</html>