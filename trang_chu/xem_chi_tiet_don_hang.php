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
  <?php
    $param = array('MaGioHang' => $_GET['id']);
    $data = execute_query("SELECT * FROM giohang WHERE MaGioHang = :MaGioHang", $param);
    if(count($data) == 0){
      alert('Đơn hàng không tồn tại !');
      location('trang_ca_nhan.php');
      return;
    }
    else{
      $MaGioHang = $_GET['id'];
      $chitietgiohangs = execute_query("SELECT * FROM chitietgiohang WHERE MaGioHang = :MaGioHang", array('MaGioHang' => $MaGioHang));
      if(count($chitietgiohangs) == 0){
        alert('Chi tiết giỏ hàng không tồn tại !');
        location('trang_ca_nhan.php');
        return;
      }
      else
        $chitietgiohang = $chitietgiohangs;
    }
  ?>
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
          <?php
            $check = execute_query("SELECT TrangThai FROM giohang WHERE MaGioHang=:ma_gio_hang", array('ma_gio_hang' => $MaGioHang))[0][0];
            if($check == 0)
              echo "<a style='top: -35px;' href='don_hang_moi.php' class='position-absolute text-dark'><i class='bx bx-arrow-back' style='transform: scale(1.5);'></i></a>";
            else
              echo "<a style='top: -35px;' href='don_da_duyet.php' class='position-absolute text-dark'><i class='bx bx-arrow-back' style='transform: scale(1.5);'></i></a>";
          ?>
          <table class='table table-striped align-middle table-bordered'>
            <thead>
              <tr>
                <th class='text-center' style='width: 50px; min-width: 50px; transform: scale(1.5);'><i class='bx bx-key'></i></th>
                <th class='text-center' style='width: 150px; min-width: 150px;'>Ảnh</th>
                <th class='text-center' style='min-width: 150px;'>Sản phẩm</th>
                <th class='text-center' style='width: 100px; min-width: 100px;'>Size</th>
                <th class='text-center' style='width: 120px; min-width: 120px;'>Giá</th>
                <th class='text-center' style='width: 120px; min-width: 120px;'>Số lượng</th>
                <th class='text-center' style='width: 120px; min-width: 120px;'>Tổng</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT MaCTGH,chitietgiohang.MaGioHang,chitietgiohang.MaSanPham,chitietgiohang.SoLuong,chitietgiohang.Gia,sanpham.TenSanPham,sanpham.GiaKhuyenMai,sanpham.MaKichThuoc,kichthuoc.KichThuoc,sanpham.HinhAnh FROM chitietgiohang INNER JOIN giohang ON giohang.MaGioHang = chitietgiohang.MaGioHang
                INNER JOIN sanpham ON sanpham.MaSanPham = chitietgiohang.MaSanPham
                INNER JOIN kichthuoc ON sanpham.MaKichThuoc = kichthuoc.MaKichThuoc
                INNER JOIN sanphamkichthuoc ON sanphamkichthuoc.MaSanPham = sanpham.MaSanPham 
                WHERE chitietgiohang.MaGioHang={$MaGioHang} ORDER BY MaCTGH DESC";
                $chitietgiohangs = execute_query($sql);
                foreach($chitietgiohangs as $chitietgiohang){
                  $tong = $chitietgiohang['Gia'] * $chitietgiohang['SoLuong'];
                  echo "<tr>
                    <td class='text-center'>{$chitietgiohang['MaCTGH']}</td>
                    <td class='text-center'><img src='../data/san_pham/{$chitietgiohang['HinhAnh']}' style='width: 100%; height: 100px; object-fit: contain'></td>
                    <td class='text-center'>{$chitietgiohang['TenSanPham']}</td>
                    <td class='text-center'>{$chitietgiohang['KichThuoc']}</td>
                    <td class='text-center'>"."$"."{$chitietgiohang['Gia']}</td>
                    <td class='text-center'>{$chitietgiohang['SoLuong']}</td>
                    <td class='text-center'>"."$"."{$tong}</td>
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