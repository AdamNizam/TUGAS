<?php
  session_start();
  if (isset($_SESSION['uname'])&&$_SESSION['uname']!=""){
  }
  else
  {
    header("Location:index.php");
  }
$uname=$_SESSION['uname'];

?>
<html>
<head>
    <title>Dasboard Admin</title>
    <link rel="icon" type="image" href="../images/logodinus.png">
	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="../js/jquery.js"></script>
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
                <a class="navbar-brand page-scroll" href="home.php"><img src="../images/logodinus.png" height="30px"> Admin</a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	
                <ul class="nav navbar-nav navbar-left">
                   <li><a href="home.php"> Dashboard</a></li>
                    <li><a href="post.php"> Topik</a></li>
                    <li  class="active"><a href="user.php"> Pengguna</a></li>
                    <li><a href="category.php">Kategori</a></li>


                </ul>
              <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" ><span class="glyphicon glyphicon-user"></span> <?php echo $uname;?></a></li>
                <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
               
                </ul>

                
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="container" style="margin:8% auto;width:900px;">
      <?php  
            include "../functions/db.php";

                    $sel1 = mysql_query("SELECT count(id) as user from tbluser as tu join tblaccount as ta on tu.user_Id=ta.user_Id");
                    while($row1=mysql_fetch_assoc($sel1)){
                        extract($row1);
                        echo '<div class="panel-heading">
                            <h3 class="panel-title">Jumalah Pengguna : '.$user.'</h3>
                         </div> ';
                    }
                        ?>
           
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Pengguna</h3>
                </div> 
                 <div class="panel-body">
            <table class="table table-stripped">
                                <th>Id Pengguna</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            <?php
                            
                            include "../functions/db.php";

                            $sql = "SELECT * from tbluser as tu join tblaccount as ta on tu.user_Id=ta.user_Id";
                            $run = mysql_query($sql);

                            while($row=mysql_fetch_array($run))
                            {
                                extract($row);
                                echo "<tr>";
                                echo "<td>".$id."</td>";
                                echo "<td>".$fname.' '.$lname."</td>";
                                echo "<td>".$gender."</td>";
                                echo "<td>".$email."</td>";
                                echo "<td>".$status."</td>";
                                echo '<td><button class="btn btn-danger" onclick="deleteuser('.$user_Id.')">Hapus</button>';
                                echo "</tr>";
                            }
                           

                            ?>
                            </table>
                     </div>
                </div>

            </div>
            <script type="text/javascript">

            function deleteuser(user_Id){
                var datastring = 'action=deleteuser&user_Id='+user_Id;
                var con = confirm("Apakah Anda yakin ingin menghapus?");
                if(con==true){
                    $.ajax({
                    type: "POST",
                    url: "functions/crud.php",
                    data: datastring,
                    success: function(result){
                        if(result=="success"){
                            window.location.href="user.php";
                        }
                        else{
                            alert("Gagal menghapus");
                        }
                    }
                });
                }
                
                return false;
            }

            </script>
	</body>
</html>