<?php
  include '../module/database.php';
  include '../module/thong_bao.php';
  $TaiKhoan = $_POST['TaiKhoan'];
  
  $dem = execute_query("SELECT COUNT(*) FROM nguoidung WHERE TaiKhoan=:TaiKhoan", array('TaiKhoan' => $TaiKhoan))[0][0];
  if($dem > 0){
    alert('Tên người dùng đã tồn tại !');
    location('them_nguoi_dung.php');
    return;
  }
  $MatKhau = md5($_POST['MatKhau']);
  $XacNhanMatKhau = md5($_POST['XacNhanMatKhau']);
  if($XacNhanMatKhau != $MatKhau){
    alert('Mật khẩu và xác nhận mật khẩu không khớp !');
    location('them_nguoi_dung.php');
    return;
  }
  $Email = $_POST['Email'];
  $demEmail = execute_query("SELECT * FROM nguoidung WHERE Email='{$Email}'");
  if(count($demEmail) > 0){
    alert('Email đã tồn tại !');
    location('them_nguoi_dung.php');
    return;
  }
  if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
    alert('Email không hợp lệ !');
    location('them_nguoi_dung.php');
    return;
  }
  $file_name = $_FILES['HinhAnh']['name'];
  $Quyen = $_POST['Quyen'];
  $TrangThai = $_POST['TrangThai'];
  $parts = explode('.', $file_name); 
  $date = new DateTimeImmutable();
  $file_name = md5($date->getTimestamp().$file_name) . '.'. $parts[count($parts) - 1];
  move_uploaded_file($_FILES['HinhAnh']['tmp_name'], '../../data/nguoi_dung/' . $file_name);
  $HinhAnh = $file_name;
  $sql = "INSERT nguoidung (TaiKhoan,MatKhau,Email,HinhAnh,Quyen,TrangThai) VALUES (:TaiKhoan,:MatKhau,:Email,:HinhAnh,:Quyen,:TrangThai)";  
  $params = array();
  $params['TaiKhoan'] = $TaiKhoan;
  $params['MatKhau'] = $MatKhau;
  $params['Email'] = $Email;
  $params['HinhAnh'] = $HinhAnh;
  $params['Quyen'] = $Quyen;
  $params['TrangThai'] = $TrangThai;
  execute_command($sql, $params);
  alert("Thêm người dùng '{$TaiKhoan}' thành công !");
  location("quan_ly_nguoi_dung.php");
?>