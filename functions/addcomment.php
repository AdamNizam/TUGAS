
<?php
		include "db.php";
        $comment = mysql_real_escape_string($_POST['comment']);
        $userid = $_POST['userid'];
        $postid = $_POST['postid'];
        date_default_timezone_set("Asia/Jakarta");
        $datetime=date("Y-m-d h:i:sa");
        $comment = mysql_query("Insert into tblcomment (comment,post_Id,user_Id,datetime) values ('$comment','$postid','$userid','$datetime') ");
        $sql = mysql_query("SELECT * from tblcomment as c join tbluser as u on c.user_Id=u.user_Id where post_Id='$postid' and c.user_Id='$userid' 
        					and c.datetime='$datetime'");

	 while($row=mysql_fetch_assoc($sql)){
                     if($row['user_Id']==$userid){
                    echo '<label>Dikomentar Oleh : </label> '.$row["fname"].' '.$row["lname"].'<td>
                    <a href="../functions/delete_comment.php?comment_Id='.$row['comment_Id'].'" class="hapus"><span class="btn glyphicon glyphicon-trash"></span></a></td>';
                     echo '<label class="pull-right">'.$row['datetime'].'</label>';
                     echo "<p class='well'>".$row['comment']."</p>";

                       }
                  else {
                      echo "<label>Dikomentar Oleh : </label> ".$row['fname']." ".$row['lname']."<br>";
                     echo '<label class="pull-right">'.$row['datetime'].'</label>';
                     echo "<p class='well'>".$row['comment']."</p>";
                     }
              }
?>