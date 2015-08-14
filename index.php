<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Cookie Kitchens</title>
        <link rel="icon" href="/img/icon/cookie.png" />
        <link rel="stylesheet" href="cookies.css" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
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
                        <div class="point"></div><a href=<?php echo($_SERVER["DOCUMENT_ROOT"] . "kitchens.php");
?>>Kitchens</a>
                    </div>
                </div>
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="search.php">Search</a>
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
                        <div class="point"></div><a href="login.php">Login</a>
                    </div>
                </div>
                <div class="sup">
                    <div class="sub">
                        <div class="point"></div><a href="admin/">Admin</a>
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
                        <div class="point"></div><a href="index.php" style="padding-left: 80px;">Cookie Kitchens</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container1">
             <h3>Homepage</h3>

            <div class="box shadow">
                <p style="padding-top: 15px; font-size:28px;">Welcome to Cookie Kitchens' website!</p>
                </br>
                </br>
				<p>Cookie Kitchens specialise in designing and installing kitchens for the customer to their requirements.</p>
				<p>Our customers can also buy individual products from us.</p>
				</br>
				<p>Some of our website's features that might interest you include...</p>
				</br>
				<p>Account creation</p>
				<p>Full Kitchens to order</p>
				<p>Product search</p>
				<p>Ordering</p>
				<p>Account management</p>
				<p>Checkout with card/PayPal payment, or cash</p>
				
				
				
				
				</br>
				</br>
				<p>Take a look at some of our sample kitchens below...</p>
				</br>
                <div class="container">
                    <div id="slides">
                        <img src="img/kit1.jpg">
                        <img src="img/kit2.jpg">
                        <img src="img/kit3.jpg">
                        <img src="img/kit4.jpg">
                    </div>
                </div>
            </div>
        </div>
		<div id="footer"><span style="padding-left: 20px; font-size:23px;">Craig Miller / Cookie Kitchens &copy;</span></div>
    </body>

</html>