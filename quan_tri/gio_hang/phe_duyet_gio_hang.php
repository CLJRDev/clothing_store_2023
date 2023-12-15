<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';
  $param = array('MaGioHang' => $_GET['id']);
  $data = execute_query("SELECT * FROM giohang WHERE MaGioHang=:MaGioHang", $param);
  if(count($data) == 0){
    alert('Giỏ hàng không tồn tại !');
    location('quan_ly_gio_hang.php');
    return;
  }else
    $giohang = $data[0];
  execute_command("UPDATE giohang SET TrangThai=1 WHERE MaGioHang=:MaGioHang",$param);
  alert("Giỏ hàng đã được phê duyệt !");
  location("quan_ly_gio_hang.php");
?>