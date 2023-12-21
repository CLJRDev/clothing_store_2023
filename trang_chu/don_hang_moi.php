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
        <div class='position-relative'>
          <a style='top: -35px;' href='trang_ca_nhan.php' class='position-absolute text-dark'><i class='bx bx-arrow-back' style='transform: scale(1.5);'></i></a>
          <table class='table table-striped align-middle table-bordered'>
            <thead>
              <tr>
                <th class='text-center' style='width: 50px; min-width: 50px; transform: scale(1.5);'><i class='bx bx-key'></i></th>
                <th class='text-center' style='width: 120px; min-width: 120px;'>Người nhận</th>
                <th class='text-center' style='min-width: 150px;'>Địa chỉ</th>
                <th class='text-center' style='width: 120px; min-width: 120px;'>Điện thoại</th>
                <th class='text-center' style='width: 120px; min-width: 120px;'>Ngày tạo</th>
                <th class='text-center' style='width: 100px; min-width: 100px;'>Tổng tiền</th>
                <th class='text-center' style='width: 50px; min-width: 50px;'>Xem</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM giohang WHERE NguoiTao=:nguoi_tao AND TrangThai=0 ORDER BY MaGioHang DESC";
                $tai_khoan = $_SESSION['TenTaiKhoan'];
                $gio_hangs = execute_query($sql, array('nguoi_tao' => $tai_khoan));
                foreach($gio_hangs as $gio_hang){
                  echo "<tr>
                    <td class='text-center'>{$gio_hang['MaGioHang']}</td>
                    <td class='text-center'>{$gio_hang['TaiKhoan']}</td>
                    <td class='text-center'>{$gio_hang['DiaChi']}</td>
                    <td class='text-center'>{$gio_hang['SoDienThoai']}</td>
                    <td class='text-center'>{$gio_hang['NgayTao']}</td>
                    <td class='text-center'>{$gio_hang['TongTien']}</td>
                    <td class='text-center'><a href='xem_chi_tiet_don_hang.php?id={$gio_hang['MaGioHang']}' class='text-dark'><i style='transform: scale(1.5);' class='bx bx-message-square-detail'></i></a></td>
                  </tr>";
                }
              ?>
            </tbody>
          </table>
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