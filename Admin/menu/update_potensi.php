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
      if (isset($_GET['id_detpo'])) {
        $id_detpo=input($_GET["id_detpo"]);

        $sql="select * from tbl_det_potensi where id_detpo=$id_detpo";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
      }

    //Cek apakah ada kiriman form dari method post
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_detpo=htmlspecialchars($_POST["id_detpo"]);
        
        $foto=$_FILES['foto']['name'];
        $file_tmp=$_FILES['foto']['tmp_name'] ;
        $id_kelurahan=input($_POST["id_kelurahan"]);
        $id_potensi=input($_POST["id_potensi"]);
        $nm_potensi=input($_POST["nm_potensi"]);
        $nm_pemilik=input($_POST["nm_pemilik"]);
        $alt_potensi=input($_POST["alt_potensi"]);
        

        move_uploaded_file($file_tmp, 'foto/'.$foto) ;

        //Query update data pada tabel anggota
        $sql="update tbl_det_potensi set
        id_kelurahan='$id_kelurahan',
        id_potensi='$id_potensi',
        nm_potensi='$nm_potensi',
        nm_pemilik='$nm_pemilik',
        alt_potensi='$alt_potensi',
        foto='$foto'
        where id_detpo=$id_detpo";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
          header("Location:potensidaerah.php");
        }
        else {
          echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

      }

      ?>
      <h1 style="margin-left: 82px;">Silahkan Update Data Potensi Daerah</h1>
      <form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
          <label style="margin-left: 82px;">Kelurahan:</label>
          <select style="border-color: black; width: 420px; margin-left: 82px;" name="id_kelurahan" id="id_kelurahan" class="form-control" value="<?php echo $data['id_kelurahan']; ?>" required>
            <option value="">--pilih kelurahan--</option>
            <?php
            $sql_kelurahan = mysqli_query($kon, "SELECT * FROM tbl_kelurahan");
            while($data_kelurahan = mysqli_fetch_array($sql_kelurahan)) {
              echo '<option value="' .$data_kelurahan['id_kelurahan']. '">' .$data_kelurahan['kelurahan']. '</option>';
            }
            ?>
          </select>

        </div>

        <div class="form-group">
          <label style="margin-left: 82px;">Jenis Potensi:</label>
          <select style="border-color: black; width: 420px; margin-left: 82px;" name="id_potensi" id="id_potensi" class="form-control" value="<?php echo $data['id_potensi']; ?>" required>
            <option value="">--jenis Potensi--</option>
            <?php
            $sql_kelurahan = mysqli_query($kon, "SELECT * FROM tbl_potensi");
            while($datapotensi = mysqli_fetch_array($sql_kelurahan)) {
              echo '<option value="' .$datapotensi['id_potensi']. '">' .$datapotensi['j_potensi']. '</option>';
            }
            ?>
          </select>

        </div>

        <div class="form-group">
          <label style="margin-left: 82px;">Nama Potensi:</label>
          <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="nm_potensi" class="form-control" value="<?php echo $data['nm_potensi']; ?>" required/>

        </div>
        <div class="form-group">
          <label style="margin-left: 82px;">Nama Pemilik:</label>
          <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="nm_pemilik" class="form-control" value="<?php echo $data['nm_pemilik']; ?>" required/>

        </div>

        <div class="form-group">
          <label style="margin-left: 82px;">Alamat:</label>
          <input style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="alt_potensi" class="form-control" value="<?php echo $data['alt_potensi']; ?>" required />

        </div>
        <div class="form-group">
          <label style="margin-left: 82px;">Gambar:</label>
          <input  style="border-color: black; width: 520px; margin-left: 82px;" value="<?php echo $data['foto']; ?>" type="file" name="foto"/>

        </div>
        <input type="hidden" name="id_detpo" value="<?php echo $data['id_detpo']; ?>" />

        <button style="margin-left: 82px;" type="submit" name="submit" class="btn btn-primary">Submit</button>
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

