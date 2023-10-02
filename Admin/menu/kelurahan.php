<?php 
include "koneksi.php";
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

      <center><h1>Data Kelurahan</h1></center>

      <?php

	    //Cek apakah ada nilai dari method GET dengan nama id_anggota
      if (isset($_GET['id_kelurahan'])) {
       $id_anggota=htmlspecialchars($_GET["id_kelurahan"]);

       $sql="delete from tbl_kelurahan where id_kelurahan = '$_GET[id_kelurahan]'";


       $hasil=mysqli_query($kon,$sql);

	        //Kondisi apakah berhasil atau tidak
       if ($hasil) {
         header("Location:kelurahan.php");

       }
       else {
         echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

       }
     }
     ?>

     <table class="table table-bordered table-hover">
      <br>
      <thead>
        <tr style="background-color: aqua;">
          <th>No</th>
          <th>Kode Pos</th>
          <th>Kelurahan</th>
          <th>Jumlah Lingkungan</th>
          <th>Luas Wilayah</th>
          <th>Alamat</th>
          <th>Deskripsi</th>

          <th colspan='2'><center>Aksi</center></th>

        </tr>
      </thead>
      <tbody>
        <?php 
        $batas = 3;
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

          // Tampilkan hanya sebagian isi berita
          $isi_berita = htmlentities(strip_tags($data['deskripsi']));
              // 40 menampilkan jumlah karakter
          $isi = substr($isi_berita,0,130);
          $isi = substr($isi_berita,0,strrpos($isi," "));
          ?>
          <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $data["kd_pos"]; ?></td>
            <td><?php echo $data["kelurahan"]; ?></td>
            <td><?php echo $data["jlh_lingkungan"]; ?></td>
            <td><?php echo $data["luas_wilayah"]; ?></td>
            <td><?php echo $data["alamat_kel"]; ?></td>
            <td><?php echo $isi = substr($isi_berita,0,150);
            $isi = substr($isi_berita,0,strrpos($isi," "));?><?php echo "<a href='desk_kel.php?id_kelurahan=$data[id_kelurahan]'>Selengkapnya &raquo;</a></p>";?></td>
            

            <td>
              <center> <a href="update_kelurahan.php?id_kelurahan=<?php echo htmlspecialchars($data['id_kelurahan']); ?>" class="btn btn-warning" role="button">Update</a></td> </center>
              <td>
                <center> <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_kelurahan=<?php echo $data['id_kelurahan']; ?>" class="btn btn-danger" role="button">Delete</a> </center>
              </td>
            </tr>
          </tbody>
        <?php } ?>
      </table>
      <nav>
        <p><a href="tambah_kelurahan.php" class="btn btn-primary" role="button">Tambah Data</a>

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

