<?php
include "db.php";
  if(isset($_GET['post_id'])){
		$postid = $_GET['post_id'];
	}
	if(empty($postid)){
		header("location:index.php");
	}

	$run = mysql_query("DELETE FROM tblpost WHERE post_Id = '$postid'")
	or die(mysql_error());  	

	header("Location:../pages/home.php");
	
?>