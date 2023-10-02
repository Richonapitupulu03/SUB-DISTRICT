<?php include "koneksi.php"; ?>
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear">
      <!-- main body -->
      <!-- ################################################################################################ -->
      <div class="group btmspace-30">
        <!-- Left Column -->
        <div class="one_quarter first">
          <!-- ################################################################################################ -->
          <ul class="nospace">
            <li class="btmspace-15"><a href="#"><em class="heading">KEGIATAN APEL</em> <img class="borderedbox" src="images/pancurbatu/apel.jpg"></a></li>
            <li class="btmspace-15"><a href="#"><em class="heading">VAKSINASI COVID-19</em> <img class="borderedbox" src="images/pancurbatu/vaksin.jpg" alt=""></a></li>
            <li class="btmspace-15"><a href="#"><em class="heading">LINTAS SEKTORAL</em> <img class="borderedbox" src="images/pancurbatu/lintas_sektoral.jpg" alt=""></a></li>
            <li><a href="#"><em class="heading">OLAHRAGA JASMANI</em> <img class="borderedbox" src="images/pancurbatu/senam.jpg" alt=""></a></li>
          </ul>
          <!-- ################################################################################################ -->
        </div>
        <!-- / Left Column -->
        <!-- Middle Column -->
        <div class="one_half">
          <!-- ################################################################################################ -->
          <h2>Berita Terbaru &amp; Terupdate</h2>
          <?php
          $batas = 4;
          $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
          $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

          $previous = $halaman - 1;
          $next = $halaman + 1;

          $data = mysqli_query($kon, "select * from tbl_berita");
          $jumlah_data = mysqli_num_rows($data);
          $total_halaman = ceil($jumlah_data / $batas);

          $data_berita = mysqli_query($kon, "select * from tbl_berita order by id_berita desc limit $halaman_awal, $batas");
          $nomor = $halaman_awal + 1;
          while ($data = mysqli_fetch_array($data_berita)) {

            // Tampilkan hanya sebagian isi berita
            $isi_berita = htmlentities(strip_tags($data['content']));
            // 40 menampilkan jumlah karakter
            $isi = substr($isi_berita, 0, 130);
            $isi = substr($isi_berita, 0, strrpos($isi, " "));
          ?>
            <ul class="nospace listing">
              <li class="clear">
                <div class="imgl borderedbox" style=" width: 150px; height:150px; border-color: white;">
                  <img src="Admin/menu/foto/<?php echo $data['foto']; ?>">
                </div>

                <p class="nospace btmspace-15" style="color: #55ABDA;"><?php echo $data['judul']; ?></p>

                <small>
                  <p><?php echo date('l,d-m-Y', strtotime($data["tanggal"])); ?></p>
                </small>


                <p><?php echo $isi = substr($isi_berita, 0, 120);
                    $isi = substr($isi_berita, 0, strrpos($isi, " ")); ?>
                <p class="right"><?php echo "<a href='submenu/lengkap.php?id_berita=$data[id_berita]'>Selengkapnya &raquo;</a></p>";
                                } ?></p>
              </li>

            </ul>
            <nav>

              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" <?php if ($halaman > 1) {
                                          echo "href='?halaman=$previous'";
                                        } ?>>Previous</a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                  <a class="page-link" <?php if ($halaman < $total_halaman) {
                                          echo "href='?halaman=$next'";
                                        } ?>>Next</a>
                </li>
              </ul>
            </nav>
        </div>
        <!-- / Middle Column -->
        <!-- Right Column -->
        <div class="one_quarter sidebar">
          <!-- ################################################################################################ -->
          <div class="sdb_holder">
            <h6 style="font-size: 102%;">PANCUR BATU VIDEO</h6>
            <div class="mediacontainer"><video src="images/pancurbatu/Video_pancurbatu.mp4" controls style="width: 100%; width: 105%;"></video>
              <p><a href="https://youtube.com/@kabdeliserdang">Kunjungi Media Sosial Kami</a></p>
            </div>
          </div>
          <div class="sdb_holder">
            <h6></h6>
            <ul class="nospace quickinfo">
              <li class="clear"><a href="https://indonesia.go.id/"><img src="images/pancurbatu/logo_ri.jpg" alt=""> PEMERINTAHAN REPUBLIK INDONESIA</a></li>
              <li class="clear"><a href="https://sumutprov.go.id/"><img src="images/pancurbatu/logo_pemprov.jpg" alt=""> PEMPROV SUMUT</a></li>
              <li class="clear"><a href="https://id.wikipedia.org/wiki/Kota_Medan"><img src="images/pancurbatu/logodeliserdang.png" alt=""> PEMKAB &nbsp; DELISERDANG</a></li>
            </ul>
          </div>
          <!-- ################################################################################################ -->
        </div>
        <!-- / Right Column -->
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <div id="twitter" class="group btmspace-30">
        <div class="one_quarter first center"><a href="#"><i class="fa fa-phone fa-3x"></i><br>
            Kami siap melayani anda</a></div>
        <div class="three_quarter bold">
          <p>Hubungi kami di nomor telepon kami atau dapat melalui media sosial kami yang ada di bagian bawah atau di menu kontak. kami siap melayani masyarakat kami demi kemajuan Pancur Batu <a href="https://instagram.com/pemerintahpancurbatu?igshid=YmMyMTA2M2Y=">@pancurbatu</a> Jam Layanan 08.00 - 14:00 WIB</p>
        </div>
      </div>

      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>