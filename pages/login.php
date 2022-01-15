<?php 

    session_start();
    
    include '../functions/db.php';
    extract($_POST);

    //$id = $_POST['id'];
    //$password = $_POST['password'];

    $pwd = md5($password);
 
   // $gender = str_replace("'","`",$gender); 
    //$gender = mysql_real_escape_string($gender);

   // $email = str_replace("'","`",$email); 
    //$email = mysql_real_escape_string($email);

    //$status = str_replace("'","`",$status); 
    //$status = mysql_real_escape_string($status); 

    $id = mysql_real_escape_string($_POST['id']);
    $password = mysql_real_escape_string($_POST['password']);

    $query = "SELECT *  FROM tblaccount as a join tbluser as u on a.user_Id=u.user_Id WHERE id = '$id' AND password = '$pwd'";
    $result = mysql_query($query) or die ("Verification error");
    $array = mysql_fetch_array($result);
    
    if ($array['id'] == $id){
        $_SESSION['id'] = $id;
        $_SESSION['fname'] = $array['fname'];
        $_SESSION['lname'] = $array['lname'];
        $_SESSION['gender'] = $array['gender'];
        $_SESSION['email'] = $array['email'];
        $_SESSION['status'] = $array['status'];
        $_SESSION['user_Id'] = $array['user_Id'];
        header("Location: home.php");
    }
    
    else{
        echo '<script language="javascript">';
        echo 'alert("Incorrect id or password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
    }
   
?>