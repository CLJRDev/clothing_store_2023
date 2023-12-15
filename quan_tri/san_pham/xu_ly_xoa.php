<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $MaSanPham = $_GET['sanphamid'];
  $MaKichThuoc = $_GET['kichthuocid'];
  $sql = "SELECT HinhAnh FROM sanpham WHERE MaSanPham=:MaSanPham AND MaKichThuoc=:MaKichThuoc";
  $params = array();
  $params['MaSanPham'] = $MaSanPham;
  $params['MaKichThuoc'] = $MaKichThuoc;
  $HinhAnh = execute_query($sql, $params);

  if(count($HinhAnh) > 0){
    unlink('../../data/san_pham/' . $HinhAnh[0][0]);
    execute_command("DELETE FROM sanpham WHERE MaSanPham=:MaSanPham AND MaKichThuoc=:MaKichThuoc", $params);  
  }
  else
    execute_command("DELETE FROM sanpham WHERE MaSanPham=:MaSanPham AND MaKichThuoc=:MaKichThuoc", $params);

  //Xoa thong tin so luong trong sanphamkichthuoc
  execute_command("DELETE FROM sanphamkichthuoc WHERE MaSanPham=:MaSanPham AND MaKichThuoc=:MaKichThuoc", $params);
  alert("Xóa sản phẩm '{$MaSanPham}' thành công !");
  location("quan_ly_san_pham.php");
?>