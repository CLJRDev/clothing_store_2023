<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản lý người dùng</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' action='xu_ly_tim_kiem.php' method='post' enctype='multipart/form-data'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Người Dùng</div>
      <div class="input-group px-3 row">
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Tên tài khoản</div>
          <input type="text" name='TaiKhoan' class="form-control js_text" value='<?php if(isset($_SESSION['tai_khoan'])) echo $_SESSION['tai_khoan']; ?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Email</div>
          <input type="text" name='Email' class="form-control js_text" value='<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Quyền</div>
          <select name='Quyen' class="form-select js_select" id="inputGroupSelect01 Quyen">
            <?php
              $quyens = array('-1' => 'Tất cả', '0' => 'Khách hàng', '1' => 'Quản trị');
              foreach($quyens as $key => $value){
                if($_SESSION['quyen'] == $key)
                  echo "<option selected value='{$key}'>$value</option>";
                else
                  echo "<option value='{$key}'>$value</option>";
              }
            ?>
          </select> 
        </div> 
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Trạng Thái</div>
          <select name='TrangThai' class="form-select js_select" id="inputGroupSelect01 TrangThai">
            <?php
              $trang_thais = array('-1' => 'Tất cả', '0' => 'Khóa', '1' => 'Kích hoạt');
              foreach($trang_thais as $key => $value){
                if($_SESSION['trang_thai_nguoi_dung'] == $key)
                  echo "<option selected value='{$key}'>$value</option>";
                else
                  echo "<option value='{$key}'>$value</option>";
              }
            ?>
          </select> 
        </div>       
      </div>  
    </div>  
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh Sách Người Dùng</div>
      <div class='action_container ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Tìm Kiếm <i class='bx bx-search' ></i></button>
        <button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href="them_nguoi_dung.php">Thêm Mới <i class='bx bx-message-square-add'></i></a></button>
        <button class='button_reset text-white py-2 px-3 rounded' type='button'>Reset <i class='bx bx-refresh'></i></i></button>
      </div>
      <table class='table table-striped border-top mt-2 table-bordered align-middle'>
        <thead>
          <tr>
            <th style='width: 200px; min-width: 200px;' class='text-center'>Tên tài khoản</th>
            <th style='width: 150px; min-width: 150px;' class='text-center'>Hình ảnh</th>
            <th style='min-width: 150px;'>Email</th>
            <th style='width: 150px; min-width: 150px;' class='text-center'>Quyền</th>
            <th style='width: 120px; min-width: 120px;' class='text-center'>Trạng Thái</th>
            <th style='width: 120px; min-width: 120px;' class='text-center'>Hành Động</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include_once '../module/database.php';
            $sql = 'SELECT * FROM nguoidung WHERE 1=1';
            $params = array();
            if(isset($_SESSION['tai_khoan']))
              if($_SESSION['tai_khoan'] != ''){
                $sql .= " AND TaiKhoan LIKE CONCAT('%',:tai_khoan,'%')";
                $params['tai_khoan'] = $_SESSION['tai_khoan'];
              }
            if(isset($_SESSION['email']))
              if($_SESSION['email'] != ''){
                $sql .= " AND Email LIKE CONCAT('%',:email,'%')";
                $params['email'] = $_SESSION['email'];
              }
            if(isset($_SESSION['quyen']))
              if($_SESSION['quyen'] != -1){
                $sql .= " AND Quyen = :quyen";
                $params['quyen'] = $_SESSION['quyen'];
              }
            if(isset($_SESSION['trang_thai']))
              if($_SESSION['trang_thai'] != -1){
                $sql .= " AND TrangThai = :trang_thai";
                $params['trang_thai'] = $_SESSION['trang_thai'];
              }
            $page_index = 1;
            $page_length = 10;
            if(isset($_GET['pid']))
              $page_index = $_GET['pid'];
            $start_index = ($page_index - 1) * $page_length;
            $sql = $sql." LIMIT {$start_index}, {$page_length}";
            $nguoidungs = execute_query($sql,$params);
            foreach($nguoidungs as $nguoidung){
              echo "
                <tr>
                  <td class='text-center'>{$nguoidung['TaiKhoan']}</td>
                  <td class='text-center'><img src='../../data/nguoi_dung/{$nguoidung['HinhAnh']}' style='width: 100px; height: 100px; object-fit:contain'></td>
                  <td>{$nguoidung['Email']}</td>
                  <td class='text-center'>".($nguoidung['Quyen'] == 1 ? 'Quản trị' : 'Khách hàng')."</td>
                  <td class='text-center'><input onclick='return false;' type='checkbox' ".($nguoidung['TrangThai'] == 1 ? 'checked' : 'unchecked')."></td>
                  <td class='text-center'>
                    <a class='text-dark me-3' href='sua_nguoi_dung.php?id={$nguoidung['TaiKhoan']}'><i class='bx bx-pencil' style='transform: scale(1.5);'></i></a>
                    <a class='text-dark ms-3' href='xu_ly_xoa.php?id={$nguoidung['TaiKhoan']}'><i style='transform: scale(1.5);' class='bx bx-message-alt-x'></i></a>
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
            $row_number = execute_query("SELECT COUNT(*) AS dem FROM nguoidung")[0]['dem'];
            $page_number = (int) $row_number / $page_length;
            if($row_number % $page_length != 0)
              $page_number++;
            for($i = 1; $i <= $page_number; $i++)
              echo "<a href='quan_ly_nguoi_dung.php?pid={$i}' class='page-link'>{$i}</a>";  
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