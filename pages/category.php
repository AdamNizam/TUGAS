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
              <script type="text/javascript">
            $(function(){
             $('#button-hide').click(function() {
             $(this).hide();
              }); 
            });
            
    $(document).ready(function() {
      
      $('div.demo-show:eq(0)> div').hide();  
      $('div.demo-show:eq(0)> h3').click(function() {
        $(this).next().slideToggle('normal');
      });
    });
    $(document).ready(function() {
      $('div.demo-show:eq(1)> div').hide();  
      $('div.demo-show:eq(1)> h3').click(function() {
        $(this).next().slideToggle('normal');
      });
    });
    $(document).ready(function() {
      $('div.demo-show:eq(2)> div').hide();  
      $('div.demo-show:eq(2)> h3').click(function() {
        $(this).next().slideToggle('normal');
      });
    });
    $(document).ready(function() {
      $('div.demo-show:eq(3)> div').hide();  
      $('div.demo-show:eq(3)> h3').click(function() {
        $(this).next().slideToggle('normal');
      });
    });
    $(document).ready(function() {
      $('div.demo-show:eq(4)> div').hide();  
      $('div.demo-show:eq(4)> h3').click(function() {
        $(this).next().slideToggle('normal');
      });
    });

      $(function(){
        $(document).on("click", "a.hapus", function() {
        if (confirm('Posting yakin dihapus ?')) {
        return true;}
        else {
            return false;
        }
        });
        });
        </script>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
                           <form  class="form-inline"  action="search.php" method="GET">
                            <input  type="text" class="form-control" name="cari" placeholder="Cari">
                            <button type="submit" class="btn glyphicon glyphicon-search btn-default"></button>
                            </form>
                        </div>
                        </li>
                         <li><a href="profile.php" ><span class="glyphicon glyphicon-user"></span> <?php 
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
        <?php  include "../functions/db.php";
            $num_rec_per_page=3;
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
            $start_from = ($page-1) * $num_rec_per_page; 
        $sel = mysql_query("SELECT * from category ");
        while($row=mysql_fetch_assoc($sel)){
            extract($row);
           echo '<div class="panel panel-default">
                    
                   <div class="panel-heading demo-show"><h3 class="panel-title demo-show">'.$category.'</h3>                   
                    <div class="panel-body" >
                    <table class="table table-stripped">
                    <tr>
                    <th>Topic title</th>
                    <th>Category</th>
                    <th>Comment</th>
                    <th>Action</th>
                    </tr>';
                    $sel1 = mysql_query("SELECT * from tblpost where cat_id='$cat_id' order by datetime desc limit $start_from, $num_rec_per_page");
                    while($row1=mysql_fetch_assoc($sel1)){
                        extract($row1);
                        $sel2 = mysql_query("SELECT count(comment) as komen from tblcomment where post_Id='$post_Id' ");
                   while($row2=mysql_fetch_assoc($sel2)){
                        extract($row2);
                        echo '<tr>';
                        echo '<td>'.$title.'</td>';
                        echo '<td>'.$category.'</td>';
                        echo '<td>'.$komen.'</td>';
                        echo '<td><a href="content.php?post_id='.$post_Id.'"><button class="btn btn-success">View</button>
                        <a href="form_edit_post.php?post_id='.$post_Id.'"><button class="btn btn-warning">Edit</button></a>
                        <a href="../functions/delete_post.php?post_id='.$post_Id.'" class="hapus"><button class="btn btn-danger">Delete</button></td>';
                        echo '</tr>';
                    }
                  }


                echo '</table>';
                   $sql = "SELECT * from tblpost as tp join category as c on tp.cat_id=c.cat_id"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page);
                    echo ' <div class="panel-body text-center">'; 
                    echo '<nav aria-label="...">';
                    echo '<ul class="pagination">';
                    echo '<li class="previous">';
                    echo  '<a href="category.php?page=1"><span aria-hidden="true">&laquo;</span></a></li>'; // Goto 1st page  
                    for ($i=1; $i<=$total_pages; $i++) { 
                    echo '<li>';
                    echo '<a href="category.php?page='.$i.'">'.$i.'<span class="sr-only">(current)</span></a></li> '; 
                    }; 
                    echo '<li class="next">';
                    echo '<a href="category.php?page='.$total_pages.'"><span aria-hidden="true">&raquo;</span></a></li> '; // Goto last page
                   echo '
                    </div>
                    </ul>
                    </nav>
                   </div>
                   </div>
                </div>';
        }
        ?>
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
                        <input type="text" class="form-control" name="title" required>
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
        <div class="footer container text-center">
            <h5>Copyright &copy; 2016 Dinus Discuss Team </h5>
    </div>
</body>
</html>