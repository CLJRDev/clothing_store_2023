<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $ma_loai_san_pham = $_GET['id'];
  //Kiem tra rang buoc
  $sql = "SELECT COUNT(*) AS dem FROM sanpham WHERE MaLoaiSanPham=:ma_loai_san_pham";
  $params = array('ma_loai_san_pham' => $ma_loai_san_pham);
  $data = execute_query($sql, $params);
  if($data[0]['dem'] > 0){
    alert('Còn tồn tại sản phẩm thuộc loại sản phẩm này');
    location('/shop_thoi_trang/quan_tri/loai_san_pham/them_loai_san_pham.php');
    return;
  }
  $sql = "SELECT HinhAnh FROM loaisanpham WHERE MaLoaiSanPham=:ma_loai_san_pham";
  $hinh_anh = execute_query($sql,$params);
  if(count($hinh_anh) > 0){
    execute_command("DELETE FROM loaisanpham WHERE MaLoaiSanPham=:ma_loai_san_pham", $params);
    unlink('../../data/loai_san_pham/'.$hinh_anh[0][0]);
  }
  header("Location: them_loai_san_pham.php", TRUE, 307);
?>