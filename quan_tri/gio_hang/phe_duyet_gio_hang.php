<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $MaGioHang = $_GET['id'];
  $param = array('MaGioHang' => $_GET['id']);
  $data = execute_query("SELECT * FROM giohang WHERE MaGioHang=:MaGioHang", $param);
  if(count($data) == 0){
    alert('Giỏ hàng không tồn tại !');
    location('quan_ly_gio_hang.php');
    return;
  }else
    $giohang = $data[0];
  execute_command("UPDATE giohang SET TrangThai=1 WHERE MaGioHang=:MaGioHang",$param);
  alert("Giỏ hàng đã được phê duyệt !");

  //thay doi so luong o bang sanphamkichthuoc sau khi duyet don hang thanh cong
  // $sanphamkichthuocs = execute_query("SELECT sanphamkichthuoc.MaSanPham,sanphamkichthuoc.MaKichThuoc,sanphamkichthuoc.SoLuong FROM sanphamkichthuoc INNER JOIN chitietgiohang ON sanphamkichthuoc.MaSanPham=chitietgiohang.MaSanPham INNER JOIN giohang ON chitietgiohang.MaGioHang=giohang.MaGioHang WHERE giohang.MaGioHang={$MaGioHang}");
  execute_command("UPDATE sanphamkichthuoc INNER JOIN chitietgiohang ON sanphamkichthuoc.MaSanPham=chitietgiohang.MaSanPham INNER JOIN giohang ON chitietgiohang.MaGioHang=giohang.MaGioHang SET sanphamkichthuoc.SoLuong=sanphamkichthuoc.SoLuong - chitietgiohang.SoLuong WHERE giohang.MaGioHang={$MaGioHang}"); //trừ đi tổng số lượng bằng số lượng trong đơn hàng được duyệt
  execute_command("UPDATE sanphamkichthuoc INNER JOIN chitietgiohang ON sanphamkichthuoc.MaSanPham=chitietgiohang.MaSanPham INNER JOIN giohang ON chitietgiohang.MaGioHang=giohang.MaGioHang SET sanphamkichthuoc.BanDuoc=sanphamkichthuoc.BanDuoc + chitietgiohang.SoLuong WHERE giohang.MaGioHang={$MaGioHang}"); //cộng bán được bằng số lượng trong đơn hàng được duyệt
  location("quan_ly_gio_hang.php");
?>