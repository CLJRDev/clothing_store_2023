<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sửa hãng sản xuất</title>
  <?php
    include '../module/head.php';
    include_once '../module/database.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
    $sql = 'SELECT * FROM hangsanxuat WHERE MaHangSanXuat=:MaHangSanXuat';
    $params = array('MaHangSanXuat' => $_GET['id']);
    $hangsanxuat = execute_query($sql, $params)[0];
  ?>
  <form class='body' action='xu_ly_sua.php' method='post' enctype='multipart/form-data'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Hãng Sản Xuất</div>
      <div class="input-group px-3 row">
        <div class='col-md-6'>
          <input hidden type="text" name='MaHangSanXuat' value='<?php echo $hangsanxuat['MaHangSanXuat']; ?>'>
          <div class='pb-3'>
            <div class='mb-1'>Tên Hãng Sản Xuất</div>
            <input type="text" name='TenHangSanXuat' class="form-control" value='<?php echo $hangsanxuat['TenHangSanXuat']; ?>'>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Hình Ảnh</div>
            <input type="file" name='HinhAnh' class="form-control" id="inputGroupFile01">
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Trạng Thái</div>
            <select name='TrangThai' class="form-select" id="inputGroupSelect01">
              <?php
                if($hangsanxuat['TrangThai'] == 1){
                  echo '<option value="1" selected>Kích hoạt</option>';
                  echo '<option value="0">Khóa</option>';
                }
                else{
                  echo '<option value="1">Kích hoạt</option>';
                  echo '<option value="0" selected>Khóa</option>';
                }
              ?>
            </select>
          </div>
        </div>  
        <div class='col-md-6 d-flex justify-content-center align-items-center'>
          <img class='img_edit' src='../../data/hang_san_xuat/<?php echo $hangsanxuat['HinhAnh'];?>'>
        </div>       
      </div>  
      <div class='action_container ps-3 pb-3'>
        <button class='button_edit text-white py-2 px-3 rounded' type='submit'>Sửa Đổi <i class='bx bx-message-square-add'></i></button>
      </div>    
    </div>
  </form>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
</body>
</html>