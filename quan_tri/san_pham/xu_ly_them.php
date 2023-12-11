<?php
  include '../module/database.php';
  include '../module/thong_bao.php';

  $TenSanPham = $_POST['TenSanPham'];
  $GiaGoc = $_POST['GiaGoc'];
  $GiaKhuyenMai = $_POST['GiaKhuyenMai'];
  $MoTa= $_POST['MoTa'];
  $MaKichThuoc = $_POST['KichThuoc'];
  $MaLoaiSanPham = $_POST['TenLoaiSanPham'];
  $MaHangSanXuat = $_POST['TenHangSanXuat'];
  $file_name = $_FILES['HinhAnh']['name'];
  $GioiTinh = $_POST['GioiTinh'];
  $TrangThai = $_POST['TrangThai'];
  $dem = execute_query("SELECT COUNT(*) FROM sanpham WHERE TenSanPham=:TenSanPham", array('TenSanPham' => $TenSanPham))[0][0];
  if($dem > 0){
    alert("Sản phẩm '{$TenSanPham}' đã tồn tại !");
    location('them_san_pham.php');
    return;
  }
  $parts = explode('.', $file_name); 
  $date = new DateTimeImmutable();
  $file_name = md5($date->getTimestamp().$file_name) . '.'. $parts[count($parts) - 1];
  move_uploaded_file($_FILES['HinhAnh']['tmp_name'], '../../data/san_pham/' . $file_name);
  $HinhAnh = $file_name;
  $sql = "INSERT sanpham (TenSanPham,GiaGoc,GiaKhuyenMai,MoTa,GioiTinh,MaKichThuoc,MaLoaiSanPham,MaHangSanXuat,HinhAnh,TrangThai) VALUES (:TenSanPham,:GiaGoc,:GiaKhuyenMai,:MoTa,:GioiTinh,:MaKichThuoc,:MaLoaiSanPham,:MaHangSanXuat,:HinhAnh,:TrangThai)";  
  $params = array();
  $params['TenSanPham'] = $TenSanPham;
  $params['GiaGoc'] = $GiaGoc;
  $params['GiaKhuyenMai'] = $GiaKhuyenMai;
  $params['MoTa'] = $MoTa;
  $params['GioiTinh'] = $GioiTinh;
  $params['MaKichThuoc'] = $MaKichThuoc;
  $params['MaLoaiSanPham'] = $MaLoaiSanPham;
  $params['MaHangSanXuat'] = $MaHangSanXuat;
  $params['HinhAnh'] = $HinhAnh;
  $params['TrangThai'] = $TrangThai;
  execute_command($sql, $params);
  alert("Thêm sản phẩm '{$TenSanPham}' thành công !");
  location("them_san_pham.php");
?>