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
    <link rel="stylesheet" href="dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  
<?php echo include "menu.php"; ?>
  <section class="home-section">
<?php include "header.php"; ?>

    <div class="home-content">
      <?php

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_pengunjung'])) {
        $id_pengunjung=input($_GET["id_pengunjung"]);

        $sql="select * from tbl_bukutamu where id_pengunjung=$id_pengunjung";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_pengunjung=htmlspecialchars($_POST["id_pengunjung"]);
        $nama=input($_POST["nm_pengunjung"]);
        $pesan=input($_POST["pesan"]);
        $tanggal=input($_POST["tanggal"]);


        //Query update data pada tabel anggota
        $sql="update tbl_bukutamu set
              nm_pengunjung='$nama',  
              pesan='$pesan',
              tanggal='$tanggal'
              where id_pengunjung=$id_pengunjung";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:bukutamu.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h1 style="margin-left: 82px;">Silahkan Update Data Buku Tamu</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="form-group">
            <label style="margin-left: 82px;">Nama:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="nm_pengunjung" class="form-control" value="<?php echo $data['nm_pengunjung']; ?>" required/>

        </div>
        <div class="form-group">
            <label style="margin-left: 82px;">Pesan/Komentar:</label>
            <textarea style="border-color: black; width: 520px; height: 200px; margin-left: 82px;" rows="3" type="text" name="pesan" class="form-control"  value="<?php echo $data['pesan']; ?>" placeholder="Masukan Pesan" required /></textarea>
        </div>
        <div class="form-group">
            <label style="margin-left: 82px;">Tanggal:</label> <br>
            <input style="border-color: black; width: 520px; margin-left: 82px;" type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>" required />
        </div>
        <input type="hidden" name="id_pengunjung" value="<?php echo $data['id_pengunjung']; ?>" />

        <button style="margin-left: 80px;" type="submit" name="submit" class="btn btn-primary">Submit</button>   
    </form>
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

