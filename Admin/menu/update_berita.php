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
    if (isset($_GET['id_berita'])) {
        $id_berita=input($_GET["id_berita"]);

        $sql="select * from tbl_berita where id_berita=$id_berita";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_berita=htmlspecialchars($_POST["id_berita"]);
        $foto=input($_POST["foto"]);
        $judul=input($_POST["judul"]);
        $content=input($_POST["content"]);
        $tanggal=input($_POST["tanggal"]);


        

        //Query update data pada tabel anggota
        $sql="update tbl_berita set
              foto='$foto',  
              judul='$judul',
              content='$content',
              tanggal='$tanggal'
              where id=$id";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:berita.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    
    <h1 style="margin-left: 82px;">Silahkan Update Data Admin</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="form-group">
            <label style="margin-left: 82px;">Gambar:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="file" name="foto">
        </div>

        <div class="form-group">
            <label style="margin-left: 82px;">Judul:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" placeholder="Masukan judul" required/>

        </div>

        <div class="form-group">
            <label style="margin-left: 82px;">Isi/Content:</label> <br>
            <textarea style="border-color: black; width: 720px; height: 300px; margin-left: 82px;" rows="6" name="content"></textarea>
        </div>


        <div class="form-group">
            <label style="margin-left: 82px;">Tanggal:</label> <br>
            <input style="border-color: black; width: 520px; margin-left: 82px;" type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>" placeholder="Masukan Tanggal" required />
        </div>

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

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

