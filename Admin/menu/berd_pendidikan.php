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
    <center><h1>Data Penduduk</h1></center>
    <br>
    <a href="penduduk.php"><button style="margin-left: 82px; border-radius: 10px;"> 
    <h5>Berdasarkan Agama</h5></button></a>

    <a href="berd_pendidikan.php"><button style="margin-left: 82px; border-radius: 10px;" class="btn-danger"> 
    <h5>Berdasarkan Pendidikan</h5></button></a>

    <a href="berd_jk.php"><button style="margin-left: 82px; border-radius: 10px;"> 
    <h5>Berdasarkan Jenis Kelamin</h5></button></a>

    <a href="berd_perpindahan.php"><button style="margin-left: 82px; border-radius: 10px;"> 
    <h5>Berdasarkan Perpindahan</h5></button></a>
    <br>

    <?php
    //Cek apakah ada nilai dari method GET dengan nama id_anggota
    if (isset($_GET['id_pddk'])) {
        $id_anggota=htmlspecialchars($_GET["id_pddk"]);

        $sql="delete from tbl_penduduk where id_pddk = '$_GET[id_pddk]'";

        
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:berd_pendidikan.php");

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
            <th>BELUM SEKOLAH</th>
            <th>TK/PAUD</th>
            <th>SD</th>
            <th>SMP</th>
            <th>SMA/SMK</th>
            <th>DIPLOMA</th>
            <th>SARJANA</th>
            <th colspan='2' class="text-center">Aksi</th>

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
                <td width="150px"><?php echo $data["kelurahan"]; ?></td>
                <td width="80px"><?php echo $data["blm_sekolah"]; ?></td>
                <td width="80px"><?php echo $data["tk_paud"]; ?></td>
                <td width="80px"><?php echo $data["SD"]; ?></td>
                <td width="80px"><?php echo $data["SMP"]; ?></td>
                <td width="80px"><?php echo $data["SMA"]; ?></td>
                <td width="80px"><?php echo $data["diploma"]; ?></td>
                <td width="80px"><?php echo $data["sarjana"]; ?></td>
                <td width="80px">
                    <center> <a href="update_penduduk.php?id_pddk=<?php echo htmlspecialchars($data['id_pddk']); ?>" class="btn btn-warning" role="button">Update</a></td> </center>
                <td width="80px">
                    <center> <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_pddk=<?php echo $data['id_pddk']; ?>" class="btn btn-danger" role="button">Delete</a> </center>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <nav>
    <a href="tambah_profil.php" class="btn btn-primary" role="button">Tambah Data</a>
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

