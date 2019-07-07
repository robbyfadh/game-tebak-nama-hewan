<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header('location:index.php'); }
?>
<html>
<head>
    <title>Daftar Akun</title>
    <link rel="stylesheet" type="text/css" href="css/daftar.css">

</head>
<body>
  <div class = wall>
<center>
  <form action="terimadaftar.php" method="post" enctype="multipart/form-data">
  <br>
  <table>
  <tbody>
  <br><br><tr><td colspan="2" align="center"><h2>DAFTAR</h2><br></td></tr>
  <tr><td>Username</td><td><input name="username" type="text" required></td></tr>
  <tr><td>Password</td><td><input name="password" type="password" required></td></tr>
  <tr>
    <td>Nama Depan</td><td><input type="text" name="namadepan" required></td>
  </tr>
  <tr>
    <td>Nama Belakang</td><td><input type="text" name="namabelakang"></td>
  </tr>
  <tr>
    <td rowspan="2" valign="top">Jenis Kelamin</td><td><input type="radio" name="jeniskel" value="Laki laki" checked>Laki-Laki</td>
  </tr>
  <tr>
    <td><input type="radio" name="jeniskel" value="Perempuan">Perempuan</td>
  </tr>  
  <tr>
    <td>Kota</td>
    <td>
      <select name="kota" size="1">
        <option value="Surakarta">Surakarta</option>
        <option value="Sukoharjo">Sukoharjo</option>
        <option value="Karanganyar">Karanganyar</option>
        <option value="Klaten" selected>Klaten</option>
        <option value="Boyolali">Boyolali</option>
        <option value="Wonogiri">Wonogiri</option></select>
    </td>
  </tr>
  <tr><td>Upload Foto Anda</td>
      <td><input type="file" name="foto" accept="image/*"></td>
  </tr>
  <tr><td colspan="2" align="right"><input value="Daftar" type="submit"> <input value="Batal" type="reset"></td></tr>
  </tbody>
  </table>
  <br>
  <ceter>Sudah Punya akun ? <a href="login.php"><b>Login</b></a></ceter>
  </form>
</center>
</div>
<div class="footer">
  <p>Pemrograman Web PTIK 2017 (Sigit Priyoga, Robby Fadhilah, Yoga Putra, Yuliana Rizka)</p>
</div>

</body>
</html>