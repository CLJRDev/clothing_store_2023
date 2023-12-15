<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $MaSanPham = $_POST['MaSanPham'];
  $MaKichThuoc = $_POST['KichThuoc'];
  $TenSanPham = $_POST['TenSanPham'];
  $GiaGoc = $_POST['GiaGoc'];
  $GiaKhuyenMai = $_POST['GiaKhuyenMai'];
  $MoTa = $_POST['MoTa'];
  $MaLoaiSanPham = $_POST['TenLoaiSanPham'];
  $MaHangSanXuat = $_POST['TenHangSanXuat'];
  $file_name = $_FILES['HinhAnh']['name'];
  $GioiTinh = $_POST['GioiTinh'];
  $SoLuong = $_POST['SoLuong'];
  $TrangThai = $_POST['TrangThai'];

 $dem = execute_query("SELECT COUNT(*) FROM sanpham WHERE TenSanPham=:TenSanPham AND MaKichThuoc=:MaKichThuoc AND MaSanPham<>:MaSanPham", array('TenSanPham' => $TenSanPham, 'MaSanPham' => $MaSanPham, 'MaKichThuoc' => $MaKichThuoc))[0][0];
  if($dem > 0){
    alert("Sản phẩm đã tồn tại!");
    location("sua_san_pham.php?sanphamid={$MaSanPham}&kichthuocid={$MaKichThuoc}");
    return;
  }

  $sql = '';
  $params = array();
  if($file_name == ''){    
    $sql = "UPDATE sanpham SET TenSanPham=:TenSanPham, GiaGoc=:GiaGoc, GiaKhuyenMai=:GiaKhuyenMai, MoTa=:MoTa, MaKichThuoc=:MaKichThuoc, MaLoaiSanPham=:MaLoaiSanPham, MaHangSanXuat=:MaHangSanXuat, GioiTinh=:GioiTinh, TrangThai=:TrangThai WHERE MaSanPham=:MaSanPham AND MaKichThuoc=:MaKichThuoc";
  }
  else{
    $HinhAnh = execute_query("SELECT HinhAnh FROM sanpham WHERE MaSanPham=:MaSanPham", array('MaSanPham' => $MaSanPham))[0][0];
    unlink("../../data/san_pham/{$HinhAnh}");
    $parts = explode('.',$HinhAnh);
    $date = new DateTimeImmutable();
    $file_name = md5($date->getTimestamp() . $file_name) . '.' . $parts[count($parts ) - 1];
    move_uploaded_file($_FILES['HinhAnh']['tmp_name'], '../../data/san_pham/' . $file_name);
    $HinhAnh = $file_name;

    $sql = "UPDATE sanpham SET TenSanPham=:TenSanPham, GiaGoc=:GiaGoc, GiaKhuyenMai=:GiaKhuyenMai, MoTa=:MoTa, HinhAnh=:HinhAnh, MaKichThuoc=:MaKichThuoc, MaLoaiSanPham=:MaLoaiSanPham, MaHangSanXuat=:MaHangSanXuat, GioiTinh=:GioiTinh, TrangThai=:TrangThai WHERE MaSanPham=:MaSanPham AND MaKichThuoc=:MaKichThuoc";
    $params['HinhAnh'] = $HinhAnh;
  }
  $params['MaSanPham'] = $MaSanPham;
  $params['TenSanPham'] = $TenSanPham;
  $params['GiaGoc'] = $GiaGoc;
  $params['GiaKhuyenMai'] = $GiaKhuyenMai;
  $params['MoTa'] = $MoTa;
  $params['GioiTinh'] = $GioiTinh;
  $params['MaKichThuoc'] = $MaKichThuoc;
  $params['MaLoaiSanPham'] = $MaLoaiSanPham;
  $params['MaHangSanXuat'] = $MaHangSanXuat;
  $params['TrangThai'] = $TrangThai;
  execute_command($sql,$params);

  //Sua so luong trong bang sanphamkichthuoc
  $params = array();
  $params['SoLuong'] = $SoLuong;
  $params['MaSanPham'] = $MaSanPham;
  $params['MaKichThuoc'] = $MaKichThuoc;
  $sql = "UPDATE sanphamkichthuoc SET SoLuong=:SoLuong WHERE MaSanPham=:MaSanPham AND MaKichThuoc=:MaKichThuoc";
  execute_command($sql,$params);

  alert("Sửa sản phẩm '{$TenSanPham}' thành công !");
  location("sua_san_pham.php?sanphamid={$MaSanPham}&kichthuocid={$MaKichThuoc}");
?>