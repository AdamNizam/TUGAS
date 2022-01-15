<?php
  session_start();
  if (isset($_SESSION['id'])&&$_SESSION['id']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
//$id=$_SESSION['id'];
//$fname=$_SESSION['fname'];
//$lname=$_SESSION['lname'];
$userid = $_SESSION['user_Id'];
?>
<html>
<head>
    <title>DINUS DISCUSS</title>
    <link rel="icon" type="image" href="../images/logodinus.png">

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../css/global.css">
    <link rel="stylesheet" type="text/css" href="../css/edit_comment.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</head>
<body>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">beralih navigasi</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="home.php"><img src="../images/logodinus.png" height="35px"> DINUS DISCUSS</a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
              <script type="text/javascript">
            $(function(){
             $('#button-hide').click(function() {
             $(this).hide();
              }); 
            });
            $(function(){
        $(document).on("click", "a.hapus", function() {
        if (confirm('Komentar yakin dihapus ?')) {
        return true;}
        else {
            return false;
        }
        });
        });
        </script>

            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-left">
                    <li><a href="#quest"> Posting Pertanyaan</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="category.php">Kategori</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="profile.php">Profil</a></li>         
                    </ul>
     				 <ul class="nav navbar-nav navbar-right">
             <li>
                        <div  class="navbar-form navbar-right">
                            <button id="button-hide" class="btn glyphicon glyphicon-search btn-default" onclick="$('#hide').toggle();"></button>
                        </div>
                    </li>
                     <li>               
                      <div id="hide" style="display: none">
                           <form id="cekcari" class="form-inline"  action="search.php" method="GET">
                            <input  type="text" class="form-control" name="cari" placeholder="Cari">
                            <button type="submit" class="btn glyphicon glyphicon-search btn-default"></button>
                            </form>
                        </div>
                        </li>
                         <li><a href="profile.php" ><span class="glyphicon glyphicon-user"></span> 
                <?php 
                include '../functions/db.php';
                $query = "SELECT * FROM tbluser WHERE user_Id = '$userid' ";
                $result = mysql_query($query) or die ("Verification error");
                while($row=mysql_fetch_assoc($result)){
                extract($row);
                echo " " .$fname.' '.$lname;
                 }
                ?></a></li>
                        <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
                
                </ul>   
               
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container" style="margin:7% auto;">
    	<h4>Diskusi</h4>
    	<hr>
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Posting Pertanyaan</h3>
                </div> 
                 <div class="panel-body">
         
              
                
                            <?php

                include "../functions/db.php";
                     $id = $_GET['post_id'];
                     
                
                $sql = mysql_query("SELECT * from tblpost as tp join category as c on tp.cat_id=c.cat_id where tp.post_Id='$id' ");
                if($sql==true){
                  while($row=mysql_fetch_assoc($sql)){
                    extract($row);
                    if($user_Id==009){
                       echo "<label>Judul Topik: </label> ".$title."<br>";
                       echo "<label>Kategori: </label> ".$category."<br>";
                       echo "<label>Waktu Posting: </label> ".$datetime;
                       echo "<p class='well'>".$content."</p>";
                       echo "<label>Dikirim Oleh : </label> Admin";
                    }
                    else{
                      $sel = mysql_query("SELECT * from tbluser where user_Id='$user_Id' ");
                      while($row=mysql_fetch_assoc($sel)){
                        extract($row);
                        echo "<label>Judul Topik: </label> ".$title."<br>";
                       echo "<label>Kategori: </label> ".$category."<br>";
                       echo "<label>Waktu Posting: </label> ".$datetime;
                       echo "<p class='well'>".$content."</p>";
                       echo '<label>Dikirim Oleh : </label>' .$fname.' '.$lname;
                      //echo '<td><a href="delete_post.php?user_Id='.$userid.'"><button class="btn btn-danger">Delete</button></td>';
                      }
                      
                    }
                    
         
                }
                }
                
              
                    
              ?>
              <br>
              <br>
              <br><label>Komentar</label><br>
              <br>
              <div id="comments">
              <?php 
              $postid= $_GET['post_id'];
              $sql = mysql_query("SELECT * from tblcomment as c join tbluser as u on c.user_Id=u.user_Id where post_Id='$postid' order by datetime asc");
              $num = mysql_num_rows($sql);
              if($num>0){
              while($row=mysql_fetch_assoc($sql)){
                if($row['user_Id']==$userid){
                    echo '<label>Dikomentar Oleh : </label> '.$row["fname"].' '.$row["lname"].'<td>
                    <a href="../functions/delete_comment.php?comment_Id='.$row['comment_Id'].'" class="hapus"><span class="btn glyphicon glyphicon-trash"></span></a></td>';
                     echo '<label class="pull-right">'.$row['datetime'].'</label>';
                     echo "<p class='well'>".$row['comment']."</p>";
                     echo '';
                   }
                  else {
                      echo "<label>Dikomentar Oleh : </label> ".$row['fname']." ".$row['lname']."<br>";
                     echo '<label class="pull-right">'.$row['datetime'].'</label>';
                     echo "<p class='well'>".$row['comment']."</p>";
                     }

              }

            }

              ?>
            </div>
              </div>
          </div>
          <hr>
            <div class="col-sm-5 col-md-5 sidebar">
          <h3>Komentar</h3>
          <form method="POST">
            <textarea type="text" class="form-control" id="commenttxt"></textarea><br>
            <input type="hidden" id="postid" value="<?php echo $_GET['post_id']; ?>">
            <input type="hidden" id="userid" value="<?php echo $_SESSION['user_Id']; ?>">
            <input type="hidden">
            <input type="submit" id="save" class="btn btn-success pull-right" value="Comment">
          </form>
        </div>
    </div>

		<div class="my-quest" id="quest">
            <div> 
                <form method="POST" action="../functions/question-function.php">
                        
                         <label>Kategori</label>
                        <select name="category" class="form-control">
                            <option></option>
                            <?php $sel = mysql_query("SELECT * from category");

                                if($sel==true){
                                    while($row=mysql_fetch_assoc($sel)){
                                        extract($row);
                                        echo '<option value='.$cat_id.'>'.$category.'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <label>Judul Topik</label>
                        <input type="text" class="form-control" name="title"required>
                        <label>konten</label>
                        <textarea name="content"class="form-control">
                        </textarea>
                       <br>
                        <input type="hidden" name="userid" value=<?php echo $userid; ?>>
                        <input type="submit" class="btn btn-success pull-right" value="Post">
                   </form><br>
                <hr>
                  <a href="" class="pull-right">Keluar</a>
              </div>
        </div>
        <div class="clearfix"></div>
        <div class="footer container text-center">
            <h5>Copyright &copy; 2016 Dinus Discuss Team </h5>
        </div>
</body>
<script>

$("#save").click(function(){
var postid = $("#postid").val();
var userid = $("#userid").val();
var comment = $("#commenttxt").val();
var datastring = 'postid=' + postid + '&userid=' + userid + '&comment=' + comment;
if(!comment){
  alert("Please enter some text comment");
}
else{
  $.ajax({
    type:"POST",
    url: "../functions/addcomment.php",
    data: datastring,
    cache: false,
    success: function(result){
      document.getElementById("commenttxt").value=' ';
      $("#comments").append(result);
    }
  });
}
return false;
})

</script>
</html>