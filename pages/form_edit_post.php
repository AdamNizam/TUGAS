<?php
  session_start();
    include '../functions/db.php';
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
$id = $_GET['post_id'];
?>
<html>
<head>
    <title>DINUS DISCUSS</title>
    <link rel="icon" type="image" href="../images/logodinus.png">

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../css/global.css">
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
                <a class="navbar-brand page-scroll" href="home.php"><img src="../images/logodinus.png" height="35px"> DINUS DISCUSS</a></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     				
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
                           <form class="form-inline" action="search.php" method="GET">
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
    	<h4>Edit diskusi</h4>
		<div  class="col-md-8">
            <div> 
                <form method="POST" action="../functions/edit_post.php">
                        
                        <label>Kategori</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                        <?php
                            $sql = mysql_query("SELECT * FROM tblpost where post_id = '$id'");
                            if ($sql) {
                                 while($row=mysql_fetch_assoc($sql)){
                                    extract($row);
                                    echo '<label>Judul Topik</label>
                                        <input type="text" class="form-control" value="'.$title.'" name="title" required>
                                        <label>konten</label>
                                        <textarea name="content" class="form-control">'.$content.'
                                        </textarea>';
                                 }
                            }

                        ?>
                        
                       <br>
                        <input type="hidden" name="userid" value=<?php echo $userid; ?>>
                        <input type="submit" class="btn btn-success pull-right" value="Update">
                   </form><br>
                <hr>
              </div>
        </div>
        <div class="clearfix"></div>
        <div class="footer container text-center">
            <h5>Copyright &copy; 2016 Dinus Discuss Team </h5>
    </div>
</body>
</html>