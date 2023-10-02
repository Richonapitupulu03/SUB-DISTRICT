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
      <center><h1>Data Potensi Daerah</h1></center>
      <br>
      <div class="card-body">
        <form action="pencarian.php" method="get">
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
          <?php 
          $batas = 2;
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
              <td width="150"><img src="foto/<?php echo $data['foto'];?>"style="width: 130px; height: 80px;"></td>
              <td width="80px">
                <center>
                  <a href="update_potensi.php?id_detpo=<?php echo htmlspecialchars($data['id_detpo']); ?>" class="btn btn-warning" role="button">Update</a>
                </center>
              </td> 

              <td width="80px">
                <center> <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_detpo=<?php echo $data['id_detpo']; ?>" class="btn btn-danger" role="button">Delete</a> </center>
              </td>
            </tr>
          </tbody>
        <?php } ?>
      </table>
      <nav>
        <a href="tambah_potensi.php" class="btn btn-primary" role="button">Tambah Data</a>
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

