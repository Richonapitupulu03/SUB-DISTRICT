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
          <header class="heading" style="color: blue;">POTENSI DAERAH KECAMATAN PANCUR BATU</header>
          <p style="color: black; text-align: justify;">
            Potensi Daerah merupakan segala kemampuan atau nilai yang ada pada suatu
            daerah yang dapat dikembangkan. Contoh potensi daerah seperti wisata, pertanian,
            peternakan, perikanan dan kelautan, UMKM (usaha mikro kecil menengah). Pada
            suatu daerah potensi dapat jadikan sebagai nilai terhadap perkembangan suatu daerah
          salah satunya pada wilayah Kecamatan Pancur Batu.</p>
          <p style="color: black; text-align: justify;">Berikut adalah daftar Potensi Daerah di PANCUR BATU:</p>

          <table style="color: black;" class="table table-bordered table-hover">
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
              </tr>
            </thead>
            <tbody>
              <?php 
              $batas = 10;
              $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
              $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

              $previous = $halaman - 1;
              $next = $halaman + 1;

              $data= mysqli_query($kon,"SELECT * FROM tbl_det_potensi 
                INNER JOIN tbl_kelurahan ON tbl_det_potensi.id_kelurahan = tbl_kelurahan.id_kelurahan 
                INNER JOIN tbl_potensi ON tbl_det_potensi.id_potensi = tbl_potensi.id_potensi ORDER BY id_detpo DESC");
              $jumlah_data = mysqli_num_rows($data);
              $total_halaman = ceil($jumlah_data / $batas);

              $kelurahan= mysqli_query($kon,"SELECT * FROM tbl_det_potensi 
                INNER JOIN tbl_kelurahan ON tbl_det_potensi.id_kelurahan = tbl_kelurahan.id_kelurahan 
                INNER JOIN tbl_potensi ON tbl_det_potensi.id_potensi = tbl_potensi.id_potensi ORDER BY id_detpo DESC limit $halaman_awal, $batas");
              $no = $halaman_awal+1;
              while ($data=mysqli_fetch_array($kelurahan)){
                ?>
                <tr>
                  <td width="30px"><?php echo $no++;?></td>
                  <td width="150px"><?php echo $data["kelurahan"]; ?></td>
                  <td width="150px"><?php echo $data["j_potensi"]; ?></td>
                  <td width="150px"><?php echo $data["nm_potensi"]; ?></td>
                  <td width="150"><?php echo $data["alt_potensi"]; ?></td>
                  <td width="150"><?php echo $data["nm_pemilik"]; ?></td>
                  <td width="150"><img src="../Admin/menu/foto/<?php echo $data['foto'];?>"style="width: 130px; height: 80px;"></td>
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