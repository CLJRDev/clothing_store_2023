<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm kích thước</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' action='xu_ly_them.php' method='post' enctype='multipart/form-data'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thêm thông tin kích thước</div>
      <div class="input-group px-3 row">
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Nhập kích thước</div>
          <input type="text" name='KichThuoc' class="form-control" id="KichThuoc" placeholder="Nhập kích thước" required="true">
        </div> 
      </div>
    </div>  
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh sách kích thước</div>
      <div class='action_container ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Thêm Mới <i class='bx bx-message-square-add'></i></button>
        <button class='button_add text-white py-2 px-3 rounded' type='reset'>Reset <i class='bx bx-message-square-add'></i></button>
      </div>       
      <table class='table table-striped border-top mt-2 table-bordered'>
        <thead>
          <tr>
            <th style='width: 50px; min-width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th>
            <th style='min-width: 150px;' class='text-center'>Kích thước</th>
            <th style='width: 150px; min-width: 150px;' class='text-center'>Hành Động</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include_once '../module/database.php';
            $sql = 'SELECT * FROM kichthuoc';
            $kichthuocs = execute_query($sql);
            foreach($kichthuocs as $kichthuoc){
              echo "
                <tr>
                  <td class='text-center'>{$kichthuoc['MaKichThuoc']}</td>
                  <td class='text-center'>{$kichthuoc['KichThuoc']}</td>
                  <td class='text-center d-flex justify-content-around align-items-center'>
                    <a class='text-dark' href='sua_kich_thuoc.php?id={$kichthuoc['MaKichThuoc']}'><i class='bx bx-pencil' style='transform: scale(1.5);'></i></a>
                    <a class='text-dark' href='xu_ly_xoa.php?id={$kichthuoc['MaKichThuoc']}'><i style='transform: scale(1.5);' class='bx bx-message-alt-x'></i></a>
                  </td>
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
    </div>
  </form>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
</body>
</html>