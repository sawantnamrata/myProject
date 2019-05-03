<?php
include("functions.php");
$db = new db_function();
session_start();
$username = $_SESSION["username"];
$get_profile= $db->get_profile($username);
$get_my_auction= $db->get_my_auction($username);
if(isset($_POST['submititem']))
{
	$description = $_POST["description"];
	$tagline = $_POST["tagline"];
	$noofquantity = $_POST["noofquantity"];
	$minbid = $_POST["minbid"];
	$price = $_POST["price"];
	$category = $_POST["category"];
	
	$dateofauction = $_POST["dateofauction"];
	$image1 = addslashes ($_FILES['img1_upload']['name']);
	$imagetmp1=addslashes (file_get_contents($_FILES['img1_upload']['tmp_name']));
  	$target = "images/".basename($image1);
	$image2 = addslashes ($_FILES['img2_upload']['name']);
	$imagetmp2=addslashes (file_get_contents($_FILES['img2_upload']['tmp_name']));
	$target = "images/".basename($image2);
	$image3 = addslashes ($_FILES['img3_upload']['name']);
	$imagetmp3=addslashes (file_get_contents($_FILES['img3_upload']['tmp_name']));
  	$target = "images/".basename($image3);
	$image4 = addslashes ($_FILES['img4_upload']['name']);
	$imagetmp4=addslashes (file_get_contents($_FILES['img4_upload']['tmp_name']));
  	$target = "images/".basename($image4);
	
	$additem = $db->additem($description,$tagline,$noofquantity,$minbid,$dateofauction,$price,$category,$username,$image1,$imagetmp1,$image2,$imagetmp2,$image3,$imagetmp3,$image4,$imagetmp4);
	if($additem)
	{
		echo"<script> alert ('Thank you!! Your item has been added successfully!');</script>";
	}
}
if(isset($_POST['submitdetails']))
{
	$address1 = $_POST["address1"];
	$address2 = $_POST["address2"];
	$city = $_POST["city"];
	$country = $_POST["country"];
	$state = $_POST["state"];
	$phoneno = $_POST["phno"];
	
	$updateprofseller = $db->updateprofseller($address1,$address2,$city,$country,$state,$phoneno,$username);
	if($updateprofseller)
	{
		echo"<script> alert ('Successfully updated your profile!');</script>";
	}
}
if(isset($_POST['upload_profile']))
{
	$image = addslashes ($_FILES['company_logo']['name']);
	$imagetmp=addslashes (file_get_contents($_FILES['company_logo']['tmp_name']));

  	$target = "images/".basename($image);

	$insert = $db->insert($username,$image,$imagetmp);
	
}

$show = $db->show($username);

foreach($show as $row)
{
 $image_name=$row["image_name"];
 $image=$row["image"];
}
foreach($get_profile as $row)
{
$dbname = $row["dbname"];
$lastname=$row["lastname"];
$password= $row["dbpassword"];
$email=$row["email"];
$address1=$row["address1"];
$address2=$row["address2"];
$city=$row["city"];
$phone=$row["phone"];
$id=$row["id"];
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
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="styles/left.css" rel="stylesheet" type="text/css">
<link href="styles/img.css" rel="stylesheet" type="text/css">
<link href="profile.css" rel="stylesheet" type="text/css">
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
	  <a href="#prof"data-toggle="tab">Update Profile</a>
	  <a href="#myprof" data-toggle="tab">My profile</a>
	  <a href="#clients" data-toggle="tab">Manage Items</a>
	</div>
	<div class="main">
	<div class="tab-content">
	<div id="clients" class="tab-pane fade in active ">
		<h2>Manage Items</h2><hr>
		<h1><?php echo $username;?></h1>
		<div class="row">
			<div class="col-md-12 well"><br/>
				<h3>Add Item</h3><hr>
				<form method="POST" enctype="multipart/form-data">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label"><h4>First Name</h4></label>
							<div class='input-group date' id='datetimepicker1'>
								
								<input type="text" class="form-control" value="<?php echo $dbname?>" disabled="disabled" name="firstname"/>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
							</div>
							
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label"><h4>Last Name</h4></label>
							<div class='input-group date' id='datetimepicker1'>
							<input type="text" class="form-control" value="<?php echo $lastname?>"  disabled="disabled" name="lastname"/>
							<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
						</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label"><h4>Upload Image 1</h4></label>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default btn-file">
										Browse… <input type="file" id="img1_upload" name="img1_upload">
									</span>
								</span>
								
							</div>
							<img id='img-upload'/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label"><h4>Upload Image 2</h4></label>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default btn-file">
										Browse… <input type="file" id="img2_upload" name="img2_upload">
									</span>
								</span>
								
							</div>
							<img id='img-upload'/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label"><h4>Upload Image 3</h4></label>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default btn-file">
										Browse… <input type="file" id="imgInp" name="img3_upload">
									</span>
								</span>
								<!--<input type="text" class="form-control" readonly>-->
							</div>
							<img id='img-upload'/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label"><h4>Upload Image 4</h4></label>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default btn-file">
										Browse… <input type="file" id="imgInp" name="img4_upload">
									</span>
								</span>
								
							</div>
							<img id='img-upload'/>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label"><h4>Description</h4></label>
							<textarea class="form-control" cols="4" rows="4" placeholder="Say something about the product....." name="description"></textarea>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label class="control-label"><h4>Tag Line</h4></label>
							<div class='input-group date' id='datetimepicker1'>
							<input  class="form-control" placeholder="Tag Line" name="tagline"/>
							<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
						
						</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label"><h4>Select Category</h4></label>
							<div class='input-group date' id='datetimepicker1'>
							<input  class="form-control" placeholder="Category" name="category"/>
							<span class="input-group-addon">
									<span class="glyphicon glyphicon-pencil"></span>
								</span>
						</div>
						</div>
					
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label"><h4>Number of Quantity</h4></label>
							<div class='input-group date' id='datetimepicker1'>
							<input  class="form-control" placeholder="Number of Quantity" name="noofquantity"/>
							<span class="input-group-addon">
									<span class="glyphicon glyphicon-euro"></span>
								</span>
						</div>
						</div>
						</div>
				
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label"><h4>Date of Auction</h4></label>
							<div class='input-group date' id='datetimepicker1'>
								<input type='date' data-format="dd/mm/YYYY" class="form-control" name="dateofauction" placeholder="DD/MM/YYYY"/>
								
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label"><h4>Minimum Bid</h4></label>
							<div class='input-group date' id='datetimepicker1'>
							<input class="form-control" placeholder="Minimum Bid in Rupees" name="minbid"/>
							<span class="input-group-addon">
									<span class="glyphicon glyphicon-list-alt"></span>
								</span>
						</div>
					</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label"><h4>Price of the product</h4></label>
							<div class='input-group date' id='datetimepicker1'>
							<input  class="form-control" placeholder="Price of the product" name="price"/>
							
						<span class="input-group-addon">
									<span class="glyphicon glyphicon-yen"></span>
								</span>
						</div>
						</div>
					</div>
					
					<div class="col-md-5"></div>
					<div class="col-md-2">
						<div class="form-group">
							<input type="submit" class="btn btn-default" value="submit" name="submititem"/>
						</div>
					</div>
					<div class="col-md-5"></div>
				</form>	
			</div>
	</div>
	</div>
	<div id="prof" class="tab-pane fade ">
			<div class="col-md-12">
			<h3>Your Profile</h3><hr>
				<div class="col-md-12">
					<form method="POST" action="#" enctype="multipart/form-data">
						
							<div class="col-md-2" style="margin-bottom:20px;">
							<img src="images/bidder.png" style="margin-left: auto;margin-right: auto;" src="" height="120" width="120"/>
						</div>
						<div class="col-md-10">
							<p><b>Insert Your Profiile picture</b>
							<br/></p>
							<h5>
							  <input type="file" id="company_logo" name="company_logo">
							</h5>
							<button class="btn  btn-danger btn-xs" type="submit" name="upload_profile">Upload Image</button>
						</div>
					</form>
				</div>
 				<div class="col-md-12 well">
					<h3>Log In Details</h3>
						<form method="POST">
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label"><h4>First Name *</h4></label>
									<div class='input-group date' id='datetimepicker1'>
								
								<?php echo '<input class="form-control" value= "'.$dbname.'" placeholder="Name" name="firstname" disabled/>';?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
							</div>
								</div>					
							</div>
						
						<div class="col-md-3">
								<div class="form-group">
									<label><h4>Last Name *</h4></label>
									<div class='input-group date' id='datetimepicker1'>
								
								<?php echo '<input class="form-control" value= "'.$lastname.'" placeholder="Name" name="lastname" disabled/>';?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
							</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><h4>Password</h4></label>
									
									<div class='input-group date' id='datetimepicker1'>
								
								<?php echo '<input class="form-control" value= "'.$password.'" placeholder="Name" name="password" disabled/>';?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-key"></span>
								</span>
							</div>
								</div>
							
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><h4> Confirm Password</h4></label>
									<div class='input-group date' id='datetimepicker1'>
								
								<?php echo '<input class="form-control" value= "'.$password.'" placeholder="Name" name="cpassword" disabled/>';?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-key"></span>
								</span>
							</div>
								</div>
								
							</div>
				</div>
				<div class="col-md-12 well">
						 <h3>Contact Details</h3>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label"><h4>Address Line 1 *</h4></label>
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
									<label><h4>Address Line 2 *</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									<?php echo '<input type="text" class="form-control" value= "'.$address2.'" placeholder="Address line " name="address2" required/>';?>
									<span class="input-group-addon">
									<span class="glyphicon glyphicon-home"></span>
								</span>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><h4>City *</h4></label>
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
									<label><h4> Country *</h4></label>
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
									<label><h4>State *</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									<input class="form-control" placeholder="State" name="state"/>
									<span class="input-group-addon">
									<span class="fa fa-map-pin"></span>
								</span>
									</div>
								</div>
							</div>
							<div class="col-md-3"
								<div class="form-group">
									<label><h4>Phone *</h4></label>
									<div class='input-group date' id='datetimepicker1'>
									<?php echo '<input type="tel" class="form-control" value= "'.$phone.'" placeholder="Phone" name="phno" required/>';?>
									<span class="input-group-addon">
									<span class="glyphicon glyphicon-phone"></span>
								</span>
									</div>
								</div>
							</div>
								
				
					<input class="btn btn-default pull-right" type="submit" value="Submit" name="submitdetails"/>
						
					</div>
					</form>
	</div>
			<div id="myprof" class="tab-pane fade "><br/>
				<div class="container">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#home"><h4>My Profile</h4></a></li>
						<li><a data-toggle="tab" href="#menu1"><h4>My Auctions</h4></a></li>
					</ul>
					<div class="tab-content">
						<div id="home" class="tab-pane fade in active">
								
								<div class="col-md-12">
									<div class="col-md-3" style="padding-top:20px;">
										<?php echo "<img style='margin-left: auto;margin-right: auto;'  src='data:image/jpeg;base64,".base64_encode($image)."' class='img-rounded' height=180 width=180/>"; ?>
									</div>
									<div class="col-md-9" style="border-left: 2px solid #D3D3D3;">
										
												<h2><?php echo $dbname ?></h2>
												<p style="font-size:18px;"><cite title="Source Title"><?php echo $city ?></p>
										<hr>
										
										<div class="row">
											<div class="col-md-6">
												<label><h4>User Id</h4></label>
											</div>
											<div class="col-md-6">
											<p><?php echo $id ?></p>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<label><h4>Name</h4></label>
											</div>
											<div class="col-md-6">
											<p><?php echo $dbname ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label><h4>Email</h4></label>
											</div>
											<div class="col-md-6">
												<p><?php echo $email ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label><h4>Phone</h4></label>
											</div>
											<div class="col-md-6">
												<p><?php echo $phone ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label><h4>Address:</h4></label>
											</div>
											<div class="col-md-6">
												<p><?php echo $address1 ?></p>
												<p><?php echo $address2 ?>
											</div>
										</div>
										
										
									</div>
								</div>
						</div>
						<div id="menu1" class="tab-pane fade">
							<h3>My Auctions</h3>
							<?php
							foreach($get_my_auction as $row)
							{
								$id = $row["id"];
								$numberofquantity=$row["numberofquantity"];
								$minbid= $row["minbid"];
								$price=$row["price"];
								$category=$row["category"];
								$tagline=$row["tagline"];
								$description=$row["description"];
								$dateofauction=date('d-m-Y',strtotime($row['dateofauction']));
								

							
							
							
							?>
						    <div class="container well col-md-12">
								<div class="col-md-2">
								<img src="images/1.jpg" class="img-thumbnail" ></img>
								<p>Item No:<?php echo $id ?></p>
								</div>
								<div class="col-md-5">
								<h3>"<?php echo $tagline ?> "</h3>
								<h5><?php echo $description ?></h5>
								<p>Quantity Available:  <?php echo $numberofquantity?> &nbsp &nbsp &nbsp  </p>
								<p>Minimun Bid:&nbsp <?php echo $minbid ?>&nbsp Price:<?php echo $price ?> </p>
								<p>Category : &nbsp<?php echo $category ?> </p>
								<p>End Date  : &nbsp<?php echo $dateofauction ?> </p>
								</div>
								<div class="col-md-5">
								<h5><?php echo '<h5><a href="sellerproduct.php?uid='.$id.'">View Details -></a></h5>';?></h5>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
			
				</div>
			</div>
	</div>
		</div>
    
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datepicker({pickTime: false});
            });
</script>	
	
</div>
</body>
</html>

