<html>
<head>
    <title>ANINAME</title>
     <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

   <center>
    <div class=bg>

<div class=isi>
<br><br><br><br><br><br><br>
<?php
   session_start();
   if((isset($_SESSION['username']) && $_SESSION['username'] == true)) {
   $_SESSION['batas'] = 50;
   $_SESSION['lives'] = 5;
   $_SESSION['score'] = 0;
   $_SESSION['nilai'] = 100;
   $user = $_SESSION['username'];
   require_once("koneksi.php");   
   $sql = "SELECT * FROM login WHERE username = '$username'";
   $sql2 = "SELECT tanggal FROM score WHERE username = '$user' ORDER BY tanggal DESC";
   $result = mysqli_query($db,$sql2);
   $query = $db->query($sql);
   $hasil = $query->fetch_assoc();
?>
<div class="oo">
   <p> &nbsp; Selamat Datang, <b><?php echo $_SESSION['username'];?></b> silahkan menikmati gamenya </p>
   
   <img src='<?php echo "photos/".$_SESSION['foto'];?>' width="80px" height="80px"><br>
   <p> &nbsp; &nbsp; &nbsp; &nbsp; Anda terakhir kali login pada : 
   <?php
   $data = mysqli_fetch_array($result);
   echo $data['tanggal'];
   ?></p>
   
         <form method="post" action="logout.php">
         <button type="submit">Logout</button>
         </form>
 
    <form action="game.php" method="post">
   Klik Untuk memulai<br><input type="submit" name="submit1" value="Start">
   </form>
</div>
   <?php } 
   else {
   ?>
   <div class="intro">
   <p><b><font>SELAMAT DATANG SILAKAN TEKAN <font color="#DC143C">KLASEMEN</font> UNTUK MELIHAT RANK PEMAIN</b></font></p>
   <p><b><font>ATAU TEKAN <font color="#DC143C">LOGIN</font> UNTUK MEMULAI PERMAINAN</b></font></p></div>
   <br><br>
      <form method="post" action="login.php">
         <button type="submit">Login</button>
         </form><br>
      
      <?php 
      } 
      ?>
   </div>
  
         <form method="post" action="leaderboard.php">
         <button type="submit">Kelasemen</button>
         </form>
 
   </div>
   </center>

</body>
</html>
