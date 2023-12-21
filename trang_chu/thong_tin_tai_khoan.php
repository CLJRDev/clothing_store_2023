<?php
  include 'kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang cá nhân</title>
  <?php
    include 'module/head.php';
  ?>
  <link rel='stylesheet' href='style/profile.css'>
</head>
<body>
  <form action='xu_ly_tim_kiem.php' method='post' class='d-flex align-items-center justify-content-between header px-3'>
    <?php
      include 'module/header.php';
    ?>
  </form>
  <div class='body container-fluid'>
    <div class='container-md py-5'>
      <div class='title text-center fw-bold fs-4 mb-3' style='color: #ae1c9a;'>Trang cá nhân</div>
      <div class='content_container p-5 bg-white'>
        <div class='dashboard d-flex flex-column'>
          <div class='fw-bold fs-5 mb-2'>Dashboard</div>
          <a href='trang_ca_nhan.php' class='my-2 text-decoration-none'><i class='bx bxs-dashboard me-2'></i> Đơn hàng</a>
          <a href='thong_tin_tai_khoan.php' class='my-2 text-decoration-none'><i class='bx bx-user me-2'></i> Thông tin tài khoản</a>
          <a href='dang_nhap/xu_ly_dang_xuat.php' class='my-2 text-decoration-none'><i class='bx bx-log-out-circle me-2' ></i> Đăng xuất</a>
        </div>
        <form action='xu_ly_sua_tai_khoan.php' method='post' class='row' enctype='multipart/form-data'>
          <?php
            $sql = "SELECT * FROM nguoidung WHERE TaiKhoan=:tai_khoan";
            $tai_khoan = $_SESSION['TenTaiKhoan'];
            $nguoi_dung = execute_query($sql, array('tai_khoan'=>$tai_khoan))[0];
          ?>
          <div class='col-md-6'>
            <label for="TaiKhoan" class="form-label">Tên tài khoản</label>
            <input value='<?php echo $nguoi_dung['TaiKhoan']; ?>' readonly type="text" id="TaiKhoan" name="TaiKhoan" class="form-control mb-3 input_form">
            <label for="MatKhau" class="form-label">Mật khẩu</label>
            <input value='' type="password" id="MatKhau" name="MatKhau" class="form-control mb-3 input_form">      
            <label for="XacNhanMatKhau" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" id="XacNhanMatKhau" name="XacNhanMatKhau" class="form-control mb-3 input_form">              
            <label for="Email" class="form-label">Email</label>
            <input value='<?php echo $nguoi_dung['Email']; ?>' type="text" id="Email" name="Email" class="form-control mb-3 input_form">              
            <label for="HinhAnh" class="form-label">Hình ảnh</label>
            <input type="file" id="HinhAnh" name="HinhAnh" class="form-control mb-3 input_form">
          </div>
          <div class='col-md-6 d-flex justify-content-center align-items-center'>
            <img id='user_img' style='width: 80%; height: 80%; object-fit: cover;' class='rounded img-thumbnail' src="../data/nguoi_dung/<?php echo $nguoi_dung['HinhAnh']; ?>">
          </div>
          <div class='col-md-12'>
            <button class='update_button' type='submit'>Sửa đổi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class='footer'>
    <?php
      include 'module/footer.php';
    ?>
  </div>
  <script src='js/danh_muc.js'></script>
  <script src='js/cart.js'></script>
  <script src='js/user.js'></script>
</body>
</html>