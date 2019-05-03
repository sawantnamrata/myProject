<?php
session_start();
	if(isset($_SESSION['username']))
	{
		unset($_SESSION['username']);
	}
	session_destroy();
	echo "<script>document.location='index.php'</script>";
?>