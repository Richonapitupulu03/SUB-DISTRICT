<?php include "koneksi.php"; ?>

<?php 
$no = +1;
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $kon->query("SELECT * FROM tbl_det_potensi 
	INNER JOIN tbl_kelurahan ON tbl_det_potensi.id_kelurahan = tbl_kelurahan.id_kelurahan 
	INNER JOIN tbl_potensi ON tbl_det_potensi.id_potensi = tbl_potensi.id_potensi WHERE j_potensi LIKE '%$keyword%' OR kelurahan LIKE '%$keyword%' ORDER BY id_detpo DESC");       
while ($pecah = $ambil->fetch_assoc()) 
{
	$semuadata[]=$pecah;
} 
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
<head>
	<title>Potensi Daerah Pancur Batu</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
	<link rel="stylesheet" href="../style.css">
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<?php include "menu.php"; ?>
	<section class="home-section">
		<?php include "header.php"; ?>

		<div class="home-content">
			<center><h1>Data Potensi Daerah</h1></center>
			<br>
			<div class="card-body">
				<form style="margin-left: 10px;" action="pencarian.php" method="get">
					<div class="row">
						<div class="col-md-3">
							<input class="form-control" type="text" placeholder="Ketik kelurahan..." aria-label="Search for..." aria-describedby="btnNavbarSearch" autocomplete="off" name="keyword" />
						</div>                                                  	
						<button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="bx bx-search"></i></button>
					</div>
				</form>
			</div>
			<?php
    //Cek apakah ada nilai dari method GET dengan nama id_anggota
			if (isset($_GET['id_detpo'])) {
				$id_anggota=htmlspecialchars($_GET["id_detpo"]);

				$sql="delete from tbl_det_potensi where id_detpo = '$_GET[id_detpo]'"; 
				$hasil=mysqli_query($kon,$sql);
				
        //Kondisi apakah berhasil atau tidak
				if ($hasil) {
					header("Location:potensidaerah.php");

				}
				else {
					echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

				}
			}
			?> 	
			<br>
			<p style="margin-left: 10px;">Hasil Pencarian : <?php echo $keyword ?> /<small><a href="potensitestcari.php">Tampilkan semua</a>/<a href="tambah_potensi.php">Tambah data baru</a></small></p>



			<?php if (empty($semuadata)): ?>
				<div class="alert -alert-danger">Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>

			<?php endif ?>
			<a style="margin-left: 10px;" href="tambah_potensi.php" class="btn btn-primary" role="button">Tambah Data</a>
			<br>
			<table class="table table-bordered table-hover">
				
				<br>
				
				<thead>
					<tr style="background-color: aqua;">
						<th>No</th>
						<th>Kelurahan</th>
						<th>Jenis Potensi</th>
						<th>Nama Potensi</th>
						<th>Alamat</th>
						<th>Nama Pemilik</th>
						<th>Foto</th>
						
						<th colspan='2' class="text-center">Aksi</th>

					</tr>
				</thead>
				<tbody>  		
					<?php foreach ($semuadata as $key => $value): ?>				
						<tr>
							<td width="30px"><?php echo $no++;?></td>
							<td width="150px"><?php echo $value["kelurahan"]; ?></td>
							<td width="150px"><?php echo $value["j_potensi"]; ?></td>
							<td width="150px"><?php echo $value["nm_potensi"]; ?></td>
							<td width="150"><?php echo $value["alt_potensi"]; ?></td>
							<td width="150"><?php echo $value["nm_pemilik"]; ?></td>
							<td width="150"><img src="foto/<?php echo $value['foto'];?>"style="width: 130px; height: 80px;"></td>
							<td width="80px">
								<center>
									<a href="update_potensi.php?id_detpo=<?php echo htmlspecialchars($value['id_detpo']); ?>" class="btn btn-warning" role="button">Update</a>
								</center>
							</td> 

							<td width="80px">
								<center> <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_detpo=<?php echo $value['id_detpo']; ?>" class="btn btn-danger" role="button">Delete</a> </center>
							</td>
						</tr>
						
					</tbody>
					<?php 
				endforeach
				?>    
				
			</table>
		</div>
	</section>
	<script>
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".sidebarBtn");
		sidebarBtn.onclick = function() {
			sidebar.classList.toggle("active");
			if(sidebar.classList.contains("active")){
				sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
			}else
			sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		}
	</script>

</body>
</html>

