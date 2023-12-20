<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include 'module/head.php';
  ?>
  <link rel='stylesheet' href='style/login.css'>
  <title>login</title>
</head>
<body style='background: linear-gradient(90deg,#fbd7e9 0%,#ffd7ab 100%);'>
  <form class='login_form p-4 bg-white' method="post" action="dang_nhap/xu_ly_dang_nhap.php">
    <div class='fw-bold fs-3 text-center my-3'>Đăng nhập</div>
    <label for="TaiKhoan" class="form-label">Tên tài khoản *</label>
    <input required='true' type="text" id="TaiKhoan" name="TaiKhoan" class="form-control mb-3 input_form">
    <label for="MatKhau" class="form-label">Mật khẩu *</label>
    <input required='true' type="password" id="MatKhau" name="MatKhau" class="form-control mb-3 input_form">
    <a style='color: #ae1c9a;' href='lay_mat_khau.php' class='text-decoration-none'>Quên mật khẩu ?</a>
    <div class='mt-3'>
      <button class='text-white login_button'>Đăng Nhập</button>
    </div>
    <div class='text-center mt-3'>
      Chưa có tài khoản ? <a href='dang_ky.php' style='color: #ae1c9a;' class='text-decoration-none'>Đăng ký ngay!</a>
    </div>
  </form>
</body>
</html>