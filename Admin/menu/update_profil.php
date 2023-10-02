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
    if (isset($_GET['id_admin'])) {
        $id_admin=input($_GET["id_admin"]);

        $sql="select * from tbl_admin where id_admin=$id_admin";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_admin=htmlspecialchars($_POST["id_admin"]);
        $email=input($_POST["email"]);
        $nama=input($_POST["nm_admin"]);
        $username=input($_POST["username"]);
        $password=input($_POST["password"]);

        //Query update data pada tabel anggota
        $sql="update tbl_admin set
      	nm_admin='$nama',  
      	username='$username',
      	password='$password'
      	where id_admin=$id_admin";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:profil.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h1 style="margin-left: 82px;">Silahkan Update Data Admin</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    	<div class="form-group">
            <label style="margin-left: 82px;">Email:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" required/>

        </div>
        <div class="form-group">
            <label style="margin-left: 82px;">Nama:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="nm_admin" class="form-control" value="<?php echo $data['nm_admin']; ?>" required/>

        </div>

        <div class="form-group">
            <label style="margin-left: 82px;">Username:</label>
            <input style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required />

        </div>

        <div class="form-group">
            <label style="margin-left: 82px;">Password:</label>
            <input style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>" required />

        </div>
        <input type="hidden" name="id_admin" value="<?php echo $data['id_admin']; ?>" />

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

