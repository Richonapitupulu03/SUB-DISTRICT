<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<!--
Template Name: Academic Education V2
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
	<title>Potensi Daerah Kecamatan Pancur Batu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">



	<div class="wrapper row0">
		<div id="topbar" class="clear"> 

			<nav>
				<ul>
					<li><a href="../index.php">Beranda</a></li>
					<li><a href="kontak.php">Kontak</a></li>
					<li><a href="peta.php">Peta</a></li>
					<li><a href="login.php">Admin Login</a></li>
				</ul>
			</nav>
			<!-- ################################################################################################ --> 
		</div>
	</div>
	<!-- ################################################################################################ --> 

	<div class="wrapper row1">
		<header id="header" class="clear"> 
			<!-- ################################################################################################ -->
			<div id="logo" class="fl_left">
				<h1><a href="../index.php">Sistem Informasi Potensi Daerah</a></h1>
				<p>Kecamatan Pancur Batu</p>
			</div>
			<div class="fl_right">
				<form class="clear" method="post" action="#">
					<fieldset>
						<legend>Search:</legend>
						<input type="text" value="" placeholder="Apa yang anda cari?">
						<button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
					</fieldset>
				</form>
			</div>
			<!-- ################################################################################################ --> 
		</header>
	</div>
	<!-- ################################################################################################ --> 
	<!-- ################################################################################################ --> 
	<!-- ################################################################################################ -->
	<div class="wrapper row2">
		<div class="rounded">
			<nav id="mainav" class="clear"> 
				<!-- ################################################################################################ -->
				<ul class="clear">
					<li class="active"><a href="../index.php">Beranda</a></li>
					<li><a class="drop" href="#">Profil</a>
						<ul>
							<li><a href="sejarah.php">Sejarah</a></li>
							<li><a href="visi_misi.php">Visi & Misi</a></li>
							<li><a href="pimpinan.php">Pemimpin</a></li>
							<li><a href="pemerintahan.php">Pemerintahan</a></li>
							<li><a href="organisasi.php">Struktur Organisasi</a></li>

						</ul>
					</li>
					<li><a href="kelurahan.php">Kelurahan</a></li>
        <!-- <li><a class="drop" href="#">Dropdown</a>
          <ul>
            <li><a href="#">Level 2</a></li>
            <li><a class="drop" href="#">Level 2 + Drop</a>
              <ul>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
              </ul>
            </li>
          </ul>
      </li> -->
      <li><a href="potensi_daerah.php">Potensi Daerah</a></li>
      <li><a href="pelayanan.php">Layanan</a></li>
  </ul>
  <!-- ################################################################################################ --> 
</nav>
</div>
</div>

<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->

<div class="wrapper row3">
	<div class="rounded">
		<main class="container clear"> 
			<!-- main body --> 
			<!-- ################################################################################################ -->
			<div id="gallery">
				<p style="color: black; text-align: justify;">Berikut adalah data kepala camat dari masa ke masa:</p>
				<?php
    //Cek apakah ada nilai dari method GET dengan nama id_anggota
				if (isset($_GET['id_camat'])) {
					$id_anggota=htmlspecialchars($_GET["id_camat"]);

					$sql="delete from tbl_camat where id_camat = '$_GET[id_camat]'"; 
					$hasil=mysqli_query($kon,$sql);
        //Kondisi apakah berhasil atau tidak
					if ($hasil) {
						header("Location:camat.php");

					}
					else {
						echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

					}
				}
				?>
				<table style="color: black;" class="table table-bordered table-hover">
					<br>
					<thead>
						<tr>
							<th>No</th>
							<th>NIP</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Masa Jabatan</th>
							<th>Jabatan</th>							
						</tr>
					</thead>
					<tbody>
						<?php 
						$batas = 10;
						$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
						$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

						$previous = $halaman - 1;
						$next = $halaman + 1;

						$data = mysqli_query($kon,"select * from tbl_camat");
						$jumlah_data = mysqli_num_rows($data);
						$total_halaman = ceil($jumlah_data / $batas);

						$data_berita = mysqli_query($kon,"select * from tbl_camat order by id_camat desc limit $halaman_awal, $batas");
						$nomor = $halaman_awal+1;
						while($data = mysqli_fetch_array($data_berita)){
							?>
							<tr>
								<td width="30px"><?php echo $nomor++;?></td>
								<td width="150px"><?php echo $data["nip_camat"]; ?></td>
								<td width="180px"><?php echo $data["nm_camat"]; ?></td>
								<td width="100px"><?php echo $data["jk_camat"]; ?></td>
								<td width="100px"><?php echo $data["mj_camat"]; ?></td>
								<td width="100px"><?php echo $data["jabatan"]; ?></td>								
							</tr>
						</tbody>
						<?php
					}
					?>
				</table>
				<nav> 
					<ul class="pagination justify-content-right">
						<li class="page-item">
							<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?> >Previous</a>
						</li>
						<?php 
						for($x=1;$x<=$total_halaman;$x++){
							?> 
							<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
							<?php
						}
						?>        
						<li class="page-item">
							<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</main>
</div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<?php include "../menu/footer.php"; ?>
<!-- JAVASCRIPTS --> 
<script src="../layout/scripts/jquery.min.js"></script> 
<script src="../layout/scripts/jquery.fitvids.min.js"></script> 
<script src="../layout/scripts/jquery.mobilemenu.js"></script> 
<script src="../layout/scripts/tabslet/jquery.tabslet.min.js"></script>
</body>
</html>