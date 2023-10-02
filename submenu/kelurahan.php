<?php 
session_start();
include "koneksi.php"; ?>
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
        <figure>
          <header class="heading" style="color: blue;">DAFTAR KELURAHAN/DESA KECAMATAN PANCUR BATU</header>
          <p style="color: black; text-align: justify;">Pancur Batu adalah sebuah kecamatan di kabupaten Deli Serdang, Sumatera Utara, Indonesia. Pancur batu merupakan jalan utama menuju ke Berastagi, karo. Di kecamatan ini juga terdapat beberapa pusat sektor ekonomi, salah satunya adalah pasar Pancur Batu. Kecamatan ini memiliki beberapa kelurahan/desa.</p>
          <p style="color: black; text-align: justify;">Berikut adalah daftar kecamatan di PANCUR BATU:</p>
          <small style="color: red;">*klik nama kelurahan untuk melihat lebih detail</small>
          <table style="color: black;" class="table table-bordered table-hover">
            <br>
            <thead>
              <tr style="background-color: aqua;">
                <th>No</th>
                <th>Kode Pos</th>
                <th>Kelurahan</th>
                <th>Jumlah Lingkungan</th>
                <th>Luas Wilayah</th>
                <th>Alamat</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $batas = 10;
              $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
              $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

              $previous = $halaman - 1;
              $next = $halaman + 1;

              $data = mysqli_query($kon,"select * from tbl_kelurahan");
              $jumlah_data = mysqli_num_rows($data);
              $total_halaman = ceil($jumlah_data / $batas);

              $data_berita = mysqli_query($kon,"select * from tbl_kelurahan order by id_kelurahan asc limit $halaman_awal, $batas");
              $no = $halaman_awal+1;
              while($data = mysqli_fetch_array($data_berita)){
                ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data["kd_pos"]; ?></td>
                  <td><a href="detail_kelurahan.php?id_kelurahan=<?php echo $data['id_kelurahan'];?>"><?php echo $data["kelurahan"]; ?></a></td>
                  
                  <td><?php echo $data["jlh_lingkungan"]; ?></td>
                  <td><?php echo $data["luas_wilayah"]; ?></td>
                  <td><?php echo $data["alamat_kel"]; ?></td>
                </tr>
              </tbody>
            <?php } ?>
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
        </figure>
        <p style="color: black;">Lihat Data Penduduk Pada Kecamatan Pancur Batu Berdasarkan Beberapa Jenis <a href="penduduk.php"> [lihat] </a></p>
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