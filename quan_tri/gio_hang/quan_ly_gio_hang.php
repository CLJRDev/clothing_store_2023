<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản lý giỏ hàng</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' method='post' enctype='multipart/form-data'>  
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh Sách Giỏ Hàng Cần Phê Duyệt</div>
      <div class='action_container ps-3 pb-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href='danh_sach_gio_hang_da_duyet.php'>Giỏ hàng đã duyệt <i class='bx bx-list-check'></i></a></button>
      </div>
      <table class='table table-striped border-top mt-2 table-bordered'>
        <thead>
          <tr>
            <th style='width: 50px; min-width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th>
            <th style='width: 150px; min-width: 150px;'>Tên người đặt</th>
            <th style='min-width: 200px;'>Địa chỉ</th>
            <th class='text-center' style='width: 150px; min-width: 150px;'>Số điện thoại</th>
            <th style='width: 150px; min-width: 150px;' class='text-center'>Ngày tạo</th>
            <th style='width: 150px; min-width: 150px;' class='text-center'>Tổng tiền</th>
            <th style='width: 150px; min-width: 150px;' class='text-center'>Hành Động</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include_once '../module/database.php';
            $sql = "SELECT * FROM giohang WHERE TrangThai=0";
            $params = array();
            $page_index = 1;
            $page_length = 10;
            if(isset($_GET['pid']))
              $page_index = $_GET['pid'];
            $start_index = ($page_index - 1) * $page_length;
            $sql = $sql." LIMIT {$start_index}, {$page_length}";
            $giohangs = execute_query($sql,$params);
            foreach($giohangs as $giohang){
              echo "
                <tr>
                  <td class='text-center'>{$giohang['MaGioHang']}</td>
                  <td>{$giohang['TaiKhoan']}</td>
                  <td>{$giohang['DiaChi']}</td>
                  <td class='text-center'>{$giohang['SoDienThoai']}</td>
                  <td class='text-center'>{$giohang['NgayTao']}</td>
                  <td class='text-center'>{$giohang['TongTien']}</td>
                  <td class='text-center d-flex justify-content-around align-items-center'>
                    <a class='text-dark' href='xem_chi_tiet.php?id={$giohang['MaGioHang']}'><i class='bx bx-detail' style='transform: scale(1.5);'></i></a>
                    <a class='text-dark' href='phe_duyet_gio_hang.php?id={$giohang['MaGioHang']}'><i class='bx bx-list-check' style='transform: scale(1.5);'></i></a>
                    <a class='text-dark' href='xu_ly_xoa.php?id={$giohang['MaGioHang']}'><i style='transform: scale(1.5);' class='bx bx-message-alt-x'></i></a>
                  </td>
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
      <div class="pagination d-flex justify-content-center">
        <ul class="pagination">
          <?php
            $row_number = execute_query("SELECT COUNT(*) AS dem FROM giohang")[0]['dem'];
            $page_number = (int) $row_number / $page_length;
            if($row_number % $page_length != 0)
              $page_number++;
            for($i = 1; $i <= $page_number; $i++)
              echo "<a href='quan_ly_gio_hang.php?pid={$i}' class='page-link'>{$i}</a>";  
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