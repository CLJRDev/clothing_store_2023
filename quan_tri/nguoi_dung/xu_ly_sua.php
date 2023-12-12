<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $TaiKhoan = $_POST['TaiKhoan'];
  $MatKhau = md5($_POST['MatKhau']);
  $XacNhanMatKhau = md5($_POST['XacNhanMatKhau']);
  if($XacNhanMatKhau != $MatKhau){
    alert('Mật khẩu và xác nhận mật khẩu không khớp !');
    location("sua_nguoi_dung.php?id={$TaiKhoan}");
    return;
  }
  $Email = $_POST['Email'];
  $demEmail = execute_query("SELECT * FROM nguoidung WHERE Email='{$Email}' AND TaiKhoan <> '{$TaiKhoan}'");
  if(count($demEmail) > 0){
    alert('Email đã tồn tại !');
    location("sua_nguoi_dung.php?id={$TaiKhoan}");
    return;
  }
  if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
    alert('Email không hợp lệ !');
    location("sua_nguoi_dung.php?id={$TaiKhoan}");
    return;
  }
  $file_name = $_FILES['HinhAnh']['name'];
  $Quyen = $_POST['Quyen'];
  $TrangThai = $_POST['TrangThai'];

  $sql = '';
  $params = array();
  if($_POST['MatKhau'] != ''){
    if($file_name == ''){    
      $sql = "UPDATE nguoidung SET MatKhau=:MatKhau,Email=:Email,Quyen=:Quyen,TrangThai=:TrangThai WHERE TaiKhoan=:TaiKhoan";
    }
    else{
      $HinhAnh = execute_query("SELECT HinhAnh FROM nguoidung WHERE TaiKhoan=:TaiKhoan", array('TaiKhoan' => $TaiKhoan))[0][0];
      unlink("../../data/nguoi_dung/{$HinhAnh}");
      $parts = explode('.',$HinhAnh);
      $date = new DateTimeImmutable();
      $file_name = md5($date->getTimestamp() . $file_name) . '.' . $parts[count($parts ) - 1];
      move_uploaded_file($_FILES['HinhAnh']['tmp_name'], '../../data/nguoi_dung/' . $file_name);
      $HinhAnh = $file_name;

      $sql = "UPDATE nguoidung SET MatKhau=:MatKhau, Email=:Email, SoDienThoai=:SoDienThoai, MaCauHoiBaoMat=:MaCauHoiBaoMat, CauTraLoi=:CauTraLoi, HinhAnh=:HinhAnh,Quyen=:Quyen, TrangThai=:TrangThai WHERE TaiKhoan=:TaiKhoan";
      $params['HinhAnh'] = $HinhAnh;
    } 
    $params['TaiKhoan'] = $TaiKhoan;
    $params['MatKhau'] = $MatKhau;
    $params['Email'] = $Email;
    $params['Quyen'] = $Quyen;
    $params['TrangThai'] = $TrangThai;
    execute_command($sql,$params);
    alert("Sửa người dùng '{$TaiKhoan}' thành công !");
    location("sua_nguoi_dung.php?id={$TaiKhoan}");
  }
  else {
    if($file_name == ''){    
      $sql = "UPDATE nguoidung SET Email=:Email,Quyen=:Quyen,TrangThai=:TrangThai WHERE TaiKhoan=:TaiKhoan";
    }
    else{
      $HinhAnh = execute_query("SELECT HinhAnh FROM nguoidung WHERE TaiKhoan=:TaiKhoan", array('TaiKhoan' => $TaiKhoan))[0][0];
      unlink("../../data/nguoi_dung/{$HinhAnh}");
      $parts = explode('.',$HinhAnh);
      $date = new DateTimeImmutable();
      $file_name = md5($date->getTimestamp() . $file_name) . '.' . $parts[count($parts ) - 1];
      move_uploaded_file($_FILES['HinhAnh']['tmp_name'], '../../data/nguoi_dung/' . $file_name);
      $HinhAnh = $file_name;

      $sql = "UPDATE nguoidung SET Email=:Email,HinhAnh=:HinhAnh,Quyen=:Quyen,TrangThai=:TrangThai WHERE TaiKhoan=:TaiKhoan";
      $params['HinhAnh'] = $HinhAnh;
    } 
    $params['TaiKhoan'] = $TaiKhoan;
    $params['Email'] = $Email;
    $params['Quyen'] = $Quyen;
    $params['TrangThai'] = $TrangThai;
    execute_command($sql,$params);
    alert("Sửa người dùng '{$TaiKhoan}' thành công !");
    location("sua_nguoi_dung.php?id={$TaiKhoan}");
  }
?>