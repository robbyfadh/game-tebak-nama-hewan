<?php
session_start();
$imagesDir = 'hewan/';
if (isset($_POST['submit1']) || isset($_POST['skip'])){
	$images = glob($imagesDir . '*.{jpg}', GLOB_BRACE);
	$randomImage = $images[array_rand($images)];
	$_SESSION['nilai']=100;
	$_SESSION['batas']=50;
}
if (isset($_POST['klu'])) {
	$_SESSION['batas']-=10;
	$_SESSION['nilai']-=20;
	$randomImage= $_POST['jawab'];
}
if (isset($_POST['submit'])) {
	$tebak = 'hewan/'.$_POST['tebak'].'.jpg';
	if ($_POST['jawab']==$tebak) {
	$_SESSION['batas']=50;
	$_SESSION['score'] =$_SESSION['score'] + $_SESSION['nilai'];
	$images = glob($imagesDir . '*.{jpg}', GLOB_BRACE);
	$randomImage = $images[array_rand($images)];
	$_SESSION['nilai']=100;
	} else {
	$_SESSION['lives'] -=1;
	$randomImage=$_POST['jawab'];
	$_SESSION['batas'] -=15;

	}
} 
	//$batas=100;
$random = rand(10,$_SESSION['batas']);
//echo $random;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Game Tebak Gambar</title>
	 <link rel="stylesheet" type="text/css" href="css/game.css">
</head>
<body>
	<div class = wall>
	<center>
<?php
 if((isset($_SESSION['username']) && $_SESSION['username'] == true))
{
	if($_SESSION['lives']<=0){
		?><br><br><br><br><br><br><br><br><br><br><br><br><img src="style/game.png"><br><br><br><br><br><br><br><br><br><br><br><br><?php
		echo "Game Over";
		echo "<p><a href='index.php'>Main Lagi?</a></p>";
		include 'koneksi.php';
		$db = mysqli_connect($hostname, $username, $password, $dbname);
		$query = "INSERT INTO score (username, skor, tanggal) VALUES ('".$_SESSION['username']."', '".$_SESSION['score']."', '".date('Y-m-d H:i:s')."')";
		$hasil = mysqli_query($db, $query);
	}
	else{
?> 
	<table>
	<H1>TEBAK Gambar</H1>
	<img src="<?php echo $randomImage;?>" style="    
	opacity: 1;
    filter: alpha(opacity=20); /* For IE8 and earlier */
    -webkit-filter: blur(<?php echo $random; ?>px);
    filter: blur(<?php echo $random; ?>px)>;
    "><br>
    <p>Skor untuk gambar ini : 
    <?php 
    echo $_SESSION['nilai']."</p>";
    echo "<p> lives  :".$_SESSION['lives']."</p>";
    echo "<p> skor   :".$_SESSION['score']."</p>";
    ?>
	</p>
    <form method="post" action="game.php">
    <br>
    <input type="text" name="jawab" value="<?php echo $randomImage?>" hidden>
    <input type="text" name="tebak">
    <input type="submit" name="submit">
    <?php
    if ($_SESSION['nilai'] > 0) {
    	# code...
    
    ?>
    <input type="submit" name="klu" value="Clue !!">
    <?php
	}else{

    ?>
    <input type="submit" name="skip" value="Skip Gambar">
    <?php
	}
	?>
    </form>
    </div>
<?php
			}
}
else {
 echo "<script type='text/javascript'>alert('Anda belum login silahkan login terlebih dahulu untuk dapat bermain game')</script>",header('Refresh: 0;login.php');}
 ?>
 </center>
</body>
</html>