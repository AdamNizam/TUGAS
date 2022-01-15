 <!DOCTYPE html>
<html>
<head>

	<title>DINUS DISCUSS</title>
	<!-- judul dari aplikasi di tab -->
	<link rel="icon" type="image" href="images/logodinus.png">

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.4.js"></script>
  	<script type="text/javascript" src="js/jquery.validate.js"></script>
  	 <script type="text/javascript" src="js/cekpass.js"></script>

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
                <a class="navbar-brand" href="pages/home.php"><img src="images/logodinus.png" height="35px"> DINUS DISCUSS</a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
        <script type="text/javascript">
    		$(function(){
             $('#button-hide').click(function() {
             $(this).hide();
              }); 
        	});
      		
      	</script>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
            	<div  class="navbar-form navbar-right">
            		<button id="button-hide" class="btn btn-primary" onclick="$('#masuk').toggle();">Masuk</button>
            	</div>
                <div id="masuk" style="display: none">
					<form class="navbar-form navbar-right" method="POST" role="search" action="pages/login.php" >
					<div class="form-group">
					<input type="text" class="form-control" name="id" placeholder="NIM/NPP" required>
					<input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>
					<button type="submit" class="btn btn-primary">Masuk</button>
					</form>
				</div>                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
   <div class="images"  style="background-image: url('images/dinusdiscuss.jpg');">
		<div class="container" style="margin:5% auto;" >  
				
				 <div class="col-sm-5 col-md-4 pull-left">

                   <div class="row">
                   <form method="POST" id="cekpass" class=" form-horizontal" action="functions/register.php" >                   
						<form class="form-signin" >
							<h3 class="text-center">Daftar Disini</h3>						
							<div class="form-group">
								<label for="inputfname" class="col-sm-2 control-label">Nama Depan</label>
									<div class="col-sm-10">
								<input type="text" name="fname" placeholder="Nama Depan" class="form-control" required>
									</div>
							</div>
							<div class="form-group"> 
								<label for="inputlname" class="col-sm-2 control-label">Nama Belakang</label>
									<div class="col-sm-10">
								<input type="text" name="lname" placeholder="Nama Belakang" class="form-control" required>
									</div>
							</div>
							<div class="form-group">
								<label for="inputgender" class="col-sm-2 control-label">Jenis Kelamin</label>
									<div class="col-sm-10">
									<select class="form-control" name="gender">
										<option>Jenis Kelamin</option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
									</div>
							</div>
							<!--<div class="form-group">
							<label for="inputemail" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" name="email" placeholder="Email" class="form-control" required>
							</div>
							</div>-->
							<div class="form-group">
								<label for="inputstatus" class="col-sm-2 control-label">Status</label>
									<div class="col-sm-10">
									<select class="form-control" name="status">
										<option>Status</option>
										<option value="Mahasiswa">Mahasiswa</option>
										<option value="Dosen">Dosen</option>
									</select>
									</div>
							</div>
							<div class="form-group">
									<label for="inputusername" class="col-sm-2 control-label">NIM/NPP</label>
								<div class="col-sm-10">
									<input type="text" placeholder="NIM/NPP" name="id" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
									<label for="inputpassword" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">	
									<input type="password" placeholder="Password" name="password" id="pass" class="form-control">
								</div>
							</div>
							<div class="form-group">
									<label for="inputconfirmpassword" class="col-sm-2 control-label">Confirm Password</label>
								<div class="col-sm-10">	
									<input type="password" placeholder="Konfirmasi Password" name="corfirmpassword" class="form-control" ></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
    				     		<input type="submit" value="Daftar" class="btn btn-primary" style="width:100%;">
    				     		</div>
							</div>
						  </form>
						</form>
					</div>
				</div>
			</div>
		</div>
    <div class="footer">
		<div class="container text-center">
	<h5>Copyright &copy; 2016 Dinus Discuss Team </h5>		
		</div>
	</div>

</body>
</html>