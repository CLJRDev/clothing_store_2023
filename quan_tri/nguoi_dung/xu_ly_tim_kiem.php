<?php
  session_start();
  $_SESSION['tai_khoan'] = $_POST['TaiKhoan']; 
  $_SESSION['trang_thai_nguoi_dung'] = $_POST['TrangTHai']; 
  $_SESSION['quyen'] = $_POST['Quyen']; 
  $_SESSION['email'] = $_POST['Email'];
  header('Location: quan_ly_nguoi_dung.php', TRUE, 307);
?>