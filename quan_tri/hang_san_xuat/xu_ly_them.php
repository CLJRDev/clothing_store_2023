<?php
  include '../module/database.php';
  include '../module/thong_bao.php';

  $TenHangSanXuat = $_POST['TenHangSanXuat'];
  $dem = execute_query("SELECT COUNT(*) FROM hangsanxuat WHERE TenHangSanXuat=:TenHangSanXuat", array('TenHangSanXuat' => $TenHangSanXuat))[0][0];
  if($dem > 0){
    alert('Tên hãng sản xuất đã tồn tại !');
    location('them_hang_san_xuat.php');
    return;
  }
  $file_name = $_FILES['HinhAnh']['name'];
  $TrangThai = $_POST['TrangThai'];
  $parts = explode('.', $file_name); 
  $date = new DateTimeImmutable();
  $file_name = md5($date->getTimestamp().$file_name) . '.'. $parts[count($parts) - 1];
  move_uploaded_file($_FILES['HinhAnh']['tmp_name'], '../../data/hang_san_xuat/' . $file_name);
  $HinhAnh = $file_name;
  $sql = "INSERT hangsanxuat (TenHangSanXuat,HinhAnh,TrangThai) VALUES (:TenHangSanXuat,:HinhAnh,:TrangThai)";  
  $params = array();
  $params['TenHangSanXuat'] = $TenHangSanXuat;
  $params['HinhAnh'] = $HinhAnh;
  $params['TrangThai'] = $TrangThai;
  execute_command($sql, $params);
  location("them_hang_san_xuat.php");
?>