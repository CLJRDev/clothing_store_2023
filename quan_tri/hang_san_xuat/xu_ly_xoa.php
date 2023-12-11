<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $MaHangSanXuat = $_GET['id'];
  $sql = "SELECT HinhAnh FROM hangsanxuat WHERE MaHangSanXuat=:MaHangSanXuat";
  $params = array('MaHangSanXuat' => $MaHangSanXuat);
  $HinhAnh = execute_query($sql, $params);
  if(count($HinhAnh) > 0){
    unlink('../../data/hang_san_xuat/' . $HinhAnh[0][0]);
    execute_command("DELETE FROM hangsanxuat WHERE MaHangSanXuat=:MaHangSanXuat", $params);  
  }
  else
    execute_command("DELETE FROM hangsanxuat WHERE MaHangSanXuat= :MaHangSanXuat", $params);
  location("them_hang_san_xuat.php");
?>