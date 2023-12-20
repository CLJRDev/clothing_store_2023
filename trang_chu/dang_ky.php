<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng Ký Tài Khoản</title>
  <?php
    include 'module/head.php';
  ?>
  <link rel='stylesheet' href='style/login.css'>
</head>
<body style='background: linear-gradient(90deg,#fbd7e9 0%,#ffd7ab 100%);'>
  <form class='register_form bg-white p-4 position-relative' method="post" action='dang_nhap/xu_ly_them_tai_khoan.php' method='post' enctype='multipart/form-data'>
    <a class='position-absolute fs-4 text-dark' href='login.php'><i class='bx bx-arrow-back'></i></a>
    <div class='fw-bold fs-3 text-center my-3'>Đăng ký tài khoản</div>
    <div class='row'>
      <div class='col-md-12'>
        <label for="" class="form-label">Tên tài khoản *</label>
        <input type="text" name='TaiKhoan' class="form-control mb-3" required="true">
      </div>
      <div class='col-md-6'>
        <label for="" class="form-label">Mật khẩu *</label>
        <input type="password" name='MatKhau' class="form-control mb-3" required="true">
      </div>
      <div class='col-md-6'>
        <label for="" class="form-label">Xác nhận mật khẩu *</label>
        <input type="password" name='XacNhanMatKhau' class="form-control mb-3" required="true">
      </div>
      <div class='col-md-6'>
        <label for="Email" class="form-label">Email *</label>
        <input type="text" name='Email' class="form-control mb-3" required="true">
      </div>
      <div class='col-md-6'>
        <label for="HinhAnh" class="form-label">Hình ảnh *</label>
        <input type="file" name='HinhAnh' class="form-control" id="inputGroupFile01 HinhAnh">
      </div>
    </div>
    <div class='my-3'>
      <button type='submit' class='text-white register_button'>Đăng Ký</button>
    </div>
  </form>
</body>
</html>