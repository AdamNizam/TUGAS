<?php

include "db.php";
 					date_default_timezone_set("Asia/Jakarta");
                        $datetime=date("Y-m-d h:i:sa");
                        
extract($_POST);
$sql = "UPDATE tblpost SET title = '$title' ,content = '$content', cat_id = '$category' where post_id = '$id'";
$res = mysql_query($sql);

if($res==true){
       echo '<script language="javascript">';
        echo 'alert("Post edited Successfully")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../pages/profile.php" />';
} 


?>