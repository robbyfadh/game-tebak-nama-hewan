<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 

    <title>Pemrograman Web</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  
  <div class="bg">
<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header('location:game.php'); }
   require_once("koneksi.php");
?>

  <br>
  <form action="terimalogin.php" method="post">
  <h2>LOGIN</h2><br>

  <center>
  <table>
  <tbody>
  <tr><td>Username</td><td><input class="w3-input w3-border w3-round-large" name="username" type="text" required></td></tr>
  <tr><td>Password</td><td><input class="w3-input w3-border w3-round-large" name="password" type="password" required></td></tr>
  <tr><td colspan="2" align="right"><input value="Login" type="submit"> <input value="Batal" type="reset"></td></tr>
  <tr><td colspan="2" align="center">Belum Punya akun ? <a href="daftar.php"><b>Daftar</b></a></td></tr>
  </tbody>
  </table>
  </form>
  </div>
</center>

<div class="footer">
  <p>Pemrograman Web PTIK 2017 (Sigit Priyoga, Robby Fadhilah, Yoga Putra, Yuliana Rizka)</p>
</div>
</body>
</html>