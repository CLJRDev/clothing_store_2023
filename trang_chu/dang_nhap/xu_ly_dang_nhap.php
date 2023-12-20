<?php
	session_start();
	include '../../quan_tri/module/database.php';
	include '../../quan_tri/module/thong_bao.php';
	$TaiKhoan= $_POST['TaiKhoan'];
  $MatKhau = md5($_POST['MatKhau']);
  $params = array();
  $params['TaiKhoan'] = $TaiKhoan;
  $data = execute_query("SELECT MatKhau,Quyen FROM nguoidung WHERE TaiKhoan=:TaiKhoan AND TrangThai=1", $params);
  if (count($data) == 0) {
      alert('Tài khoản không tồn tại hoặc đã bị khóa!');
      location('../login.php');
      return;
  }
  if($data[0]['MatKhau'] != $MatKhau) {
    alert("Mật khẩu không đúng !");
    location("../login.php");
      return;
  }
  if($data[0]['MatKhau'] == $MatKhau) {
    $_SESSION['TenTaiKhoan'] = $TaiKhoan;
    if($data[0]['Quyen'] == 1) {
      $_SESSION['QuanTri'] = $TaiKhoan;
      alert("Chào mừng quản trị viên !");
      location('../trang_chu.php');
        return;
    }
    if($data[0]['Quyen'] == 0) {
      $_SESSION['KhachHang'] = $TaiKhoan;
      alert("Chào mừng quý khách !");
      location('../trang_chu.php');
        return;
    }
  }
?>