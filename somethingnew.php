<html>
<head>
<title>Bargain</title>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="styles/main_styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/responsive.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
       $("#dash").click(function(){
        $('#contents').load('seller.php');
         //alert("Thanks for visiting!");
       }); 

	 });
</script>

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
								<li id="dash"><a href="#">Dashboard</a></li>
								<li><a href="#aboutus">Current Auctions</a></li>
								<li><a href="#categories_div">Categories</a></li>
								<li><a href="#contact">Contact Us</a></li>
							</ul>		`						
						</nav>
					</div>
				</div>
			</div>
		</div>	
	</header>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div id="contents" style="clear:both;">

</div>	

</div>
</body>