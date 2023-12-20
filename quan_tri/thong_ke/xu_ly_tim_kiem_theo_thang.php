<?php
  session_start();
  $_SESSION['Thang'] = $_POST['Thang'];
  $_SESSION['Nam'] = $_POST['Nam'];
  header('location: thong_ke_theo_thang.php', TRUE, 307);
?>