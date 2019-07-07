<?php
include ('koneksi.php');
$sql = "SELECT * FROM score ORDER BY skor DESC";
$result = mysqli_query($db,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Leaderboard</title>
	    <link rel="stylesheet" type="text/css" href="css/leaderboard.css">
</head>
<body>
	<div class="bg">

	<center>
<img width="100" src="style/leaderboard.png"><h1>Leaderboard</h1>
<table border="1px">
	<tr><th>Username</th><th>Scores</th><th>Playtime</th></tr>
	<?php
		while ($data = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td><a href='profile.php?id=".$data['username']."'>".$data['username']."</a></td>";
			echo "<td>".$data['skor']."</td>";
			echo "<td>".$data['tanggal']."</td>";
			echo "</tr>";
		}
	?>
</table>

<div class="footer"> 
<p> <a href="index.php">Kembali ke Home</a> <br></p></div>
</center>
</div>
</body>
</html>