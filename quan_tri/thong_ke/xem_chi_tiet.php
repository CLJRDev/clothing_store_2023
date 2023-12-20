<?php
  include_once '../module/database.php';
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xem chi tiết doanh thu theo tháng</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <div class='body'>  
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh sách doanh thu sản phẩm theo tháng</div>
      <table class='table table-striped border-top mt-2 table-bordered align-middle'>
        <thead>
          <tr>
            <!-- <th style='width: 50px; min-width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th> -->
            <th style='width: 80px;' class='text-center'>Tháng</th>
            <th style='width: 80px;' class='text-center'>Năm</th>
            <th style='width: 200px; min-width: 200px;' class='text-center'>Hình ảnh</th>
            <th style='min-width: 200px;' class='text-center'>Tên sản phẩm</th>
            <th style='width: 200px; min-width: 100px;' class='text-center'>Kích thước</th>
            <th style='width: 200px; min-width: 100px;' class='text-center'>Doanh thu</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $Thang = $_GET['mid'];
            $Nam = $_GET['yid'];
            $sql = "SELECT 
                        MONTH(NgayTao) AS Thang, 
                        YEAR(NgayTao) AS Nam, 
                        sanpham.MaSanPham, 
                        sanpham.TenSanPham,
                        sanpham.HinhAnh,
                        sanpham.MaKichThuoc,
                        kichthuoc.KichThuoc,
                        giohang.TrangThai, 
                        SUM(chitietgiohang.Gia) AS DoanhThu
                    FROM 
                        giohang
                    INNER JOIN 
                        chitietgiohang ON giohang.MaGioHang = chitietgiohang.MaGioHang
                    INNER JOIN 
                        sanpham ON chitietgiohang.MaSanPham = sanpham.MaSanPham
                    INNER JOIN
                        kichthuoc ON sanpham.MaKichThuoc = kichthuoc.MaKichThuoc
                    WHERE 
                        MONTH(NgayTao) = :Thang 
                        AND YEAR(NgayTao) = :Nam
                        AND giohang.TrangThai = 1
                    GROUP BY 
                        Thang, Nam, sanpham.MaSanPham
                    ORDER BY 
                        DoanhThu DESC";
            $params = array();
            $params['Thang'] = $Thang;
            $params['Nam'] = $Nam;
            $thangs = execute_query($sql,$params);                      
            foreach($thangs as $thang){
              echo "
                <tr>
                  <td class='text-center'>{$thang['Thang']}</td>
                  <td class='text-center'>{$thang['Nam']}</td>
                  <td class='text-center'><img src='../../data/san_pham/{$thang['HinhAnh']}' style='width: 100px; height: 100px; object-fit: contain'></td>
                  <td class='text-center'>{$thang['TenSanPham']}</td>
                  <td class='text-center'>{$thang['KichThuoc']}</td>
                  <td class='text-center'>{$thang['DoanhThu']}</td>
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
      <div class='action_container ps-3 pb-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href='thong_ke_theo_thang.php'>Quay lại <i class='bx bx-arrow-back'></i></a></button>
      </div>
    </div>
  </div>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
  <script src='../js/refresh.js'></script>
</body>
</html>