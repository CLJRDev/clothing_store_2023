<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $TaiKhoan = $_GET['id'];
  $sql = "SELECT HinhAnh FROM nguoidung WHERE TaiKhoan=:TaiKhoan";
  $params = array('TaiKhoan' => $TaiKhoan);
  $HinhAnh = execute_query($sql, $params);
  if(count($HinhAnh) > 0){
    unlink('../../data/nguoi_dung/' . $HinhAnh[0][0]);
    execute_command("DELETE FROM nguoidung WHERE TaiKhoan=:TaiKhoan", $params);  
  }
  else
    execute_command("DELETE FROM nguoidung WHERE TaiKhoan= :TaiKhoan", $params);
  alert("Xóa người dùng '{$TaiKhoan}' thành công !");
  location("quan_ly_nguoi_dung.php");
?>