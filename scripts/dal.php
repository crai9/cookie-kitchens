<?php
$db_host = "localhost"; 
$db_username = "php_user";  
$db_pass = "php_pass";  
$db_name = "cookie_kitchens"; 

mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");  
