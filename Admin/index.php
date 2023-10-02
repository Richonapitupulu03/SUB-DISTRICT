<?php
include "menu/koneksi.php";
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
<head>
  <title>Potensi Daerah Pancur Batu</title>
  <script type="text/javascript" src="chartjs/Chart.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <?php include "menu/side.php"; ?>
  <section class="home-section">
    <?php include "menu/header.php"; ?>
    <!-- Angka  -->
    <?php
    $query1= $kon->query("SELECT * FROM tbl_kelurahan");
    $query2= $kon->query("SELECT * FROM tbl_bukutamu");
    $query3= $kon->query("SELECT * FROM tbl_potensi");
    $query4= $kon->query("SELECT * FROM tbl_admin");

    $jml_geografis = mysqli_num_rows($query1);
    $jml_bukutamu = mysqli_num_rows($query2);
    $jml_umkm = mysqli_num_rows($query3);
    $jml_admin = mysqli_num_rows($query4);
    ?>
    <div class="home-content">
      <div class="overview-boxes">        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Kelurahan</div>
            <div class="number"><?php echo number_format($jml_geografis,0,",",".");?></div>
            <div class="indicator">
              <span class="text">Data Kelurahan</span>
            </div>
          </div>
          <i class='bx bx-coin-stack cart two' style="margin-top: 10px;"></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Potensi</div>
            <div class="number"><?php echo number_format($jml_umkm,0,",",".");?></div>
            <div class="indicator">  
              <span class="text">Data Potensi daerah </span>
            </div>
          </div>
          <i class='bx bx-map-pin cart three' style="margin-top: 10px;"></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Buku Tamu</div>
            <div class="number"><?php echo number_format($jml_bukutamu,0,",",".");?></div>
            <div class="indicator">  
              <span class="text">Data Komentar</span>
            </div>
          </div>
          <i class='bx bx-line-chart cart' style="margin-top: 10px; "></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">User</div>
            <div class="number"><?php echo number_format($jml_admin,0,",",".");?></div>
            <div class="indicator">
              <span class="text">Data pengguna</span>
            </div>
          </div>
          <i class='bx bx-user cart four' style="margin-top: 10px; "></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <!--Bar Chart-->
          <div class="title">Data Potensi</div>
          <div style="width: 800px;">
            <canvas id="myChart"></canvas>
          </div>
          <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ["Wisata", "Pertanian", "Peternakan", "Perkebunan", "Perikanan", "UMKM"],
                datasets: [{
                  label: '',
                  data: [
                  <?php 
                  $jumlah_pandauhilir = mysqli_query($kon,"select * from tbl_det_potensi where id_potensi='1'");
                  echo mysqli_num_rows($jumlah_pandauhilir);
                  ?>, 
                  <?php 
                  $jumlah_pahlawan = mysqli_query($kon,"select * from tbl_det_potensi where id_potensi='2'");
                  echo mysqli_num_rows($jumlah_pahlawan);
                  ?>, 
                  <?php 
                  $jumlah_seikerahilirI = mysqli_query($kon,"select * from tbl_det_potensi where id_potensi='3'");
                  echo mysqli_num_rows($jumlah_seikerahilirI);
                  ?>, 
                  <?php 
                  $jumlah_seikerahilirII = mysqli_query($kon,"select * from tbl_det_potensi where id_potensi='4'");
                  echo mysqli_num_rows($jumlah_seikerahilirII);
                  ?>, 
                  <?php 
                  $jumlah_seikuruhulu = mysqli_query($kon,"select * from tbl_det_potensi where id_potensi='5'");
                  echo mysqli_num_rows($jumlah_seikuruhulu);
                  ?>, 
                  <?php 
                  $jumlah_sidorametimur = mysqli_query($kon,"select * from tbl_det_potensi where id_potensi='6'");
                  echo mysqli_num_rows($jumlah_sidorametimur);
                  ?>
                  ],
                  backgroundColor: [
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(0, 155, 0, 0.2)',
                  'rgb(184, 134, 11, 0.2)',
                  'rgb(128, 4, 0 0.2)',
                  'rgb(63, 255, 0, 0.2)',
                  'rgb(128, 4, 0, 0.2)'
                  ],
                  borderColor: [                  
                  'rgba(75, 192, 192, 1)',
                  'rgba(0, 155, 0, 1)',
                  'rgb(184, 134, 11, 1)',
                  'rgb(128, 4, 0, 1)',
                  'rgb(63, 255, 0, 1)',
                  'rgb(128, 4, 0, 1)'
                  ],
                  borderWidth: 1                  
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero:true
                    }
                  }]
                }
              }
            });
          </script>

          <div class="button">
            <a href="menu/potensidaerah.php">Lihat Detail</a>
          </div>
        </div>
        <!--batas-->

        <div class="top-sales box">
          <div class="title">Hallo Admin!</div>
          <ul>
            <li>

              <div><script language="JavaScript">
                var text="SELAMAT DATANG ADMIN<br/>SELAMAT BERAKTIVITAS";
                var delay=30;
                var currentChar=1;
                var destination="[none]";
                function type()
                {
    //if (document.all)
    {
      var dest=document.getElementById(destination);
    if (dest)// && dest.innerHTML)
    {
      dest.innerHTML=text.substr(0, currentChar)+"<blink></blink>";
      currentChar++;
      if (currentChar>text.length)
      {
        currentChar=1;
        setTimeout("type()", 3000);
      }
      else
      {
        setTimeout("type()", delay);
      }
    }
  }
}
function startTyping(textParam, delayParam, destinationParam)
{
  text=textParam;
  delay=delayParam;
  currentChar=1;
  destination=destinationParam;
  type();
}
</script>
<b><div id="textDestination" style="font: 20px; color: black; margin: 0px; "></div></b>

<script language="JavaScript">
  javascript:startTyping(text, 50, "textDestination");
</script></div>

</li>
</ul>

</div>
</div>
</div>
<!-- Tutup Text -->
<br>
<?php
    //Cek apakah ada nilai dari method GET dengan nama id_anggota
if (isset($_GET['id_camat'])) {
  $id_anggota=htmlspecialchars($_GET["id_camat"]);

  $sql="delete from tbl_camat where id_camat = '$_GET[id_camat]'"; 
  $hasil=mysqli_query($kon,$sql);
        //Kondisi apakah berhasil atau tidak
  if ($hasil) {
    header("Location:camat.php");

  }
  else {
    echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

  }
}
?>
<br>
<a style="margin-left: 20px;" href="menu/camat.php" class="btn btn-primary" role="button">Lihat Data Camat</a>
<br>
<table class="table table-bordered table-hover">
  <br>
  <thead>
    <tr style="background-color: aqua;">
      <th>No</th>
      <th>NIP</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Masa Jabatan</th>
      <th>Jabatan</th>
      

    </tr>
  </thead>
  <tbody>
    <?php 
    $batas = 5;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($kon,"select * from tbl_camat");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);

    $data_berita = mysqli_query($kon,"select * from tbl_camat order by id_camat desc limit $halaman_awal, $batas");
    $nomor = $halaman_awal+1;
    while($data = mysqli_fetch_array($data_berita)){
      ?>
      <tr>
        <td width="30px"><?php echo $nomor++;?></td>
        <td width="150px"><?php echo $data["nip_camat"]; ?></td>
        <td width="150px"><?php echo $data["nm_camat"]; ?></td>
        <td width="150px"><?php echo $data["jk_camat"]; ?></td>
        <td width="150px"><?php echo $data["mj_camat"]; ?></td>
        <td width="150px"><?php echo $data["jabatan"]; ?></td>  
      </tr>
    </tbody>
    <?php
  }
  ?>
</table>
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

