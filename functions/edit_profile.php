        <?php
            include "db.php";
            if(isset($_POST['edit'])){
            $userid= $_POST['userid'];
            $fname= $_POST['fname'];
            $lname= $_POST['lname'];
            $gender= $_POST['gender'];
            $email= $_POST['email'];
            $status= $_POST['status'];
    $sql = "UPDATE `tbluser` SET `fname`='$fname',`lname`='$lname',`gender`='$gender',`email`='$email', `status`='$status' WHERE `user_Id`='$userid'";
    $run = mysql_query($sql);
                             
                        if($run==true)
                         {
                                  echo '<script language="javascript">';
                                      echo 'alert("Updated")';
                                  echo '</script>';
                                     echo '<meta http-equiv="refresh" content="0;url=../pages/profile.php" />';
                            }
                 } 
                 else {
                       echo "Can't Updated";
                         }        
          ?>