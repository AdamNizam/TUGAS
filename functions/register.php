<?php
include "db.php";

extract($_POST);

	$fname = str_replace("'","`",$fname); 
	$fname = mysql_real_escape_string($fname);
	
	$lname = str_replace("'","`",$lname); 
	$lname = mysql_real_escape_string($lname); 

	$gender = str_replace("'","`",$gender); 
	$gender = mysql_real_escape_string($gender);

//	$email = str_replace("'","`",$email); 
//	$email = mysql_real_escape_string($email);

	$status = str_replace("'","`",$status); 
	$status = mysql_real_escape_string($status); 
	        
	$id = str_replace("'","`",$id); 
	$id = mysql_real_escape_string($id); 

	$password = str_replace("'","`",$password); 
	$password = mysql_real_escape_string($password);
	$password = md5($password);
$cek_id=mysql_num_rows(mysql_query("SELECT id FROM tblaccount WHERE id='$id'"));
if ($cek_id > 0){
  
                                   echo '<script language="javascript">';
                                   echo 'alert("NIM/NPP atau Email sudah ada yang pakai. Ulangi lagi")';
                                   echo '</script>';
                                   echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
}
else{
$sql = "INSERT INTO `tbluser`(`fname`, `lname`, `gender`,`status`) VALUES ('$fname','$lname','$gender','$status')";
$result = mysql_query($sql);

 if($result)
	{
		$a = mysql_query("SELECT * FROM `tbluser` WHERE `fname` = '$fname'");
		$aa = mysql_fetch_array($a);
		
		if($a)
		{
			$aaa = $aa['user_Id'];
			$sql = "INSERT INTO `tblaccount`(`id`, `password`, `user_Id`) VALUES('$id','$password',$aaa)";
			$res = mysql_query($sql);
			
			if($res==true)
                            {
                                   echo '<script language="javascript">';
                                    echo 'alert("Successfully Registered")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
                            }

		}
			
		
	}

}


?>