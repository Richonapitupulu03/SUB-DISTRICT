<?php
include "koneksi.php";
$id_berita=$_GET['id_berita'];

$hasil=mysqli_query($kon,"select * from tbl_berita where id_berita='$id_berita'");
$data = mysqli_fetch_array($hasil)
?>
<!DOCTYPE html>
<html>
<head>
	<title>Potensi Daerah Kecamatan Pancur Batu</title>
</head>
<body>
<table border="1" align="center">
	
<tr>

	<td width="800" valign="top">
		<img style=" width: 280px; height:300px; border-color: white;" src="../Admin/menu/foto/<?php echo $data['foto'];?>">
	<table width="515" border="0" align="right">
<tr>
	<td width="655">
		<b><font color="#CC0000"><?php echo $data['judul'];?> </font></b>
	</td>
<tr>
	<td><hr>
		<?php echo "$data[content]"; ?> 
	</td>
	</td>
</tr>
</body>
</html>