<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm người dùng</title>
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
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Người Dùng</div>
      <div class="input-group px-3 row">
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Tên tài khoản</div>
          <input type="text" name='TaiKhoan' class="form-control" id="TaiKhoan" required="true">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Mật khẩu</div>
          <input type="password" name='MatKhau' class="form-control" id="MatKhau" required="true">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Xác nhận mật khẩu</div>
          <input type="password" name='XacNhanMatKhau' class="form-control" id="XacNhanMatKhau" required="true">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Email</div>
          <input type="text" name='Email' class="form-control" id="Email" required="true">
        </div>  
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Hình Ảnh</div>
          <input type="file" name='HinhAnh' class="form-control" id="inputGroupFile01 HinhAnh">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Quyền</div>
          <select name='Quyen' class="form-select" id="inputGroupSelect01 Quyen">
            <option value="1">Quản trị</option>
            <option value="0">Khách hàng</option>
          </select> 
        </div> 
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Trạng Thái</div>
          <select name='TrangThai' class="form-select" id="inputGroupSelect01 TrangThai">
            <option value="1">Kích hoạt</option>
            <option value="0">Khóa</option>
          </select> 
        </div>       
      </div>
      <div class='action_container ps-3 pb-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Thêm Mới <i class='bx bx-message-square-add'></i></button>
        <button class='button_reset text-white py-2 px-3 rounded' type='button'>Reset <i class='bx bx-refresh'></i></button>
      </div>  
    </div>
  </form>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
</body>
</html>