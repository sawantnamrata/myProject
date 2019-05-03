<?php
include("functions.php");
$db = new db_function();
$datetime = date("d-m-Y");
if(isset($_POST['bidder_login']))
{
	$username = $_POST["username"];
	$password = $_POST["userpassword"];
	
	$homelogin = $db->homelogin($username,$password);
	if($homelogin)
	{
		$get_all_items = $db->get_all_items();
		foreach($get_all_items as $row)
		{
			$expiry_date = date('d-m-Y', strtotime($row["dateofauction"]));
			$id = $row['id'];
			if(strtotime($expiry_date) < strtotime($datetime))
			{
				$get_highest_bid=$db->get_highest_bid($id);
				if($get_highest_bid)
				{
					foreach($get_highest_bid as $abc)
					{
						$uid=$abc['id'];
						$username_sell=$abc['username'];
						$sell_product=$db->sell_product($uid,$username_sell);
						$get_bidderprof = $db->get_bidderprof($username_sell);
						if($get_bidderprof)
						{
							foreach($get_bidderprof as $xro)
							{
								$email = $xro['email'];
								require_once 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';
								$mail = new PHPMailer;
								$dbemail = $email;
								$mail->SMTPDebug = 3;
								$mail->isSMTP();
								$mail->Host = "smtp.gmail.com";
								$mail->SMTPAuth = true;
								$mail->Username = "veronicaferns1998@gmail.com";
								$mail->Password = "Veronica123";


								$mail->SMTPSecure = "tls";
								$mail->Port = 587;
								$mail->From = "veronicaferns1998@gmail.com";
								$mail->FromName = "veronicaferns1998@gmail.com";
								$mail->isHTML(true);
								$mail->Subject = "BARGAIN - NOTIFICATION";
								$mail->Body = "The product you bid for has been sold to you!";
								$mail->AltBody = "This is the plain text version of the email content";
								$mail->SMTPDebug = 0;
								$mail->addAddress($dbemail);

								if ($mail->Send()) {
									echo 'success';
								}
								else {
								   echo "error while sending email";

								}
							}
						}
					}
				}
			}
		}
		
		session_start();
		$_SESSION["username"] = $username;
		echo "<script>document.location='Bidder.php'</script>";
	}
	else{
	
		echo "<script>alert('Invalid username or password')</script>";
	}
}

if(isset($_POST['seller_login']))
{
	$sellerusername = $_POST["sellername"];
	$sellerpassword = $_POST["sellerpassword"];
	
	$sellerlogin = $db->sellerlogin($sellerusername,$sellerpassword);
	if($sellerlogin)
	{
		$get_all_items = $db->get_all_items();
		foreach($get_all_items as $row)
		{
			$expiry_date = date('d-m-Y', strtotime($row["dateofauction"]));
			$id = $row['id'];
			if(strtotime($expiry_date) < strtotime($datetime))
			{
				$get_highest_bid=$db->get_highest_bid($id);
				if($get_highest_bid)
				{
					foreach($get_highest_bid as $abc)
					{
						$uid=$abc['id'];
						$username_sell=$abc['username'];
						$sell_product=$db->sell_product($uid,$username_sell);
						$get_bidderprof = $db->get_bidderprof($username_sell);
						if($get_bidderprof)
						{
							foreach($get_bidderprof as $xro)
							{
								$email = $xro['email'];
								require_once 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';
								$mail = new PHPMailer;
								$dbemail = $email;
								$mail->SMTPDebug = 3;
								$mail->isSMTP();
								$mail->Host = "smtp.gmail.com";
								$mail->SMTPAuth = true;
								$mail->Username = "veronicaferns1998@gmail.com";
								$mail->Password = "Veronica123";


								$mail->SMTPSecure = "tls";
								$mail->Port = 587;
								$mail->From = "veronicaferns1998@gmail.com";
								$mail->FromName = "veronicaferns1998@gmail.com";
								$mail->isHTML(true);
								$mail->Subject = "BARGAIN - NOTIFICATION";
								$mail->Body = "The product you bid for has been sold to you!";
								$mail->AltBody = "This is the plain text version of the email content";
								$mail->SMTPDebug = 0;
								$mail->addAddress($dbemail);

								if ($mail->Send()) {
									echo 'success';
								}
								else {
								   echo "error while sending email";

								}
							}
						}
					}
				}
			}
		}
		
		session_start();
		$_SESSION["username"] = $sellerusername;
		echo "<script>document.location='Seller.php'</script>";
	}
	else{
		echo "<script>alert('Invalid username or password')</script>";
	}
}

if(isset($_POST['bidder_reg']))
{
	
	$homename=$_POST["regname"];
	
	$reglname=$_POST["reglname"];
	$homephone=$_POST["regphone"];
	$homeemail=$_POST["regemail"];
	$homeaddress=$_POST["regaddress"];
	$homepassword=$_POST["regpassword"];
	$confirmpass=$_POST["cregpassword"];
	if(preg_match("/[^a-zA-Z]/",$homename))
	{
		echo "<script>alert('invalid name')</script>";
	}else{
	if ($homepassword=$confirmpass)
	{
		
		$insertvalueshome = $db->insertvalueshome($homename,$reglname,$homephone,$homeemail,$homeaddress,$homepassword);
	}
	else{
		echo "Please check your password!";
	}
	if($insertvalueshome){
		echo "<script>alert('Successfully Registered!Please login now using your username and password')</script>";
	}
	else{
		echo "<script>alert ('Error Occured!');</script>";
	}}
}

if(isset($_POST['seller_reg']))
{
	
	$selname=$_POST["selname"];
	$sellname=$_POST["sellname"];
	$selphone=$_POST["selphone"];
	$selemail=$_POST["selemail"];
	$seladdress=$_POST["seladdress"];
	$selpassword=$_POST["selpassword"];
	$selpass=$_POST["cselpassword"];
	if(preg_match("/[^a-zA-Z]/",$selname))
	{
		echo "<script>alert('invalid name')</script>";
	}
	else
		{
		if ($selpassword=$selpass)
		{
			
			$insertvaluesseller = $db->insertvaluesseller($selname,$sellname,$selphone,$selemail,$seladdress,$selpassword);
		}
		else
		{
			echo "Please check your password!";
		}
		if($insertvaluesseller){
			echo "<script>alert('Successfully Registered!Please login now using your username and password')</script>";
		}
		else{
			echo "<script>alert ('Error Occured!');</script>";
		}
	}
}

?>
<html>
<head>
<title>Bargain</title>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="styles/main_styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/responsive.css"/>
<link rel="stylesheet" type="text/css" href="card.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</head>

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
										<li><a href="#" data-toggle="modal" data-target="#sellermodal"><i aria-hidden="true"></i>Seller</a></li>
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
								<li><div class="row-fluid">
										  <select class="selectpicker" data-live-search="true" placeholder="Search....">
											<option selected >Search...</option>
											
											<option ><a href="sunglasses.php">Sunglasses</a></option>
											<option >Watches</option>
											<option >Jewellery </option>
											<option >Collectives</option>
											<option >Computer & Elecronics</option>
											<option >Sports</option>
											<option >Antics</option>
										  </select>
									</div>
								</li>
								<li id="home"><a href="#">Home</a></li>
								<li><a href="#aboutus">About Us</a></li>
								<li><a href="#categories_div">Categories</a></li>
								<li><a href="#contact">Contact Us</a></li>
							</ul>		`						
						</nav>
					</div>
				</div>
			</div>
		</div>	
	</header>
	
<!-- Seller Modal -->
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
				<input type="submit" class="btn btn default" name="bidder_login" value="Login"/><br>
				
			</form>
        </div>
		<div class="modal-footer">
				New to Bargain?&nbsp &nbsp <a href="#" data-toggle="modal" data-target="#Regmodal" ><font color="#fe4c50">Register!</a></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				
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
					<input type="text" pattern="[Aa-Zz]{10}" class="form-control" id="homename" placeholder="FirstName" name="regname" required><br>
					<input type="text" pattern="[Aa-Zz]{10}" class="form-control" id="lastname" placeholder="LastName" name="reglname" required><br>
					<input type="tel" pattern="[0-9]{10}" class="form-control" id="homephone" placeholder="Phone" name="regphone" required><br>
					<input type="email" class="form-control" id="homeemail" placeholder="E-mail" name="regemail" required><br>
					<input type="text" class="form-control" id="homeaddress" placeholder="Address" name="regaddress" required><br>
					<input type="password" class="form-control" id="homepassword" placeholder="Password" name="regpassword" required><br>
					<input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" name="cregpassword" required><br>
					<center><input type="submit" class="btn btn default modalaligna" name="bidder_reg" value="Register"/></center>
				
			</div>
			<div class="modal-footer">
				
			</div>
			</form>
		</div>
	</div>
</div>
<!--Seller login-->

<div class="modal fade" id="sellermodal" data-backdrop="false" role="dialog">
    <div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
        <div class="modal-header">
		<h2 align="centre" class="modalaligna"><font color="#fe4c50">Login</font></h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
			<form method="POST" id="homeform" action="#" align="centre">
				<input type="text" class="form-control" id="sellername" placeholder="Name" name="sellername"><br>
				<input type="password" class="form-control" id="sellerpassword" placeholder="Password" name="sellerpassword"><br>
				<input type="submit" class="btn btn default" name="seller_login" value="Login"/><br>
				
			</form>
        </div>
		<div class="modal-footer">
				New to Bargain?&nbsp &nbsp <a href="#" data-toggle="modal" data-target="#sellerRegmodal" ><font color="#fe4c50">Register!</a></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				
		</div>
	</div>      
    </div>
</div>
<!--Seller Reg Modal-->
<div class="modal fade" id="sellerRegmodal" data-backdrop="false" role="dialog">
    <div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			<center><h2><font color="#fe4c50">Registration</font></h2></center>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>  
			</div>
			<div class="modal-body">
				<form method="POST" id="registration" action="#" align="centre">
					<input type="text"  pattern="[Aa-Zz]{10}" class="form-control" id="sellername" placeholder="First Name" name="selname" required><br>
					<input type="text" pattern="[Aa-Zz]{10}"  class="form-control" id="sellername" placeholder="Last Name" name="sellname" required><br>
					<input type="tel" pattern="[0-9]{10}" class="form-control" id="sellerphone" placeholder="Phone" name="selphone" required><br>
					<input type="email" class="form-control" id="selleremail" placeholder="E-mail" name="selemail" required><br>
					<input type="text" class="form-control" id="selleraddress" placeholder="Address" name="seladdress" required><br>
					<input type="password" class="form-control" id="sellerpassword" placeholder="Password" name="selpassword" required><br>
					<input type="password" class="form-control" id="sellerconfrimmpassword" placeholder="Confirm Password" name="cselpassword" required><br>
			
					<center><input type="submit" class="btn btn default modalaligna" name="seller_reg" value="Register"/><br></center>
					</form>
			</div>
			<div class="modal-footer">				
			</div>
				
		</div>
	</div>
</div>
<div class="container" style="padding-top:50px">

<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/1.jpg" style="width:100%;">
		<div class="carousel-caption">
          <h3>Bid Farewell to high prices!</h3>
        </div>
      </div>

      <div class="item">
        <img src="images/2.jpg" style="width:100%;">
		<div class="carousel-caption">
          <h3>We Don’t Lie, It’s Worth a Try!</h3>
        </div>
      </div>
    
      <div class="item">
        <img src="images/3.jpg" style="width:100%;">
		<div class="carousel-caption">
          <h3>We Give You Unique!</h3>
        </div>
      </div>
    </div>

    
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div><br><br><br>

<div class="col-md-12 text-center" id="aboutus">

  <h3>All About Bargain</h3>
  <p><em>We ensure you good buy!</em></p>
  <p>Bargain has built an online person-to-person trading community on the Internet, using the World Wide Web. Buyers and sellers are brought together in a manner where sellers are permitted to list items for sale, buyers to bid on items of interest and all Bargain users to browse through listed items in a fully automated way. The items are arranged by topics, where each type of auction has its own category.
<br>
This facilitates easy exploration for buyers and enables the sellers to immediately list an item for sale within minutes of registering.
<br>
Browsing and bidding on auctions is free of charge, but sellers as well as bidders need to register in order to sell the products a well as bid for the product.An fully authorised user is one who is authenticated and thus he can have access to the certain features. </p>
  <br>
 </div>
 <div class="container">
        <h3 class="text-center">Way through!</h3><br>
        <div class="row">
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="images/buy.jpg" alt="card image"></p>
                                    <h4 class="card-title">Buy</h4>
                                    <p class="card-text">Bid the highest and get the product!</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Buy</h4>
                                    <p class="card-text">1.Bid the highest for the product and rest we value our customers<br>2.Pay the price<br> </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="images/sell.jpg" alt="card image"></p>
                                    <h4 class="card-title">Sell</h4>
                                    <p class="card-text">Selling products was never so easy but with bargain its just following some steps!! </p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Sell</h4>
                                    <p class="card-text">1.List: List what to sell, how to photograph and describe it,and how to price it right<br>2.Ship : Pack your item,Print some identity label and ship with ease!</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="images/profit.jpg" alt="card image"></p>
                                    <h4 class="card-title">Earn Profits</h4>
                                    <p class="card-text">By being the member you can earn the maximum of profits</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Earn Profits</h4>
                                    <p class="card-text">Sell the product and earn the maximum of profits.Be  the happy customer of the bargain and we value that!!!! </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            

        </div>
    </div>
 
<div class="container-fluid bg-3 text-center" id="categories_div"> 
<br>
<br>
  <h3>Categories</h3><br>
  <div class="row">
    <div class="col-sm-3">
      <p>Watches</p>
      <a href="category.php"><img src="images/1.jpg" class="img-responsive" style="width:100%" id="watches" alt="Image"></a>
    </div>
    <div class="col-sm-3"> 
      <p>Sunglasses</p>
      <a href="sunglasses.php"><img src="images/sunglasses.jpg" class="img-responsive" id="glasses " style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3"> 
      <p>Antics</p>
      <a href="antics.php"><img src="images/antics.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3">
      <p>Collectives</p>
      <a href="collectives.php"><img src="images/collectives.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
  </div>
</div><br>
<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <p>Jewellery</p>
      <a href="jewellery.php"><img src="images/jewellery.png" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3"> 
      <p>Home Appliances</p>
      <a href="homeappliances.php"><img src="images/homeappliances.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3"> 
      <p>Computer & Electronics</p>
      <a href="computer.php"><img src="images/computer .jpg" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3">
      <p>Sports</p>
      <a href="sports.php"><img src="images/kit.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
  </div>
</div><br><br>

<div class="container" id="contact">



</div>
<div class="footer">
<center><p>Developed by<br/> Namrata Sawant</p>
<p><a href="#" title="To Top">
    <span class="glyphicon glyphicon-menu-up"></span>
  </a></p>
 </center>
</div>
</div>
</div>


</body>
</html>