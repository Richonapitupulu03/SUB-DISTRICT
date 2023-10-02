<?php include "koneksi.php"; ?>
<?php
    ob_start();
    session_start();
    $email    = $_POST['email'];
    $password    = $_POST['password'];
    $_SESSION['email'] = $user;
        $Open = mysql_connect("localhost","root","");
            if (!$Open){
            die ("Koneksi ke Engine MySQL Gagal !");
                }
        $Koneksi = mysql_select_db("a_pancurbatu");
            if (!$Koneksi){
            die ("Koneksi ke Database Gagal !");
            }
    $sql = "SELECT * FROM tbl_admin where email='$email'";
    $qry = mysql_query($sql);
    $num = mysql_num_rows($qry);
    $row = mysql_fetch_array($qry);

    if ($num==0 OR $password!=$row['password']) {
    ?>
        <script language="JavaScript">
            alert('email atau Password tidak sesuai !');
            document.location='login.php';
        </script>
    <?php
    }
    else {
        $_SESSION['login']=1;
        header("Location:../Admin/index.php");
    }
    mysql_close($Open); //Tutup koneksi engine MySQL
?>