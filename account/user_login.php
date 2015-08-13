<?php 
session_start();
if (isset($_SESSION["user"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 
if (isset($_POST["username"]) && isset($_POST["password"])) {

    $user = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
    $userPassword = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
      
    include "../scripts/dal.php"; 
    $sql = mysql_query("SELECT customerID FROM customers WHERE customerFirstName='$user' AND customerPassword='$userPassword' LIMIT 1"); // query the person
    $sql2 = mysql_query("SELECT customerEmail FROM customers WHERE customerFirstName='$user' AND customerPassword='$userPassword' LIMIT 1");
    
    $existCount = mysql_num_rows($sql);
    if ($existCount == 1) {
             while($row = mysql_fetch_array($sql2)){ 
             $email = $row["customerEmail"];    
             }
                 $_SESSION["email"] = $email;
	     while($row = mysql_fetch_array($sql)){ 
             $userID = $row["customerID"];
             
		 }
		 $_SESSION["userID"] = $userID;
		 $_SESSION["user"] = $user;
		 $_SESSION["userPassword"] = $userPassword;
                 
                $next = $_SESSION["next"];
                switch ($next) {
                case "order":
                header("location: order.php");
                break;
                case "account":
                header("location: account.php");
                break;
                default:
                header("location: index.php");       
            }
               
            exit();
    } else {

		echo '<p align = "center">Incorrect login details, <a href="index.php">Try again</a>?</p>';
		exit();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>    
    <head>
        <meta charset="UTF-8">
        <title>Cookie Kitchens</title>
        <link rel="icon" href="/img/icon/cookie.png" />
        <link rel="stylesheet" href="../cookies.css" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css' />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="jquery.slides.min.js"></script>
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
                
				<p style="padding-top: 15px;">Not logged in, you should log in.</p>
				 <p style="padding-top: 15px;">Need an account? <a class = "link" href="create_account.php">Click here</a> to create one.</p>     
<form id="form1" name="form1" method="post" action="user_login.php">
        <p>User Name:<br /></p>
          <p><input name="username" type="text" id="username" size="40" /></p>
        <br /><br />
        <p>Password:<br /></p>
       <p><input name="password" type="password" id="password" size="40" /></p>
       <br />
       <br />
       <br />
       
         <p><input type="submit" name="button" id="button" value="Log In" /></p>
       
      </form>

            </div>
        </div>
		<div id="footer"><span style="padding-left: 20px; font-size:23;">Craig Miller / Cookie Kitchens &copy;</span></div>
    </body>

</html>