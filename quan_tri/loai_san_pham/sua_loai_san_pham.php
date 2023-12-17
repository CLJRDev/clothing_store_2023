<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sửa Loại Sản Phẩm</title>
  <?php
    include '../module/head.php';
    include_once '../module/database.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
    $sql = 'SELECT * FROM loaisanpham WHERE MaLoaiSanPham=:ma_loai_san_pham';
    $params = array('ma_loai_san_pham' => $_GET['id']);
    $loai_san_pham = execute_query($sql, $params)[0];
  ?>
  <form class='body' action='xu_ly_sua.php' method='post' enctype='multipart/form-data'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Loại Sản Phẩm</div>
      <div class="input-group px-3 row">
        <div class='col-md-6'>
          <input hidden type="text" name='ma_loai_san_pham' value='<?php echo $loai_san_pham['MaLoaiSanPham']; ?>'>
          <div class='pb-3'>
            <div class='mb-1'>Tên Loại Sản Phẩm</div>
            <input type="text" name='ten_loai_san_pham' class="form-control" value='<?php echo $loai_san_pham['TenLoaiSanPham']; ?>'>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Hình Ảnh</div>
            <input type="file" name='hinh_anh' class="form-control" id="inputGroupFile01">
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Trạng Thái</div>
            <select name='trang_thai' class="form-select" id="inputGroupSelect01">
              <?php
                if($loai_san_pham['TrangThai'] == 1){
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
          <img class='img_edit' src='../../data/loai_san_pham/<?php echo $loai_san_pham['HinhAnh'];?>'>
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