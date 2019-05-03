<?php
define("dbhost","localhost");
define("dbusername","root");
define("dbpassword","");
define("dbname","auction");

class db_function
{
	public function __construct()
	{
		$this->dbname=mysqli_connect(dbhost,dbusername,dbpassword,dbname);
	}
	public function homelogin($uname,$hashed_password)
	{
		$query = "SELECT * FROM userlogin where dbname = '$uname' and dbpassword = '$hashed_password'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	
	public function insert($userid,$image,$imagetmp)
	{
		$query = "UPDATE seller SET image = '$imagetmp', image_name = '$image' WHERE dbname = '$userid'";
		$resulti = mysqli_query($this->dbname,$query);
		return ($resulti);
	}
	
	public function sellerlogin($sellerusername,$sellerpassword)
	{
		$query = "SELECT * FROM seller where dbname = '$sellerusername' and dbpassword = '$sellerpassword'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	
	public function show($username)
	{
		$query = "SELECT * FROM seller where dbname = '$username'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	
	public function get_all_product()
	{
		$query = "SELECT * FROM additem WHERE 1";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function get_my_auction($username)
	{
		$query = "SELECT * FROM additem WHERE username='$username'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}

	public function get_all_watches()
	{
		$query = "SELECT * FROM additem WHERE category='watches'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	
	public function get_all_glasses()
	{
		$query = "SELECT * FROM additem WHERE category='sunglasses'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function get_all_antics()
	{
		$query = "SELECT * FROM additem WHERE category='antics'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	
	public function get_all_items()
	{
		$query = "SELECT * FROM additem WHERE 1";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function sell_product($uid,$username)
	{
		$query = "UPDATE bid SET status = 1 ,sold_to = '$username' WHERE id='$uid'";
		$result = mysqli_query($this->dbname,$query);
		return $result;
		
	}
	
	public function get_highest_bid($id)
	{
		$query = "SELECT * FROM bid WHERE amount=(SELECT max(amount) FROM bid where productid = '$id')";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function get_all_computer()
	{
		$query = "SELECT * FROM additem WHERE category='computer'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function get_all_sports()
	{
		$query = "SELECT * FROM additem WHERE category='sports'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function get_all_jewellery()
	{
		$query = "SELECT * FROM additem WHERE category='jewellery'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function get_all_homeappliances()
	{
		$query = "SELECT * FROM additem WHERE category='homeappliances'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function get_all_collectives()
	{
		$query = "SELECT * FROM additem WHERE category='collectives'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function get_profile($username)
	{
		$query = "SELECT * FROM seller WHERE dbname='$username'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	
	public function check_if_sold($id)
	{
		$query = "SELECT * FROM bid WHERE productid = '$id'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	
	public function get_bidderprof($username)
	{
		$query = "SELECT * FROM userlogin WHERE dbname='$username'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function selectseller($id)
	{
		$query = "SELECT * FROM bid WHERE productid='$id'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function insertvalueshome($homename,$reglname,$homephone,$homeemail,$homeaddress,$homepassword)
	{
		$queryi = "INSERT INTO userlogin(dbname,lastname,dbpassword,address1,phone,email) VALUES('$homename','$reglname','$homepassword','$homeaddress','$homephone','$homeemail')";
		$resulti = mysqli_query($this->dbname,$queryi);
		return ($resulti);
	}
	public function insertvaluesseller($selname,$sellname,$selphone,$selemail,$seladdress,$selpassword)
	{
		$queryi = "INSERT INTO seller(dbname,lastname,dbpassword,address1,phone,email) VALUES('$selname','$sellname','$selpassword','$seladdress','$selphone','$selemail')";
		$resulti = mysqli_query($this->dbname,$queryi);
		return ($resulti);
	}
	public function additem($description,$tagline,$noofquantity,$minbid,$dateofauction,$price,$category,$username,$image1,$imagetmp1,$image2,$imagetmp2,$image3,$imagetmp3,$image4,$imagetmp4)
	{
		$queryi = "INSERT INTO additem(description,tagline,numberofquantity,minbid,dateofauction,price,category,username,image1,imagetxt1,image2,imagetxt2,image3,imagetxt3,image4,imagetxt4) VALUES('$description','$tagline','$noofquantity','$minbid','$dateofauction','$price','$category','$username','$image1','$imagetmp1','$image2','$imagetmp2','$image3','$imagetmp3','$image4','$imagetmp4')";
		$resulti = mysqli_query($this->dbname,$queryi);
		return ($resulti);
	}
	public function updateprof($address1,$address2,$city,$country,$state,$phoneno,$username)
	{
		$queryi = "UPDATE userlogin SET address1='$address1',address2='$address2',city='$city',country='$country',state='$state' ,phone='$phoneno' WHERE dbname = '$username'";
		$resulti = mysqli_query($this->dbname,$queryi);
		return ($resulti);
	}
	public function updateprofseller($address1,$address2,$city,$country,$state,$phoneno,$username)
	{
		$queryi = "UPDATE seller SET address1='$address1',address2='$address2',city='$city',country='$country',state='$state' ,phone='$phoneno' WHERE dbname = '$username'";
		$resulti = mysqli_query($this->dbname,$queryi);
		return ($resulti);
	}
	public function bidding($amount,$username,$uid)
	{
		$queryi = "INSERT INTO bid(amount,username,productid) VALUES('$amount','$username','$uid')";
		$resulti = mysqli_query($this->dbname,$queryi);
		return ($resulti);
	}
	public function maxbid($uid)
	{
		$query = "SELECT max(amount) FROM bid where productid = '$uid'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
		
	}

	public function retriveimg($uid)
	{
		$query = "SELECT * FROM additem where id = '$uid'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
	public function myauction($uid)
	{
		$query = "SELECT * FROM additem where id = '$uid'";
		$result = mysqli_query($this->dbname,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows>0) {
			while($row=@mysqli_fetch_assoc($result))
			{$data[]=$row;}
		return $data;
		}
	}
}

?>