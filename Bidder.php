<?php 
session_start();
include("functions.php");
$db = new db_function();
$username = $_SESSION["username"];
$get_all_product = $db->get_all_product();
$get_bidderprof= $db->get_bidderprof($username);
if(isset($_POST['updateinfo']))
{
	

	$address1 = $_POST["address1"];
	$address2 = $_POST["address2"];
	$city = $_POST["city"];
	$country = $_POST["country"];
	$state = $_POST["state"];
	$phoneno = $_POST["phno"];
	$updateprof = $db->updateprof($address1,$address2,$city,$country,$state,$phoneno,$username);
	if($updateprof)
	{
		echo"<script> alert ('Successfully updated your profile!');</script>";
	}
}

foreach($get_bidderprof as $row)
{
 $name=$row["dbname"];
 $lastname=$row["lastname"];
 $password=$row["dbpassword"];
 $email=$row["email"];
 $phone=$row["phone"];
 $address1=$row["address1"];
 $address2=$row["address2"];
 
}

?>
<html>
<head>
<title>Bargain</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link href="styles/left.css" rel="stylesheet" type="text/css">
<link href="profile.css" rel="stylesheet" type="text/css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
						<div class="logo_container">
							<a href="#">Bar<span>gain</span></a>
						</div>
						
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

							    <li class="account">
									<a href="logout.php">
										LogOut
										<i class="fa fa-angle-down"></i>
									</a>
																
								</li>
																
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

<div class="sidenav">
  <a href="#dash" data-toggle="tab">Dashboard</a>
  <a href="#prof"data-toggle="tab">Update Profile</a>
  <a href="#myprof"data-toggle="tab">My profile</a>
</div>

<div class="main">
<div class="tab-content">
    <div id="prof" class="tab-pane fade ">
		<div class="col-md-12">
		<h2>Your Profile</h2><hr/>
		            <div class="row">
		                <div class="col-md-12 well">
							 <h3>Log In Details</h3><hr>
		                    <form action="#" method="POST">
								<div class="col-md-3">
								<div class="input-group">
									<label class="control-label"><h4>First Name</h4></label>
									<div class='input-group date' id='datetimepicker1'>
								
								<?php echo '<input class="form-control" value= "'.$name.'" placeholder="Phone" name="firstname" disabled/>';?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
							</div>
									
								</div>					
							</div>
						
						<div class="col-md-3">
								<div class="form-group">
									<label><h4>Last Name</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									
									<?php echo '<input class="form-control" value= "'.$lastname.'" placeholder="Phone" name="lastname" disabled/>';?>
									<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
									</div>
								</div>
							</div>
						<div class="col-md-3">
								<div class="form-group">
									<label><h4>New password</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									<?php echo '<input type="password" class="form-control" value= "'.$password.'" placeholder="Password" name="password" disabled/>';?>
									<span class="input-group-addon">
									<span class="fa fa-key"></span>
								</span>
								</div>
							</div></div>
						<div class="col-md-3">
								<div class="form-group">
									<label><h4>Confirm Password</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									
									<?php echo '<input type="password" class="form-control" value= "'.$password.'" placeholder="Password" name="cpassword" disabled/>';?>
									<span class="input-group-addon">
									<span class="fa fa-key"></span>
								</span>
								</div>
								</div>
							</div>
							
						</div>
						<div class="col-md-12 well">
						
							 <h3>Contact Details<h6>(Please ensure you put correct Contact Details)</h6></h3><hr>
								<div class="col-md-6">
								<div class="form-group">
									<label class="control-label"><h4>Address Line 1</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									<?php echo '<input type="text" class="form-control" value= "'.$address1.'" placeholder="Address line 1" name="address1" required/>';?>
									<span class="input-group-addon">
									<span class="glyphicon glyphicon-home"></span>
								</span>
									</div>
								</div>
								
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label><h4>Address Line 2</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									<?php echo '<input type="text" class="form-control" value= "'.$address2.'" placeholder="Address line 2" name="address2" required />';?>
									<span class="input-group-addon">
									<span class="glyphicon glyphicon-home"></span>
								</span>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
								
									<label><h4>City</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									<input class="form-control" placeholder="City" name="city"/>
									<span class="input-group-addon">
									<span class="fa fa-building"></span>
								</span>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><h4> Country</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									<input class="form-control" placeholder="Country" name="country"/>
									<span class="input-group-addon">
									<span class="fa fa-globe"></span>
								</span>
									</div>
								</div>
								
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><h4>State</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									<input class="form-control" placeholder="State" name="state"/>
									<span class="input-group-addon">
									<span class="fa fa-map-pin"></span>
								</span>
									</div>

								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><h4>Phone</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									
									<?php echo '<input type="text" class="form-control" value= "'.$phone.'" placeholder="Password" name="phno" required/>';?>
									<span class="input-group-addon">
									<span class="fa fa-phone"></span>
								</span>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="submit" class="btn btn-default" value="submit" name="updateinfo"/>
							</div>
						</div>
						<div class="col-md-4"></div>
								</form>
		                </div>
		            </div>
				</div>	
		
			<div id="dash" class="tab-pane fade in active ">
				<div class="col-md-12">
				<h2>Current Auctions</h2><hr/>
					<div class="row col-md-12">
					<center>
						<?php
						foreach($get_all_product as $row)
						{
							$status = 0;
							$check_if_sold = $db->check_if_sold($row['id']);
							if($check_if_sold)
							{
								foreach($check_if_sold as $xro)
								{
									$status = $xro['status'];
								}
							}
							if(!$check_if_sold)
							{
							$imagetxt1 = $row["imagetxt1"];
							$numberofquantity = $row["numberofquantity"];
							$minbid= $row["minbid"];
							$price=$row["price"];
							$id=$row["id"];
							$tagline=$row["tagline"];
							$description=$row["description"];
							$date =$row["dateofauction"];
							$minbid=$row["minbid"];
							$price=$row["price"];
						?>
						
						<div class="container well col-md-12">
							  <div class="col-md-2">
							  <?php
								if($imagetxt1){
								echo "<img style='margin-left: auto;margin-right: auto;' class='img-thumbnail' src='data:image/jpeg;base64,".base64_encode($imagetxt1)."'  />";
								}
								else
								{
										echo "<img style='margin-left: auto;margin-right: auto;' class='img-thumbnail' src='images/imgnotavail.jpg'  />";
								}
							  ?>
							  <p>Item No:<?php echo $id ?></p>
							  </div>
							  <div class="col-md-5">
							  <h3>"<?php echo $tagline ?> "</h3>
							  <p>Quantity Available:  <?php echo $numberofquantity?> &nbsp &nbsp &nbsp Date of Auction :<?php echo $date?> </p>
							  <p>Minimun Bid: <?php echo $minbid ?>&nbsp &nbsp &nbsp Price:<?php echo $price ?> </p>
							  </div>
							  <div class="col-md-5">
							  <?php echo '<h5><a href="products.php?uid='.$id.'">View Details -></a></h5>';?>
							  </div>
						</div>
						<?php 
							}
							else if($status == 0){
								$imagetxt1 = $row["imagetxt1"];
							$numberofquantity = $row["numberofquantity"];
							$minbid= $row["minbid"];
							$price=$row["price"];
							$id=$row["id"];
							$tagline=$row["tagline"];
							$description=$row["description"];
							$date =$row["dateofauction"];
							$minbid=$row["minbid"];
							$price=$row["price"];
						?>
						
						<div class="container well col-md-12">
							  <div class="col-md-2">
							  <?php
								if($imagetxt1){
								echo "<img style='margin-left: auto;margin-right: auto;' class='img-thumbnail' src='data:image/jpeg;base64,".base64_encode($imagetxt1)."'  />";
								}
								else
								{
										echo "<img style='margin-left: auto;margin-right: auto;' class='img-thumbnail' src='images/imgnotavail.jpg'  />";
								}
							  ?>
							  <p>Item No:<?php echo $id ?></p>
							  </div>
							  <div class="col-md-5">
							  <h3>"<?php echo $tagline ?> "</h3>
							  <p>Quantity Available:  <?php echo $numberofquantity?> &nbsp &nbsp &nbsp Date of Auction :<?php echo $date?> </p>
							  <p>Minimun Bid: <?php echo $minbid ?>&nbsp &nbsp &nbsp Price:<?php echo $price ?> </p>
							  </div>
							  <div class="col-md-5">
							  <?php echo '<h5><a href="products.php?uid='.$id.'">View Details -></a></h5>';?>
							  </div>
						</div>
						<?php 
							}
							}?>
						</center>
					</div>
				</div>
			</div>
		
		
		<div id="myprof" class="tab-pane fade ">
				<div class="col-md-12">
				<h2>My profile</h2><hr/>
				
					<div class="row col-md-12" style="padding-top:450px;">
					<div class="card">
						<div class="box">
							<div class="img">
								<img src="images/bidder.png"><hr>
							</div>
							<hr>
							<h2><?php echo $name?>&nbsp <?php echo $lastname?><br><span>Bidder</span></h2>
							<p>Email:&nbsp<?php echo $email?><br>
							Phone:&nbsp<?php echo $phone?><br>
							Address:&nbsp <?php echo $address1?> <br> <?php echo $address2?>
						</p>
						
						
						</div>
					</div>
					</div>
				</div>
		</div>
		
</div>
 </div> 

</body>
</html>