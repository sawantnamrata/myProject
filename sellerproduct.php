<?php 
session_start();
$username = $_SESSION["username"];
include("functions.php");
$db = new db_function();
$uid = $_GET['uid'];
$myauction = $db->myauction($uid);
foreach ($myauction as $row)
{
	$imagetxt1 = $row["imagetxt1"];
	$imagetxt2 = $row["imagetxt2"];
	$imagetxt3 = $row["imagetxt3"];
	$imagetxt4 = $row["imagetxt4"];
	$image1 = $row["image1"];
	$tagline = $row["tagline"];
	$desc=$row["description"];
	$price=$row["price"];
	$minbid=$row["minbid"];
	$numberofquantity=$row["numberofquantity"];
	$dateofauction=date('d-m-Y',strtotime($row['dateofauction']));
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
<link href="gallery.css" rel="stylesheet" type="text/css">	
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
	<br>
	<br><br><br>
<br>
<br>
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    
    <div class="carousel-inner">
      <div class="item active">
       <?php
	  if($imagetxt1){
		echo "<img style='margin-left: auto;margin-right: auto;' class='img-fluid' src='data:image/jpeg;base64,".base64_encode($imagetxt1)."'  />";
	  }
	  ?>
		<div class="carousel-caption">
        
        </div>
      </div>

      <div class="item">
        <?php
	  if($imagetxt2){
		echo "<img style='margin-left: auto;margin-right: auto;' class='img-fluid' src='data:image/jpeg;base64,".base64_encode($imagetxt2)."'  />";
	  }
	  ?>
		<div class="carousel-caption">
         
        </div>
      </div>
    
      <div class="item">
         <?php
	  if($imagetxt3){
		echo "<img style='margin-left: auto;margin-right: auto;' class='img-fluid' src='data:image/jpeg;base64,".base64_encode($imagetxt3)."'  />";
	  }
	  ?>		<div class="carousel-caption">
          
        </div>
      </div>
	  <div class="item">
         <?php
	  if($imagetxt4){
		echo "<img style='margin-left: auto;margin-right: auto;' class='img-fluid' src='data:image/jpeg;base64,".base64_encode($imagetxt4)."'  />";
	  }
	  ?>		<div class="carousel-caption">
        
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

<div class="col-md-12 card">

<div class="col-md-12 well">
	<div class="row">
		<div class="col-md-3 col-md-offset-2">
		<label><h4>Product Id</h4></label>
		</div>
		<div class="col-md-4">
		<p><?php echo $uid ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-md-offset-2">
		<label><h4>Description</h4></label>
		</div>
		<div class="col-md-4">
		<p><?php echo $desc ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-md-offset-2">
		<label><h4>Price</h4></label>
		</div>
		<div class="col-md-4">
		<p><?php echo $price ?> </p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-md-offset-2">
		<label><h4>Minimun Bid</h4></label>
		</div>
		<div class="col-md-4">
		<p><?php echo $minbid ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-md-offset-2">
		<label><h4>Available Quantity</h4></label>
		</div>
		<div class="col-md-4">
		<p><?php echo $numberofquantity ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-md-offset-2">
		<label><h4>End Date</h4></label>
		</div>
		<div class="col-md-4">
		<p><?php echo $dateofauction ?></p>
		</div>
	</div>
	
	
	
	
	</div>
</div>
</body>
</html>