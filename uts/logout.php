<?php
   session_start();
   session_destroy();
   echo "<script type='text/javascript'>alert('Anda Berhasil Logout')</script>",header('Refresh: 0;index.php');
?>
