<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include 'module/head.php';
  ?>
  <link rel='stylesheet' href='style/login.css'>
  <title>Document</title>
</head>
<body>
  <div class='d-flex align-items-center justify-content-between header px-3'>
    <?php
      include 'module/header.php';
    ?>
  </div>
  <section class="login footer-padding">
    <form method="post" action="xu_ly_dang_nhap.php">
      <div class="container">
        <div class="login-section">
          <div class="review-form">
          <h5 class="comment-title">ĐĂNG NHẬP</h5>
          <div class="review-inner-form ">
          <div class="review-form-name">
          <label for="TaiKhoan" class="form-label">Tên tài khoản</label>
          <input type="text" id="TaiKhoan" name="TaiKhoan" class="form-control">
          </div>
          <div class="review-form-name">
          <label for="MatKhau" class="form-label">Mật khẩu</label>
          <input type="password" id="MatKhau" name="MatKhau" class="form-control">
          </div>
          <div class="review-form-name checkbox">
          <div class="forget-pass">
          <p style="text-align: center;"><a href="../form_cap_mat_khau_moi_qua_email.php" style="color: purple;">Quên mật khẩu?</a></p>
          </div>
          </div>
          </div>
          <div class="login-btn text-center">
          <button type="submit" class="shop-btn btn btn-primary">Đăng nhập</button>
          <span class="shop-account">Chưa có tài khoản ?<a href="">Đăng ký ngay!
          </a></span>
          </div>
        </div>
        </div>
      </div>
    </form>
  </section>
  <div class='footer'>
    <?php
      include 'module/footer.php';
    ?>
  </div>
  <script scr='js/danh_muc.js'></script>
</body>
</html>