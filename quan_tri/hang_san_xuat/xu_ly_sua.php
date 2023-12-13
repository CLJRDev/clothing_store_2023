<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $MaHangSanXuat = $_POST['MaHangSanXuat'];
  $TenHangSanXuat = $_POST['TenHangSanXuat'];
  $file_name = $_FILES['HinhAnh']['name'];
  $TrangThai = $_POST['TrangThai'];

  $dem = execute_query("SELECT COUNT(*) FROM hangsanxuat WHERE TenHangSanXuat=:TenHangSanXuat AND MaHangSanXuat <> :MaHangSanXuat", array('TenHangSanXuat' => $TenHangSanXuat, 'MaHangSanXuat' => $MaHangSanXuat))[0][0];
  if($dem > 0){
    alert('Hãng sản xuẩt đã tồn tại');
    location("sua_hang_san_xuat.php?id={$MaHangSanXuat}");
    return;
  }

  $sql = '';
  $params = array();
  if($file_name == ''){    
    $sql = "UPDATE hangsanxuat SET TenHangSanXuat=:TenHangSanXuat,TrangThai=:TrangThai WHERE MaHangSanXuat=:MaHangSanXuat";
  }else{
    $HinhAnh = execute_query("SELECT HinhAnh FROM hangsanxuat WHERE MaHangSanXuat=:MaHangSanXuat", array('MaHangSanXuat' => $MaHangSanXuat))[0][0];
    unlink("../../data/hang_san_xuat/{$HinhAnh}");
    $parts = explode('.',$HinhAnh);
    $date = new DateTimeImmutable();
    $file_name = md5($date->getTimestamp() . $file_name) . '.' . $parts[count($parts ) - 1];
    move_uploaded_file($_FILES['HinhAnh']['tmp_name'], '../../data/hang_san_xuat/' . $file_name);
    $HinhAnh = $file_name;

    $sql = "UPDATE hangsanxuat SET TenHangSanXuat=:TenHangSanXuat,HinhAnh=:HinhAnh,TrangThai=:TrangThai WHERE MaHangSanXuat=:MaHangSanXuat";
    $params['HinhAnh'] = $HinhAnh;
  }
  $params['MaHangSanXuat'] = $MaHangSanXuat; 
  $params['TenHangSanXuat'] = $TenHangSanXuat;
  $params['TrangThai'] = $TrangThai;
  execute_command($sql,$params);
  header("Location: sua_hang_san_xuat.php?id={$MaHangSanXuat}", TRUE, 307);
?>