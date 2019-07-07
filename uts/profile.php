<?php
include ('koneksi.php');
$id = $_GET['id'];
$query = "SELECT * FROM login WHERE username = '$id'";
$query2 = "SELECT skor FROM score WHERE username = '$id' ORDER BY skor DESC";
$result = mysqli_query($db,$query);
$result2 = mysqli_query($db,$query2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	 <link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<body>
	<center>
<div class="bg">
	<div class="tombol">
		<form method="post" action="index.php">
         <button type="submit">Home</button>
         </form><br>

         <form method="post" action="leaderboard.php">
         <button type="submit">Leaderboard</button>
         </form>
     </div>
     <table>
     <th>
<div class="profil">
<?php
	$data = mysqli_fetch_array($result);
	$data2 = mysqli_fetch_array($result2);
	echo "<img src='photos/".$data['foto']."' width='250px' height='250px'>";
	echo "<h2>Username ".$data['username']."</h2>"
	 ?></div></th>
	 <th>
	<table class="bebel" border="1px">
	<tr>
	<th>Nama Lengkap</th>
	<td><?php echo $data['namadepan']." ".$data['namabelakang']; ?>
	</tr>
	<tr>
	<th>Jenis Kelamin</th>
	<td><?php echo $data['jeniskel']; ?></td>
	</tr>
	<tr>
	<th>Asal Kota</th>
	<td><?php echo $data['kota']; ?></td>
	</tr>
	<tr>
	<th>Score Tertinggi</th>
	<td><?php echo $data2['skor']; ?></td>
	</tr>
</table>
</th></table>
</div>
</center>
</body>
</html>