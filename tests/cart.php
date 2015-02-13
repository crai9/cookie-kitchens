<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="PHP Shopping Cart Using Sessions" /> 
<meta name="keywords" content="shopping cart tutorial, shopping cart, php, sessions" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="all" href="/style/style.css" type="text/css" />
<title>Cart</title>


<?php
$db_host = "localhost"; 
$db_username = "php_user";  
$db_pass = "php_pass";  
$db_name = "other"; 

mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");  
?>


</head>
<body>


<?php

	$product_id = $_GET[id];	 //the product id from the URL 
	$action 	= $_GET[action]; //the action from the URL 

	//if there is an product_id and that product_id doesn't exist display an error message
	if($product_id && !productExists($product_id)) {
		die("Error. Product Doesn't Exist");
	}

	switch($action) {	//decide what to do	
	
		case "add":
			$_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id $product_id 
		break;
		
		case "remove":
			$_SESSION['cart'][$product_id]--; //remove one from the quantity of the product with id $product_id 
			if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 
		break;
		
		case "empty":
			unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart. 
		break;
	
	}
	
?>


<?php	

	if($_SESSION['cart']) {	//if the cart isn't empty
		//show the cart
		
		echo "<table border=\"1\" padding=\"3\" width=\"40%\">";	//format the cart using a HTML table
		
			//iterate through the cart, the $product_id is the key and $quantity is the value
			foreach($_SESSION['cart'] as $product_id => $quantity) {	
				
				//get the name, description and price from the database - this will depend on your database implementation.
				//use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
				$sql = sprintf("SELECT name, description, price FROM php_shop_products WHERE id = %d;",
								$product_id); 
					
				$result = mysql_query($sql);
					
				//Only display the row if there is a product (though there should always be as we have already checked)
				if(mysql_num_rows($result) > 0) {
				
					list($name, $description, $price) = mysql_fetch_row($result);
				
					$line_cost = $price * $quantity;		//work out the line cost
					$total = $total + $line_cost;			//add to the total cost
				
					echo "<tr>";
						//show this information in table cells
						echo "<td align=\"center\">$name</td>";
						//along with a 'remove' link next to the quantity - which links to this page, but with an action of remove, and the id of the current product
						echo "<td align=\"center\">$quantity <a href=\"$_SERVER[PHP_SELF]?action=remove&id=$product_id\">X</a></td>";
						echo "<td align=\"center\">$line_cost</td>";
					
					echo "</tr>";
					
				}
			
			}
			
			//show the total
			echo "<tr>";
				echo "<td colspan=\"2\" align=\"right\">Total</td>";
				echo "<td align=\"right\">$total</td>";
			echo "</tr>";
			
			//show the empty cart link - which links to this page, but with an action of empty. A simple bit of javascript in the onlick event of the link asks the user for confirmation
			echo "<tr>";
				echo "<td colspan=\"3\" align=\"right\"><a href=\"$_SERVER[PHP_SELF]?action=empty\" onclick=\"return confirm('Are you sure?');\">Empty Cart</a></td>";
			echo "</tr>";		
		echo "</table>";
		
		
	
	}else{
		//otherwise tell the user they have no items in their cart
		echo "You have no items in your shopping cart.";
		
	}
	
	//function to check if a product exists
	function productExists($product_id) {
			//use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
			$sql = sprintf("SELECT * FROM php_shop_products WHERE id = %d;",
							$product_id); 
				
			return mysql_num_rows(mysql_query($sql)) > 0;
	}
?>

<a href="products.php">Continue Shopping</a>


<?php

/*

products table:
	CREATE TABLE `products` (
		`id` INT NOT NULL AUTO_INCREMENT ,
		`name` VARCHAR( 255 ) NOT NULL ,
		`description` TEXT,
		`price` DOUBLE DEFAULT '0.00' NOT NULL ,
		PRIMARY KEY ( `id` )
	);

*/

?>



</body>
</html>