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
                $kd_pos=input($_POST["kd_pos"]);
                $kelurahan=input($_POST["kelurahan"]);
                $jlh_lingkungan=input($_POST["jlh_lingkungan"]);
                $luas_wilayah=input($_POST["luas_wilayah"]);
                $alamat_kel=input($_POST["alamat_kel"]);

        //Query input menginput data kedalam tabel anggota
                $sql="insert into tbl_kelurahan(id_kelurahan,kd_pos,kelurahan,jlh_lingkungan,luas_wilayah,alamat_kel) values
                ('$id_kelurahan','$kd_pos','$kelurahan','$jlh_lingkungan','$luas_wilayah','$alamat_kel')";

        //Mengeksekusi/menjalankan query diatas
                $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
                if ($hasil) {
                    header("Location:kelurahan.php");
                }
                else {
                    echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

                }

            }
            ?>
            
            <h1 style="margin-left: 82px;">Silahkan Isi Form Kelurahan</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="form-group">
                    <label style="margin-left: 82px;">Kode Pos:</label>
                    <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="kd_pos" class="form-control" placeholder="Masukan Kode Pos" required/>

                </div>
                <div class="form-group">
                    <label style="margin-left: 82px;">Kelurahan:</label>
                    <input  style="border-color: black; width: 520px; margin-left: 82px;"  type="text" name="kelurahan" class="form-control" placeholder="Masukan Kelurahan" required/>

                </div>

                <div class="form-group">
                    <label style="margin-left: 82px;">Jumlah Lingkungan:</label>
                    <input style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="jlh_lingkungan" class="form-control" placeholder="Masukan Jumlah Lingkungan" required />

                </div>

                <div class="form-group">
                    <label style="margin-left: 82px;">Luas Wilayah:</label>
                    <input style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="luas_wilayah" class="form-control" placeholder="Masukan Luas Wilayah" required />

                </div>

                <div class="form-group">
                    <label style="margin-left: 82px;">Alamat:</label>
                    <input style="border-color: black; width: 520px; margin-left: 82px;" type="text" name="alamat_kel" class="form-control" placeholder="Masukan Alamat" required />

                </div>

                <div class="form-group">
                    <label style="margin-left: 82px;">Deskripsi</label>
                    <textarea style="border-color: black; width: 820px; height: 200px; margin-left: 82px;" rows="3" type="text" name="deskripsi" class="form-control"  value="<?php echo $data['deskripsi']; ?>" placeholder="Masukan Deskripsi" required /></textarea>
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
