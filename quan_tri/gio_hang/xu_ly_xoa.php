<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $MaGioHang = $_GET['id'];
  $params = array('MaGioHang' => $MaGioHang);
  execute_command("DELETE FROM giohang WHERE MaGioHang=:MaGioHang", $params);
  execute_command("DELETE FROM chitietgiohang WHERE MaGioHang=:MaGioHang", $params);
  alert("Xóa giỏ hàng '{$MaGioHang}' thành công !");
  location("quan_ly_gio_hang.php");
?>