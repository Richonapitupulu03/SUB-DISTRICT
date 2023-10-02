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
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email=input($_POST["email"]);
        $nama=input($_POST["nm_admin"]);
        $username=input($_POST["username"]);
        $password=input($_POST["password"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into tbl_admin (id_admin,nm_admin,username,password) values
        ('$id_admin','$nama','$username','$password')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:profil.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>

<h1 style="margin-left: 82px;">Silahkan Isi Form Admin</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
      <div class="form-group">
            <label style="margin-left: 82px;">Email:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="email" class="form-control" placeholder="ex: admin123@gmail.com" required/>

        </div>
        <div class="form-group">
            <label style="margin-left: 82px;">Nama:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="nm_admin" class="form-control" placeholder="Masukan Nama" required/>

        </div>

        <div class="form-group">
            <label style="margin-left: 82px;">Username:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="username" class="form-control" placeholder="Masukan Username" required/>

        </div>

        <div class="form-group">
            <label style="margin-left: 82px;">Password</label><br>
            <input style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="password" class="form-control" placeholder="Masukan Password" required />

        </div>

        <button style="margin-left: 82px;" type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
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
