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

        $nip_camat=input($_POST["nip_camat"]);
        $nama=input($_POST["nm_camat"]);
        $jk_camat=input($_POST["jk_camat"]);
        $mj_camat=input($_POST["mj_camat"]);
        $jabatan=input($_POST["jabatan"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into tbl_camat (id_camat,nip_camat,nm_camat,jk_camat,mj_camat,jabatan) values
        ('$id_camat','$nip_camat','$nama','$jk_camat','$mj_camat','$jabatan')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:camat.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>

<h1 style="margin-left: 82px;">Silahkan Isi Form Camat</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label style="margin-left: 82px;">Nomor Induk Pegawai:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="nip_camat" class="form-control" placeholder="Masukan NIP" required/>

        </div>
        <div class="form-group">
            <label style="margin-left: 82px;">Nama Camat:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="nm_camat" class="form-control" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label style="margin-left: 82px;">Jenis Kelamin:</label>
            <select style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="jk_camat" class="form-control"required>
                <option>--pilih jenis kelamin--</option>
                <option value="Laki-laki">Laki Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label style="margin-left: 82px;">Masa Jabatan:</label>
            <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="mj_camat" class="form-control" placeholder="Masukan Masa Jabatan" required/>

        </div>

        <div class="form-group">
            <label style="margin-left: 82px;">Jabatan</label><br>
            <input style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="jabatan" class="form-control" placeholder="Masukan Jabatan" required />

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
