<?php
  session_start();
  include_once '../module/database.php';
  $loaisanphams = execute_query("SELECT * FROM loaisanpham WHERE TrangThai=1");
  $hangsanxuats = execute_query("SELECT * FROM hangsanxuat WHERE TrangThai=1");
  $kichthuocs = execute_query("SELECT * FROM kichthuoc");
  $giohangs = execute_query("SELECT * FROM giohang WHERE TrangThai=1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thống kê hàng tồn</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' action='xu_ly_tim_kiem_hang_ton.php' method='post'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Sản Phẩm</div>
      <div class="input-group px-3 row">
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Thời gian</div>
          <select name="NamTu" class="form-select js_select" id="inputGroupSelect01 NamTu">
          <option value='-1'>Tất cả</option>
          <option value='112023'>11/2023</option>
          <option value='122023'>12/2023</option>
          <option value='012024'>01/2024</option>
          </select>
        </div>
      </div>  
    </div>  
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh sách sản phẩm</div>
      <div class='action_container ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Tìm Kiếm <i class='bx bx-search' ></i></button>
        <button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href="thong_ke_hang_ton.php">Thống kê hàng tồn <i class='bx bx-data'></i></a></button>
        <button class='button_reset text-white py-2 px-3 rounded' type='button'>Reset <i class='bx bx-refresh'></i></i></button>
      </div>
      <table class='table table-striped border-top mt-2 table-bordered'>
        <thead>
          <tr>
            <!-- <th style='width: 50px; min-width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th> -->
            <th style='width: 150px; min-width: 150px;' class='text-center'>Thời gian</th>
            <th style='width: 50px; min-width: 100px;' class='text-center'>Doanh thu</th>
            <th style='width: 50px; min-width: 100px;' class='text-center'>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT MaSanPham, TenSanPham, sanpham.HinhAnh, GiaGoc, GiaKhuyenMai, MoTa, GioiTinh, kichthuoc.KichThuoc, loaisanpham.TenLoaiSanPham, hangsanxuat.TenHangSanXuat, sanpham.TrangThai FROM `sanpham` 
                    INNER JOIN kichthuoc ON sanpham.MaKichThuoc = kichthuoc.MaKichThuoc
                    INNER JOIN loaisanpham ON sanpham.MaLoaiSanPham = loaisanpham.MaLoaiSanPham
                    INNER JOIN hangsanxuat ON sanpham.MaHangSanXuat = hangsanxuat.MaHangSanXuat WHERE 1=1";
            $params = array();
            if(isset($_SESSION['tu_khoa_san_pham']))
              if($_SESSION['tu_khoa_san_pham'] != ''){
                $sql .= " AND CONCAT(TenSanPham,MoTa) LIKE CONCAT('%',:tu_khoa,'%')";
                $params['tu_khoa'] = $_SESSION['tu_khoa_san_pham'];
              }
            if(isset($_SESSION['kich_thuoc']))
              if($_SESSION['kich_thuoc'] != -1){
                $sql .= " AND sanpham.MaKichThuoc = :kich_thuoc";
                $params['kich_thuoc'] = $_SESSION['kich_thuoc'];
              }
            if(isset($_SESSION['ma_loai_san_pham']))
              if($_SESSION['ma_loai_san_pham'] != -1){
                $sql .= " AND sanpham.MaLoaiSanPham = :ma_loai_san_pham";
                $params['ma_loai_san_pham'] = $_SESSION['ma_loai_san_pham'];
              }
            if(isset($_SESSION['ma_hang_san_xuat']))
              if($_SESSION['ma_hang_san_xuat'] != -1){
                $sql .= " AND sanpham.MaHangSanXuat = :ma_hang_san_xuat";
                $params['ma_hang_san_xuat'] = $_SESSION['ma_hang_san_xuat'];
              }
            if(isset($_SESSION['gioi_tinh']))
              if($_SESSION['gioi_tinh'] != -1){
                $sql .= " AND GioiTinh = :gioi_tinh";
                $params['gioi_tinh'] = $_SESSION['gioi_tinh'];
              }
            if(isset($_SESSION['trang_thai_san_pham']))
              if($_SESSION['trang_thai_san_pham'] != -1){
                $sql .= " AND sanpham.TrangThai = :trang_thai";
                $params['trang_thai'] = $_SESSION['trang_thai_san_pham'];
              }
            $page_index = 1;
            $page_length = 20;
            if(isset($_GET['pid']))
              $page_index = $_GET['pid'];
            $start_index = ($page_index - 1) * $page_length;
            $sql = $sql." LIMIT {$start_index}, {$page_length}";
            $sanphams = execute_query($sql,$params);                        
            foreach($sanphams as $sanpham){
              echo "
                <tr>
                  <td class='text-center'>11/2023</td>
                  <td class='text-center'>1700000000</td>
                  <td class='text-center d-flex justify-content-around align-items-center'>
                    <a class='text-dark' href='#'><i class='bx bx-detail' style='transform: scale(1.5);'></i></a></td>
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
      <div class="pagination d-flex justify-content-center">
        <ul class="pagination">
          <?php
            $row_number = execute_query("SELECT COUNT(*) AS dem FROM sanpham")[0]['dem'];
            $page_number = (int) $row_number / $page_length;
            if($row_number % $page_length != 0)
              $page_number++;
            for($i = 1; $i <= $page_number; $i++)
              echo "<a href='quan_ly_san_pham.php?pid={$i}' class='page-link'>{$i}</a>";  
          ?>          
        </ul>
      </div>
    </div>
  </form>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
  <script src='../js/refresh.js'></script>
</body>
</html>