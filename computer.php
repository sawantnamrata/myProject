<?php 
session_start();
include("functions.php");
$db = new db_function();
$get_all_computer= $db->get_all_computer();
					
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
<link href="gallery.css" rel="stylesheet" type="text/css">	
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>


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
						<div class="logo_container">
							<a href="#">Bar<span>gain</span></a>
						</div>
						
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

							    <li class="account">
									<a href="index.php">
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
	<br>
	<br><br><br>
	<center><h2>Computer Appliances</h2></center>
	<div class="container well col-md-12">
		  <div class="row col-md-12">
					<center>
						<?php
						foreach($get_all_computer as $row)
						{
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
							  <img src="images/1.jpg" class="img-thumbnail" ></img>
							  <p>Item No:<?php echo $id ?></p>
							  </div>
							  <div class="col-md-5">
							  <h3>"<?php echo $tagline ?> "</h3>
							  <h5><?php echo $description ?></h5>
							  <p>Quantity Available:  <?php echo $numberofquantity?> &nbsp &nbsp &nbsp Date of Auction :<?php echo $date?> </p>
							  <p>Minimun Bid: <?php echo $minbid ?>Price:<?php echo $price ?> </p>
							  </div>
							  <div class="col-md-5">
							  <?php echo '<h5><a href="products.php?uid='.$id.'">View Details -></a></h5>';?>
							  </div>
						</div>
						<?php 
						}?>
						</center>
					</div>
	</div>

	
	
</body>
</html>