<?php
include("functions.php");
$db = new db_function();

if(isset($_POST['bidder_login']))
{
	$username = $_POST["username"];
	$password = $_POST["userpassword"];
	$homelogin = $db->homelogin($username,$password);
	if($homelogin)
	{
		echo "<script>document.location='dashboard.php'</script>";
	}
}

if(isset($_POST['bidder_reg']))
{
	$homename=$_POST["name"];
	$homephone=$_POST["phone"];
	$homeemail=$_POST["email"];
	$homeaddress=$_POST["address"];
	$homepassword=$_POST["password"];
	$homeage=$_POST["age"];
	$insertvalueshome = $db->insertvalueshome($homename,$homephone,$homeemail,$homeaddress,$homepassword,$homeage);
	
	if($insertvalueshome){
		echo "Success";
	}
	else{
		echo "Failure";
	}
}
?><html>
<head>
<title>Bargain</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>

<body>
<div class="super_container">
	<!-- Header -->

	<header class="header trans_300">
		<!-- Top Navigation -->
		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">free shipping on all orders over Rs 1000/-</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

							    <li class="account">
									<a href="#">
										Sign In
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="#" data-toggle="modal" data-target="#myModal"><i aria-hidden="true" ></i>Bidder</a></li>
										<li><a href="#" data-toggle="modal" data-target="#Regmodal"><i aria-hidden="true"></i>Seller</a></li>
									</ul>							
								</li>
																
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-right">
						<div class="logo_container">
							<a href="#">Bar<span>gain</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="index.php">Home</a></li>
								<li><a href="#">About us</a></li>
								<li><a href="contact.html">Contact</a></li>	
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
<!-- Modal -->
<div class="modal fade" id="myModal" data-backdrop="false" role="dialog">
    <div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
        <div class="modal-header">
		<h2 align="centre" class="modalaligna"><font color="#fe4c50">Login</font></h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
			<form method="POST" id="homeform" action="#" align="centre">
				<input type="text" class="form-control" id="loginname" placeholder="name" name="username"><br>
				<input type="password" class="form-control" id="loginpassword" placeholder="password" name="userpassword"><br>
				
				
			</form>
        </div>
		<div class="modal-footer">
				New to Bargain?&nbsp &nbsp <a href="#" data-toggle="modal" data-target="#Regmodal" ><font color="#fe4c50">Register!</a></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<input type="submit" class="btn btn default" name="bidder_login" value="Login"/><br>
		</div>
		</div>      
    </div>
</div>
<!--Reg Modal-->
<div class="modal fade" id="Regmodal" data-backdrop="false" role="dialog">
    <div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			<h2 class="modalaligna" ><font color="#fe4c50">Registration</font></h2>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  
			</div>
			<div class="modal-body">
				<form method="POST" id="registration" action="#" align="centre">
					<input type="text" class="form-control" id="homename" placeholder="Name" name="name"><br>
					<input type="text" class="form-control" id="homephone" placeholder="Phone" name="phone"><br>
					<input type="text" class="form-control" id="homeemail" placeholder="E-mail" name="email"><br>
					<input type="text" class="form-control" id="homeaddress" placeholder="Address" name="address"><br>
					<input type="password" class="form-control" id="homepassword" placeholder="Password" name="password"><br>
					<input type="text" class="form-control" id="homeage" placeholder="Age" name="age"><br>
				</form>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn default modalaligna" name="bidder_reg" value="Register"/><br>
			</div>
		</div>
	</div>
</div>

<h2 align="center">About Bargain</h2>

Bargain has built an online person-to-person trading community on the Internet, using the World Wide Web. Buyers and sellers are brought together in a manner where sellers are permitted to list items for sale, buyers to bid on items of interest and all Bargain users to browse through listed items in a fully automated way. The items are arranged by topics, where each type of auction has its own category.
<br>
This facilitates easy exploration for buyers and enables the sellers to immediately list an item for sale within minutes of registering.
<br>
Browsing and bidding on auctions is free of charge, but sellers as well as bidders need to register in order to sell the products a well as bid for the product.An fully authorised user is one who is authenticated and thus he can have access to the certain features. 
<br>
</body>
</html>