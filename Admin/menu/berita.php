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
  	<center><h1>Data Berita</h1></center>
	<?php

    //Cek apakah ada nilai dari method GET dengan nama id_berita
    if (isset($_GET['id_berita'])) {
        $id_berita=htmlspecialchars($_GET["id_berita"]);

        $sql="delete from tbl_berita where id_berita = '$_GET[id_berita]'";

        
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:berita.php");

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
            <th width="50px"><center>No</th>
            <th><center>Gambar</th>
            <th><center>Judul</th>
            <th><center>Isi</th>
            <th><center>Tanggal</th>
            <th colspan='2'><center>Aksi</center></th>

        </tr>
        </thead>

            <tbody>

        <?php 
        $batas = 1;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
        $previous = $halaman - 1;
        $next = $halaman + 1;
        
        $data = mysqli_query($kon,"select * from tbl_berita");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);
 
        $data_berita = mysqli_query($kon,"select * from tbl_berita order by id_berita desc limit $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        while($data = mysqli_fetch_array($data_berita)){
          ?>
    
            <tr>
                <td width="50px"><?php echo $nomor++;?></td>
                <td><img src="foto/<?php echo $data['foto'];?>"style="width: 100px;"></td>
                <td><?php echo $data["judul"];?></td>
                <td><?php echo $data["content"];?></td>
                <td><?php echo date('d-m-Y', strtotime($data["tanggal"]));?></td> 
                <td>
                   <center> <a href="update_berita.php?id_berita=<?php echo htmlspecialchars($data['id_berita']); ?>" class="btn btn-warning" role="button">Update</a></td> </center>
                <td>
                   <center> <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_berita=<?php echo $data['id_berita']; ?>" class="btn btn-danger" role="button">Delete</a> </center>
                </td>
            </tr>     
            <?php } ?>
            </tbody>
    </table>
    <nav> 
      <a href="tambah_berita.php" class="btn btn-primary" role="button">Tambah Data</a>
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

