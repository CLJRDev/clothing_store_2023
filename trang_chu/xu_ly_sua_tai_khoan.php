<?php
  include_once '../quan_tri/module/database.php';
  include_once '../quan_tri/module/thong_bao.php';

  $TaiKhoan = $_POST['TaiKhoan'];
  $MatKhau = md5($_POST['MatKhau']);
  $XacNhanMatKhau = md5($_POST['XacNhanMatKhau']);
  if($XacNhanMatKhau != $MatKhau){
    alert('Mật khẩu và xác nhận mật khẩu không khớp !');
    location("thong_tin_tai_khoan.php");
    return;
  }
  $Email = $_POST['Email'];
  $demEmail = execute_query("SELECT * FROM nguoidung WHERE Email='{$Email}' AND TaiKhoan <> '{$TaiKhoan}'");
  if(count($demEmail) > 0){
    alert('Email đã tồn tại !');
    location("thong_tin_tai_khoan.php");
    return;
  }
  if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
    alert('Email không hợp lệ !');
    location("thong_tin_tai_khoan.php");
    return;
  }
  $file_name = $_FILES['HinhAnh']['name'];

  $sql = '';
  $params = array();
  if($_POST['MatKhau'] != ''){
    if($file_name == ''){    
      $sql = "UPDATE nguoidung SET MatKhau=:MatKhau,Email=:Email WHERE TaiKhoan=:TaiKhoan";
    }
    else{
      $HinhAnh = execute_query("SELECT HinhAnh FROM nguoidung WHERE TaiKhoan=:TaiKhoan", array('TaiKhoan' => $TaiKhoan))[0][0];
      unlink("../data/nguoi_dung/{$HinhAnh}");
      $parts = explode('.',$HinhAnh);
      $date = new DateTimeImmutable();
      $file_name = md5($date->getTimestamp() . $file_name) . '.' . $parts[count($parts ) - 1];
      move_uploaded_file($_FILES['HinhAnh']['tmp_name'], '../data/nguoi_dung/' . $file_name);
      $HinhAnh = $file_name;

      $sql = "UPDATE nguoidung SET MatKhau=:MatKhau, Email=:Email, HinhAnh=:HinhAnh WHERE TaiKhoan=:TaiKhoan";
      $params['HinhAnh'] = $HinhAnh;
    } 
    $params['TaiKhoan'] = $TaiKhoan;
    $params['MatKhau'] = $MatKhau;
    $params['Email'] = $Email;
    execute_command($sql,$params);
    alert("Sửa thông tin tài khoản thành công !");
    location("thong_tin_tai_khoan.php");
  }
  else {
    if($file_name == ''){    
      $sql = "UPDATE nguoidung SET Email=:Email WHERE TaiKhoan=:TaiKhoan";
    }
    else{
      $HinhAnh = execute_query("SELECT HinhAnh FROM nguoidung WHERE TaiKhoan=:TaiKhoan", array('TaiKhoan' => $TaiKhoan))[0][0];
      unlink("../data/nguoi_dung/{$HinhAnh}");
      $parts = explode('.',$HinhAnh);
      $date = new DateTimeImmutable();
      $file_name = md5($date->getTimestamp() . $file_name) . '.' . $parts[count($parts ) - 1];
      move_uploaded_file($_FILES['HinhAnh']['tmp_name'], '../data/nguoi_dung/' . $file_name);
      $HinhAnh = $file_name;

      $sql = "UPDATE nguoidung SET Email=:Email,HinhAnh=:HinhAnh WHERE TaiKhoan=:TaiKhoan";
      $params['HinhAnh'] = $HinhAnh;
    } 
    $params['TaiKhoan'] = $TaiKhoan;
    $params['Email'] = $Email;
    execute_command($sql,$params);
    alert("Sửa thông tin tài khoản thành công !");
    location("thong_tin_tai_khoan.php");
  }
?>