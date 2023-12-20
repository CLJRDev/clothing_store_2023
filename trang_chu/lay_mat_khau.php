<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include 'module/head.php';
  ?>
  <title>Quên mật khẩu?</title>
  <link rel='stylesheet' href='style/login.css'>
</head>
<body style='background: linear-gradient(90deg,#fbd7e9 0%,#ffd7ab 100%);'>
  <form class='reset_password_form bg-white p-4 position-relative' action='dang_nhap/xu_ly_lay_lai_mat_khau.php' method='post'>
    <a class='position-absolute fs-4 text-dark' href='login.php'><i class='bx bx-arrow-back'></i></a>
    <div class='fw-bold fs-3 text-center my-3'>Thông tin tài khoản</div>
    <label for="TaiKhoan" class="form-label">Tên tài khoản *</label>
    <input type="text" id="TaiKhoan" name="TaiKhoan" class="form-control mb-3 input_form" required="true">
    <label for="Email" class="form-label">Email *</label>
    <input type="text" id="Email" name="Email" class="form-control mb-3 input_form" required="true">
    <div class='my-3'>
      <button class='text-white login_button'>Cấp lại mật khẩu</button>
    </div>
  </form>
</body>
</html>