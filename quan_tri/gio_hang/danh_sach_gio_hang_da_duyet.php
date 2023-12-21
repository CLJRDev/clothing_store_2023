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
  <form class='body' method='post' action='xu_ly_tim_kiem_gio_hang_da_duyet.php' enctype='multipart/form-data'>
    <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Sản Phẩm</div>
      <div class="input-group px-3 row">
        <div class='col-md-12 pb-3'>
          <div class='mb-1'>Tên tài khoản đặt hàng</div>
          <input type="text" name='TaiKhoan' class="form-control js_text" value='<?php if(isset($_SESSION['TaiKhoan'])) echo $_SESSION['TaiKhoan'];?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Địa chỉ</div>
          <input type="text" name='DiaChi' class="form-control js_text" value='<?php if(isset($_SESSION['DiaChi'])) echo $_SESSION['DiaChi'];?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Số điện thoại</div>
          <input type="number" name='SoDienThoai' class="form-control js_text" value='<?php if(isset($_SESSION['SoDienThoai'])) echo $_SESSION['SoDienThoai'];?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Tổng tiền từ</div>
          <input type="number" name='TongTienTu' class="form-control js_text" value='<?php if(isset($_SESSION['TongTienTu'])) echo $_SESSION['TongTienTu']; ?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Đến tổng tiền</div>
          <input type="number" name='TongTienDen' class="form-control js_text" value='<?php if(isset($_SESSION['TongTienDen'])) echo $_SESSION['TongTienDen']; ?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Ngày tạo từ</div>
          <input type="date" name='NgayTaoTu' class="form-control js_text" value='<?php if(isset($_SESSION['NgayTaoTu'])) echo $_SESSION['NgayTaoTu']; ?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Ngày tạo đến</div>
          <input type="date" name='NgayTaoDen' class="form-control js_text" value='<?php if(isset($_SESSION['NgayTaoDen'])) echo $_SESSION['NgayTaoDen']; ?>'>
        </div>      
      </div>   
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh Sách Giỏ Hàng Đã Được Phê Duyệt</div>
      <div class='action_container ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Tìm Kiếm <i class='bx bx-search' ></i></button>
        <button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href='quan_ly_gio_hang.php'>Giỏ hàng chờ duyệt <i class='bx bx-coin-stack'></i></a></button>
        <button class='button_reset text-white py-2 px-3 rounded' type='button'>Reset <i class='bx bx-refresh'></i></i></button>
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
            $sql = "SELECT * FROM giohang WHERE TrangThai=1";
            $params = array();
            if(isset($_SESSION['TaiKhoan']))
              if($_SESSION['TaiKhoan'] != ''){
                $sql .= " AND TaiKhoan LIKE CONCAT('%',:TaiKhoan,'%')";
                $params['TaiKhoan'] = $_SESSION['TaiKhoan'];
              }
            if(isset($_SESSION['DiaChi']))
              if($_SESSION['DiaChi'] != ''){
                $sql .= " AND DiaChi LIKE CONCAT('%',:DiaChi,'%')";
                $params['DiaChi'] = $_SESSION['DiaChi'];
              }
            if(isset($_SESSION['SoDienThoai']))
              if($_SESSION['SoDienThoai'] != ''){
                $sql .= " AND SoDienThoai LIKE CONCAT('%',:SoDienThoai,'%')";
                $params['SoDienThoai'] = $_SESSION['SoDienThoai'];
              }
            if(isset($_SESSION['TongTienTu']))
              if($_SESSION['TongTienTu'] != ''){
                $sql .= " AND TongTien >= :TongTienTu";
                $params['TongTienTu'] = $_SESSION['TongTienTu'];
              }
            if(isset($_SESSION['TongTienDen']))
              if($_SESSION['TongTienDen'] != ''){
                $sql .= " AND TongTien <= :TongTienDen";
                $params['TongTienDen'] = $_SESSION['TongTienDen'];
              }
            if(isset($_SESSION['NgayTaoTu']))
              if($_SESSION['NgayTaoTu'] != ''){
                $sql .= " AND DATE(NgayTao) >= DATE(:NgayTaoTu)";
                $params['NgayTaoTu'] = $_SESSION['NgayTaoTu'];
              }
            if(isset($_SESSION['NgayTaoDen']))
              if($_SESSION['NgayTaoDen'] != ''){
                $sql .= " AND DATE(NgayTao) <= DATE(:NgayTaoDen)";
                $params['NgayTaoDen'] = $_SESSION['NgayTaoDen'];
              }
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
              echo "<a href='danh_sach_gio_hang_da_duyet.php?pid={$i}' class='page-link'>{$i}</a>";  
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