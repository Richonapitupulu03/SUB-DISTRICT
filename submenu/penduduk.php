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
        <figure>
          <header class="heading" style="color: blue;">DATA PENDUDUK KECAMATAN PANCUR BATU</header>
          <h1>Data Berdasarkan Agama</h1>
          <table style="color: black;" class="table table-bordered table-hover">
            <br>
            <thead>
              <tr style="background-color: aqua;">
                <th>No</th>
                <th>Kelurahan</th>
                <th>Islam</th>
                <th>Kristen</th>
                <th>Khatolik</th>
                <th>Hindu</th>
                <th>Budha</th>
                <th>Konghuchu</th>


              </tr>
            </thead>
            <tbody>
              <?php 
              $batas = 5;
              $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
              $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

              $previous = $halaman - 1;
              $next = $halaman + 1;

              $data = mysqli_query($kon,"select * from tbl_penduduk order by id_pddk asc");
              $jumlah_data = mysqli_num_rows($data);
              $total_halaman = ceil($jumlah_data / $batas);

              $data_berita = mysqli_query($kon,"select * from tbl_penduduk order by id_pddk asc limit $halaman_awal, $batas");
              $no = $halaman_awal+1;
              while($data = mysqli_fetch_array($data_berita)){
                ?>
                <tr>
                  <td width="15px"><?php echo $no++;?></td>
                  <td width="70px"><?php echo $data["kelurahan"]; ?></td>
                  <td width="70px"><?php echo $data["islam"]; ?></td>
                  <td width="70px"><?php echo $data["kristen"]; ?></td>
                  <td width="70px"><?php echo $data["khatolik"]; ?></td>
                  <td width="70px"><?php echo $data["hindu"]; ?></td>
                  <td width="70px"><?php echo $data["budha"]; ?></td>
                  <td width="50px"><?php echo $data["konghuchu"]; ?></td>
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

          <h1>Data Berdasarkan Pendidikan</h1>
          <table style="color: black;" class="table table-bordered table-hover">
            <br>
            <thead>
              <tr style="background-color: aqua;">
                <th>No</th>
                <th>Kelurahan</th>
                <th>BELUM SEKOLAH</th>
                <th>TK/PAUD</th>
                <th>SD</th>
                <th>SMP</th>
                <th>SMA/SMK</th>
                <th>DIPLOMA</th>
                <th>SARJANA</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $batas = 5;
              $hal = isset($_GET['hal'])?(int)$_GET['hal'] : 1;
              $hal_start = ($hal>1) ? ($hal * $batas) - $batas : 0;  

              $previous = $hal - 1;
              $next = $hal + 1;

              $sekolah = mysqli_query($kon,"select * from tbl_penduduk order by id_pddk asc");
              $jumlah = mysqli_num_rows($sekolah);
              $total_hal = ceil($jumlah / $batas);

              $data_sekolah = mysqli_query($kon,"select * from tbl_penduduk order by id_pddk asc limit $hal_start, $batas");
              $no = $hal_start+1;
              while($pecah = mysqli_fetch_array($data_sekolah)){
                ?>
                <tr>
                  <td width="15px"><?php echo $no++;?></td>
                  <td width="70px"><?php echo $pecah["kelurahan"]; ?></td>
                  <td width="70px"><?php echo $pecah["blm_sekolah"]; ?></td>
                  <td width="70px"><?php echo $pecah["tk_paud"]; ?></td>
                  <td width="70px"><?php echo $pecah["SD"]; ?></td>
                  <td width="70px"><?php echo $pecah["SMP"]; ?></td>
                  <td width="70px"><?php echo $pecah["SMA"]; ?></td>
                  <td width="70px"><?php echo $pecah["diploma"]; ?></td>
                  <td width="70px"><?php echo $pecah["sarjana"]; ?></td>
                </tr>
              </tbody>
            <?php } ?>
          </table>
          <nav>      
            <ul class="pagination justify-content-right">
              <li class="page-item">
                <a class="page-link" <?php if($hal > 1){ echo "href='?hal=$previous'"; } ?> >Previous</a>
              </li>
              <?php 
              for($x=1;$x<=$total_hal;$x++){
                ?> 
                <li class="page-item"><a class="page-link" href="?hal=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
              }
              ?>        
              <li class="page-item">
                <a  class="page-link" <?php if($hal < $total_hal) { echo "href='?hal=$next'"; } ?>>Next</a>
              </li>
            </ul>
          </nav>

          <h1>Data Berdasarkan Perpindahan dan Jenis Kelamin</h1>
          <table style="color: black;" class="table table-bordered table-hover">
            <br>
            <thead>
              <tr style="background-color: aqua;">
                <th>No</th>
                <th>Kelurahan</th>
                <th>Laki-Laki</th>
                <th>Perempuan</th>
                <th>Keluar-Masuk [<small>antar kecamatan</small>]</th>
                <th>Keluar-Masuk [<small>antar kelurahan</small>]</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $batas = 5;
              $hall = isset($_GET['hall'])?(int)$_GET['hall'] : 1;
              $hal_awal = ($hall>1) ? ($hall * $batas) - $batas : 0;  

              $previous = $hall - 1;
              $next = $hall + 1;

              $panggil = mysqli_query($kon,"select * from tbl_penduduk order by id_pddk asc");
              $jum_data = mysqli_num_rows($panggil);
              $tot_hal = ceil($jum_data / $batas);

              $panggill = mysqli_query($kon,"select * from tbl_penduduk order by id_pddk asc limit $hal_awal, $batas");
              $no = $hal_awal+1;
              while($ambil = mysqli_fetch_array($panggill)){
                ?>
                <tr>
                  <td width="15px"><?php echo $no++;?></td>
                  <td width="70px"><?php echo $ambil["kelurahan"]; ?></td>
                  <td width="60px"><?php echo $ambil["laki_laki"]; ?></td>
                  <td width="60px"><?php echo $ambil["perempuan"]; ?></td>
                  <td width="60px"><?php echo $ambil["antar_kec"]; ?></td>
                  <td width="60px"><?php echo $ambil["antar_kel"]; ?></td>

                </tr>
              </tbody>
              <?php
            }
            ?>
          </table>
          <nav>

            <ul class="pagination justify-content-right">
              <li class="page-item">
                <a class="page-link" <?php if($hall > 1){ echo "href='?hall=$previous'"; } ?> >Previous</a>
              </li>
              <?php 
              for($x=1;$x<=$tot_hal;$x++){
                ?> 
                <li class="page-item"><a class="page-link" href="?hall=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
              }
              ?>        
              <li class="page-item">
                <a  class="page-link" <?php if($hall < $tot_hal) { echo "href='?hall=$next'"; } ?>>Next</a>
              </li>
            </ul>
          </nav>
        </figure>
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