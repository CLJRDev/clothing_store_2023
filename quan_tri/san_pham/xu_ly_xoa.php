<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $MaSanPham = $_GET['id'];
  $sql = "SELECT HinhAnh FROM sanpham WHERE MaSanPham=:MaSanPham";
  $params = array('MaSanPham' => $MaSanPham);
  $HinhAnh = execute_query($sql, $params);
  if(count($HinhAnh) > 0){
    unlink('../../data/san_pham/' . $HinhAnh[0][0]);
    execute_command("DELETE FROM sanpham WHERE MaSanPham=:MaSanPham", $params);  
  }
  else
    execute_command("DELETE FROM sanpham WHERE MaSanPham=:MaSanPham", $params);
  alert("Xóa sản phẩm '{$MaSanPham}' thành công !");
  location("quan_ly_san_pham.php");
?>