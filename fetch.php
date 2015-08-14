<?php
$q = ($_GET['q']);

include "scripts/dal.php";

$con = mysqli_connect('localhost','php_user','php_pass','cookie_kitchens');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM products WHERE itemDesc LIKE '%$q%' OR itemID LIKE '%$q%'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr style='background: grey;'>
<th>Product ID</th>
<th>Product desc.</th>
<th>No. in stock</th>
<th>Price(£)</th>
<th>Image</th>
<th>Order this</td>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['itemID'] . "</td>";
  echo "<td>" . $row['itemDesc'] . "</td>";
  echo "<td>" . $row['itemStock'] . "</td>";
  echo "<td>" . $row['itemCost'] . "</td>";
  echo "<td><img height='60' src='img/items/item" . $row['itemID'] . ".jpg'></td>";
  echo "<td><a class='link' href='account/order.php?id=" . $row['itemID'] . "' >BUY</a></td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);