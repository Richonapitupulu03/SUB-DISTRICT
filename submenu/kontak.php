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
          <header class="heading" style="color: blue;">KONTAK KAMI KECAMATAN PANCUR BATU</header>
          <p style="color: black; text-align: justify;">

          Kami Sangat Berupaya Keras Untuk Berhubungan Dengan Masyarakat Pancur Batu, Kami Berharap Dapat Bekerja Sama Dengan Masyarkat Untuk Membangun dan Memajukan Kecamatan Pancur Batu.</p>

          <center><p style="color: black;">Hubungi Kami Dibawah ini :</p>

            <p class="nospace btmspace-10">Kunjungi &amp; ikuti Media Sosial Kami</p>
            <ul class="faico clear">
              <li><a class="faicon-twitter" href="https://youtube.com/@kabdeliserdang" style="color: red;"><i class="fa fa-youtube"></i></a></li>
              <li><a class="faicon-twitter" href="mailto:kecamatanpancurbatu@gmail.com?Subject=Mau%20tanya" style="color: red;"><i class="fa fa-envelope"></i></a></li>
              <li><a class="faicon-facebook" href="https://www.facebook.com/pemerintah.pancurbatu.7?mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a></li>
              <li><a class="faicon-flickr" href="#"><i class="fa fa-phone"></i></a></li>
              <li><a class="faicon-rss" href="https://instagram.com/pemerintahpancurbatu?igshid=YmMyMTA2M2Y="><i class="fa fa-instagram"></i></a></li>
            </ul></center>

            <p style="color: black;">Formulir Saran</p>
            <?php

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
            function input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
    //Cek apakah ada kiriman form dari method post
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

              $nm_pengunjung=input($_POST["nm_pengunjung"]);
              $pesan=input($_POST["pesan"]);
              $tanggal=input($_POST["tanggal"]);



        //Query input menginput data kedalam tabel anggota
              $sql="insert into tbl_bukutamu (nm_pengunjung,pesan,tanggal) values
              ('$nm_pengunjung','$pesan','$tanggal')";

        //Mengeksekusi/menjalankan query diatas
              $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
              if ($hasil) {
                echo "<div class='alert alert-success'>Pesan anda berhasil di simpan!</div>";
              }
              else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

              }

            }
            ?>

            <form style="background-color: gray; border-radius: 12px; color: black;" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">


              <div class="form-group">
                <label style="margin-left: 12px; color: black;">Nama:</label>
                <input  style="border-color: black; width: 320px; height: 40px; margin-left: 12px;"  type="text" name="nm_pengunjung" class="form-control" placeholder="Masukan Nama" required/>

              </div><br>

              <div class="form-group">
                <label style="margin-left: 12px; color: black;">Pesan/Komentar</label>
                <textarea style="border-color: black; width: 320px; height: 130px; margin-left: 12px;" rows="6" name="pesan" placeholder="Masukan isi" > </textarea>

              </div><br>

              <div class="form-group">
                <label style="margin-left: 12px; color: black;">Tanggal</label>
                <input style="border-color: black; width: 120px; height: 40px; margin-left: 12px;" type="date" name="tanggal" class="form-control" required />

              </div><br>

              <button style="margin-left: 12px; margin-bottom: 12px; color: black; background-color: gold; width: 70px; height: 40px;" type="submit" name="submit" class="btn btn-primary">Kirim</button>

            </form>

          </div>
          <br>
          <p style="color: black;">Alamat Kami</p>
          <div class="one_third first">
            <figure class="center">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.4829153472333!2d98.59289531573977!3d3.4748789451502073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031246c60a850c3%3A0x4c98e9091406ad15!2sKantor%20Camat%20Pancur%20Batu!5e0!3m2!1sid!2sid!4v1679127958864!5m2!1sid!2sid" width="950" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <figcaption><a href="https://goo.gl/maps/tDuQdPBDKeWmUjYv8">Lihat di google maps &raquo;</a></figcaption>

            </figure>
          </div>
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