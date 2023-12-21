<?php
  session_start();
  $_SESSION['TaiKhoan'] = $_POST['TaiKhoan'];
  $_SESSION['DiaChi'] = $_POST['DiaChi'];
  $_SESSION['SoDienThoai'] = $_POST['SoDienThoai'];
  $_SESSION['TongTienTu'] = $_POST['TongTienTu'];
  $_SESSION['TongTienDen'] = $_POST['TongTienDen'];
  $_SESSION['NgayTaoTu'] = $_POST['NgayTaoTu'];
  $_SESSION['NgayTaoDen'] = $_POST['NgayTaoDen'];
  header('location: danh_sach_gio_hang_da_duyet.php', TRUE, 307);
?>