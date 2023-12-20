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
  $SoLuong = $_POST['SoLuong'];
  $TrangThai = $_POST['TrangThai'];
  $dem = execute_query("SELECT COUNT(*) FROM sanpham WHERE TenSanPham=:TenSanPham AND MaKichThuoc=:MaKichThuoc", array('TenSanPham' => $TenSanPham, 'MaKichThuoc' => $MaKichThuoc))[0][0];
  if($dem > 0){
    alert("Sản phẩm '{$TenSanPham}' với kích thước '{$MaKichThuoc}' đã tồn tại !");
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

  //Chuyen SoLuong sang bang sanphamkichthuoc
  $LayMaSanPham = execute_query("SELECT * FROM sanpham WHERE TenSanPham=:TenSanPham AND MaKichThuoc=:MaKichThuoc", array('MaKichThuoc' => $MaKichThuoc, 'TenSanPham' => $TenSanPham))[0];
  $MaSanPham = $LayMaSanPham['MaSanPham']; 
  $sql = "INSERT sanphamkichthuoc (MaKichThuoc,MaSanPham,SoLuong,BanDuoc) VALUES (:MaKichThuoc,:MaSanPham,:SoLuong,'0')";
  $params = array();
  $params['MaKichThuoc'] = $MaKichThuoc;
  $params['MaSanPham'] = $MaSanPham;
  $params['SoLuong'] = $SoLuong;
  execute_command($sql, $params);

  alert("Thêm sản phẩm '{$TenSanPham}' với số lượng '{$SoLuong}' thành công !");
  location("quan_ly_san_pham.php");
?>