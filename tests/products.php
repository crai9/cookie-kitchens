<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="PHP Shopping Cart Using Sessions" /> 
<meta name="keywords" content="shopping cart tutorial, shopping cart, php, sessions" />
<link rel="stylesheet" media="all" href="/style/style.css" type="text/css" />
<title>Products</title>

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


<table border="1">

	<?php
		
		$sql = "SELECT id, name, description, price FROM php_shop_products;";
		
		$result = mysql_query($sql);
		
		while(list($id, $name, $description, $price) = mysql_fetch_row($result)) {
		
			echo "<tr>";
			
				echo "<td>$name</td>";
				echo "<td>$description</td>";
				echo "<td>$price</td>";
				echo "<td><a href=\"cart.php?action=add&id=$id\">Add To Cart</a></td>";
			
			echo "</tr>";
		}
		
	?>
</table>


<a href="cart.php">View Cart</a>

</body>
</html>