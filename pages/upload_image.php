<?php
include "../pages/config.php";
$x=$_POST['x'];
$foto         =$_FILES['gambar']['tmp_name'];
$foto_name     =$_FILES['gambar']['name'];
$acak        = rand(1,99);
$tujuan_foto = $acak.$foto_name;
$tempat_foto = 'img/'.$tujuan_foto;
       
if (isset($_POST['update'])){
if (!$foto==""){
    $buat_foto=$tujuan_foto;
    $d = 'img/'.$x;
    @unlink ("$d");
    copy ($foto,$tempat_foto);
}else{
    $buat_foto=$x;
}
            $qu=mysql_query("UPDATE tb_images SET
            images='$buat_foto'
            WHERE id='$id'")or die (mysql_error());
           
    ?><script language="javascript">alert("Data Berhasil Diupdate")</script><?
    ?><script>document.location='view_image.php';</script><?
    }
?>