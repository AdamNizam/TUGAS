<?php
include "db.php";
  if(isset($_GET['comment_Id'])){
		$id = $_GET['comment_Id'];
	}
	if(empty($id)){
		header("location:../pages/home.php");
	}

	$run = mysql_query("DELETE FROM tblcomment WHERE comment_Id = '$id'")
	or die(mysql_error()); 
	header('Location: ' . $_SERVER["HTTP_REFERER"] ); 	
?>