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
        <div class='orders_container'>
            <?php
              $don_hang_moi = execute_query("SELECT COUNT(*) FROM giohang WHERE NguoiTao=:nguoi_tao AND TrangThai=0", array('nguoi_tao' => $_SESSION['TenTaiKhoan']))[0][0];  
              $don_da_duyet = execute_query("SELECT COUNT(*) FROM giohang WHERE NguoiTao=:nguoi_tao AND TrangThai=1", array('nguoi_tao' => $_SESSION['TenTaiKhoan']))[0][0];  
            ?>
          <a class='text-decoration-none new_orders p-4' href='don_hang_moi.php'>
            <div class='bg-white p-1 d-inline-block'><i class='bx bx-cart-alt fs-1' style='color: #ae1c9a;'></i></div>
            <div class='text-dark fs-4 my-3'>Đơn hàng mới</div>
            <div class='fs-3 text-dark fw-bold'><?php echo $don_hang_moi; ?></div>
          </a>
          <a class='text-decoration-none delivery_orders p-4' href='don_da_duyet.php'>
            <div class='bg-white p-1 d-inline-block'><i class='bx bxs-package fs-1' style='color: #ae1c9a;'></i></div>
            <div class='text-dark fs-4 my-3'>Đơn đã duyệt</div>
            <div class='fs-3 text-dark fw-bold'><?php echo $don_da_duyet; ?></div>
          </a>
          <div class='profile_container p-4'>
            <div class='text-dark fw-bold fs-5 text-center'>Thông tin shop</div>
            <div class='d-flex justify-content-around mt-3'>
              <div class='left'>
                <div class='mb-1'>Tên:</div>
                <div class='mb-1'>Email:</div>
                <div class='mb-1'>Số điện thoại:</div>
                <div class='mb-1'>Thành phố:</div>
                <div class=''>Zip:</div>
              </div>
              <div class='right'>
                <div class='ms-3'>Shop thời trang</div>
                <div class='ms-3'>shopthoitrang@gmail.com</div>
                <div class='ms-3'>0865089822</div>
                <div class='ms-3'>Hải Phòng</div>
                <div class='ms-3'>3454</div>
              </div>
            </div>
          </div>
        </div>
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
</body>
</html>