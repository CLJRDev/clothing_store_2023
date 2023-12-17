<?php
  session_start();
  include '../quan_tri/module/database.php';
  $cartItems = $_SESSION['cartItems'];
  $ids = array();
  foreach($cartItems as $value)
    array_push($ids, $value);
  $so_luongs = array();
  $kich_thuocs = array();
  foreach($ids as $value){
    array_push($so_luongs, $_POST['so_luong_'.$value]);
    array_push($kich_thuocs, $_POST['kich_thuoc_'.$value]);
  }
  //Thêm giỏ hàng
  $sql = "INSERT giohang (TaiKhoan,DiaChi,NgayTao,TongTien,TrangThai) VALUES(:tai_khoan, :dia_chi, NOW(), :tong_tien, :trang_thai)";
  $params = array();
  $params['tai_khoan'] = 'Admin';
  $params['dia_chi'] = '214 Lý Thánh Tông, Đồ Sơn, TP.Hải Phòng';
  $tong_tien = 0;
  for($i=0; $i<count($ids); $i++){
    $gia = execute_query("SELECT GiaKhuyenMai FROM sanpham WHERE MaSanPham=:ma_san_pham", array('ma_san_pham' => $ids[$i]))[0][0];
    $tong_tien += $gia * $so_luongs[$i];
  }
  $params['tong_tien'] = $tong_tien;
  $params['trang_thai'] = 0;  
  execute_command($sql, $params);

  //Thêm chi tiết giỏ hàng
  $ma_gio_hang = execute_query("SELECT MaGioHang FROM giohang ORDER BY MaGioHang DESC LIMIT 1")[0][0];
  $sql = "INSERT chitietgiohang (MaGioHang,MaSanPham,MaKichThuoc,SoLuong,Gia) VALUES (:ma_gio_hang,:ma_san_pham,:ma_kich_thuoc,:so_luong,:gia)";
  for($i=0;$i<count($ids);$i++){
    $params = array();
    $gia = execute_query("SELECT GiaKhuyenMai FROM sanpham WHERE MaSanPham=:ma_san_pham", array('ma_san_pham' => $ids[$i]))[0][0];
    $params['ma_gio_hang'] = $ma_gio_hang;
    $params['ma_san_pham'] = $ids[$i];
    $params['ma_kich_thuoc'] = $kich_thuocs[$i];
    $params['so_luong'] = $so_luongs[$i];
    $gia *= $so_luongs[$i];
    $params['gia'] = $gia;
    execute_command($sql,$params);
  }
  unset($_SESSION['cartItems']);
  header("Location: gio_hang.php", TRUE, 307);
?>