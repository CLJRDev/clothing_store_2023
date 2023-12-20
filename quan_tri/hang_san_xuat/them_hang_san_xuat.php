<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm hãng sản xuất</title>
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
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Hãng Sản Xuất</div>
      <div class="input-group px-3 row">
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Tên Hãng Sản Xuất</div>
          <input type="text" name='TenHangSanXuat' class="form-control" id="TenHangSanXuat" required="true">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Hình Ảnh</div>
          <input type="file" name='HinhAnh' class="form-control" id="inputGroupFile01 HinhAnh">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Trạng Thái</div>
          <select name='TrangThai' class="form-select" id="inputGroupSelect01 TrangThai">
            <option value="1">Kích hoạt</option>
            <option value="0">Khóa</option>
          </select> 
        </div> 
      </div>
    </div>  
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh sách hãng sản xuất</div>
      <div class='action_container ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Thêm Mới <i class='bx bx-message-square-add'></i></button>
        <button class='button_add text-white py-2 px-3 rounded' type='reset'>Reset <i class='bx bx-refresh'></i></button>
      </div>   
      <table class='table table-striped border-top mt-2 table-bordered align-middle'>
        <thead>
          <tr>
          <th style='width: 50px; min-width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th>
            <th class='text-center' style='min-width: 200px; width: 200px;'>Logo</th>  
            <th style='min-width: 200px;' class='text-center'>Tên Hãng Sản Xuất</th>      
            <th style='width: 150px; min-width: 150px;' class='text-center'>Trạng Thái</th>
            <th style='width: 120px; min-width: 120px;' class='text-center'>Hành Động</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include_once '../module/database.php';
            $sql = 'SELECT * FROM hangsanxuat';
            $hangsanxuats = execute_query($sql);
            foreach($hangsanxuats as $hangsanxuat){
              echo "
                <tr>
                  <td class='text-center'>{$hangsanxuat['MaHangSanXuat']}</td>
                  <td class='text-center'><img src='../../data/hang_san_xuat/{$hangsanxuat['HinhAnh']}' style='width: 100px; height: 80px; object-fit:contain'></td>
                  <td class='text-center'>{$hangsanxuat['TenHangSanXuat']}</td>
                  <td class='text-center'><input onclick='return false;' type='checkbox' ".($hangsanxuat['TrangThai'] == 1 ? 'checked' : '')."></td>
                  <td class='text-center'>
                    <a class='text-dark me-3' href='sua_hang_san_xuat.php?id={$hangsanxuat['MaHangSanXuat']}'><i class='bx bx-pencil' style='transform: scale(1.5);'></i></a>
                    <a class='text-dark ms-3' href='xu_ly_xoa.php?id={$hangsanxuat['MaHangSanXuat']}'><i style='transform: scale(1.5);' class='bx bx-message-alt-x'></i></a>
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