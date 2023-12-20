<?php
  include_once '../module/database.php';
  include '../module/kiem_tra_dang_nhap.php';
  $loaisanphams = execute_query("SELECT * FROM loaisanpham WHERE TrangThai=1");
  $hangsanxuats = execute_query("SELECT * FROM hangsanxuat WHERE TrangThai=1");
  $kichthuocs = execute_query("SELECT * FROM kichthuoc");
  $giohangs = execute_query("SELECT * FROM giohang WHERE TrangThai=1");
  $chitietgiohangs = execute_query("SELECT * FROM chitietgiohang");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thống kê doanh thu theo tháng</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' action='xu_ly_tim_kiem_theo_thang.php' method='post'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Doanh Thu</div>
      <div class="input-group px-3 row">
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Tháng</div>
          <select name="Thang" class="form-select js_select" id="inputGroupSelect01 Thang">
            <option value='-1'>Tất cả</option>
            <?php
              for($i = 1; $i<=12; ++$i){
                if(isset($_SESSION['Thang']) && $_SESSION['Thang']==$i){
                  echo "<option value='$i' selected>Tháng {$i}</option>";
                }
                else
                  echo "<option value='$i'>Tháng {$i}</option>";
              }
            ?>
          <<!-- option value='-1'>Tất cả</option>
          <option value='01'>Tháng 1</option>
          <option value='02'>Tháng 2</option>
          <option value='03'>Tháng 3</option>
          <option value='04'>Tháng 4</option>
          <option value='05'>Tháng 5</option>
          <option value='06'>Tháng 6</option>
          <option value='08'>Tháng 8</option>
          <option value='09'>Tháng 9</option>
          <option value='10'>Tháng 10</option>
          <option value='11'>Tháng 11</option>
          <option value='12'>Tháng 12</option> -->
          </select>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Năm</div>
          <select name="Nam" class="form-select js_select" id="inputGroupSelect01 Nam">
          <option value='-1'>Tất cả</option>
          <?php
            for($i = 2022; $i<=2025; ++$i){
                if(isset($_SESSION['Nam']) && $_SESSION['Nam']==$i){
                  echo "<option value='$i' selected>{$i}</option>";
                }
                else
                  echo "<option value='$i'>{$i}</option>";
              }
          ?>
          <!-- <option value='2023'>2023</option>
          <option value='2024'>2024</option>
          <option value='2025'>2025</option> -->
          </select>
        </div>
      </div>  
    </div>  
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh sách doanh thu theo tháng</div>
      <div class='action_container ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Tìm Kiếm <i class='bx bx-search' ></i></button>
        <button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href="thong_ke_hang_ton.php">Thống kê hàng tồn <i class='bx bx-data'></i></a></button>
        <button class='button_reset text-white py-2 px-3 rounded' type='button'>Reset <i class='bx bx-refresh'></i></i></button>
      </div>
      <table class='table table-striped border-top mt-2 table-bordered'>
        <thead>
          <tr>
            <!-- <th style='width: 50px; min-width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th> -->
            <th style='width: 50px; min-width: 50px;' class='text-center'>Tháng</th>
            <th style='width: 50px; min-width: 50px;' class='text-center'>Năm</th>
            <th style='width: 50px; min-width: 100px;' class='text-center'>Doanh thu</th>
            <th style='width: 50px; min-width: 100px;' class='text-center'>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT MONTH(NgayTao) AS Thang, YEAR(NgayTao) AS Nam, SUM(chitietgiohang.Gia) AS TongDoanhThu
                    FROM giohang INNER JOIN chitietgiohang ON giohang.MaGioHang = chitietgiohang.MaGioHang
                    WHERE giohang.TrangThai=1";
            $params = array();
            if(isset($_SESSION['Thang']))
              if($_SESSION['Thang'] != -1){
                $sql .= " AND MONTH(NgayTao) = :Thang";
                $params['Thang'] = $_SESSION['Thang'];
              }
            if(isset($_SESSION['Nam']))
              if($_SESSION['Nam'] != -1){
                $sql .= " AND YEAR(NgayTao) = :Nam";
                $params['Nam'] = $_SESSION['Nam'];
              }
            $page_index = 1;
            $page_length = 5;
            if(isset($_GET['pid']))
              $page_index = $_GET['pid'];
            $start_index = ($page_index - 1) * $page_length;
            $sql = $sql." GROUP BY 
                      Thang, Nam LIMIT {$start_index}, {$page_length}";
            $thangs = execute_query($sql,$params);                       
            foreach($thangs as $thang){
              echo "
                <tr>
                  <td class='text-center'>{$thang['Thang']}</td>
                  <td class='text-center'>{$thang['Nam']}</td>
                  <td class='text-center'>{$thang['TongDoanhThu']}</td>
                  <td class='text-center d-flex justify-content-around align-items-center'>
                    <a class='text-dark' href='xem_chi_tiet.php?mid={$thang['Thang']}&yid={$thang['Nam']}'><i class='bx bx-detail' style='transform: scale(1.5);'></i></a></td>
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