<?php
   require_once("koneksi.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $namadepan = $_POST['namadepan'];
   $namabelakang = $_POST['namabelakang'];
   $jeniskel = $_POST['jeniskel'];
   $kota = $_POST['kota'];
   $filename=$_FILES["foto"]["name"];
   $extension=end(explode(".", $filename));
   $foto = $username.".".$extension;
   if ($filename==NULL) {
     $foto = 'blank.jpg';
   }

   move_uploaded_file($_FILES["foto"]["tmp_name"],"photos/".$foto);

   $sql = "SELECT * FROM login WHERE username = '$username'";
   $query = $db->query($sql);
   if($query->num_rows != 0) {
    echo header('Refresh: 3; URL=daftar.php');
     echo "<script type='text/javascript'>alert('Maaf username yang anda masukkan sudah terdaftar')</script>",header('Refresh: 0;daftar.php');
   } else {
       $data = "INSERT INTO login VALUES ('$username', '$pass','$namadepan','$namabelakang','$jeniskel','$kota','$foto')";
       $simpan = $db->query($data);
       if($simpan) {
         echo "<script type='text/javascript'>alert('Pendaftaran sukses, silahkan Login menggunakan akun yang telah dibuat')</script>",header('Refresh: 0;login.php');
       } else {
        echo "<script type='text/javascript'>alert('Pendaftaran Gagal')</script>",header('Refresh: 0;daftar.php');
       }
     }
?>