<?php
include "koneksi.php";
$id_kelurahan=$_GET['id_kelurahan'];

$hasil=mysqli_query($kon,"select * from tbl_kelurahan where id_kelurahan='$id_kelurahan'");
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

			<table width="515" border="0" align="center">
				<tr>
					<td width="655">
						<b><font color="#CC0000"><?php echo $data['kelurahan'];?> </font></b>
					</td>
					<tr>
						<td style="text-align: justify;"><hr>
							<?php echo "$data[deskripsi]"; ?> 
						</td>
					</td>
				</tr>
			</body>
			</html>