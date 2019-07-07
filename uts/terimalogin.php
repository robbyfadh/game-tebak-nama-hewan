<?php
   session_start();
   require_once("koneksi.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];   
   $sql = "SELECT * FROM login WHERE username = '$username'";
   $query = $db->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
    echo "<script type='text/javascript'>alert('Username belum terdaftar')</script>",header('Refresh: 0;login.php');
   } else {
     if($pass <> $hasil['password']) {
       echo "<script type='text/javascript'>alert('Password salah')</script>",header('Refresh: 0;login.php');
     } else {
       $_SESSION['username'] = $hasil['username'];
       $_SESSION['foto'] = $hasil['foto'];
       header('location:index.php');
     }
   }
?>
<html>
<head>
    <title>Desain Web</title>
    <link rel="icon" href="gambar/appicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<br><br>
<center>
   Selamat Datang, <b><?php echo $_SESSION['username'];?></b> silahkan menikmati gamenya
   <?php
   echo $_SESSION['foto'];
   ?>
</center>
</body>
</html>
