<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';
  $param = array('MaGioHang' => $_GET['id']);
  $data = execute_query("SELECT * FROM giohang WHERE MaGioHang = :MaGioHang", $param);
  if(count($data) == 0){
    alert('Giỏ hàng không tồn tại !');
    location('quan_ly_gio_hang.php');
    return;
  }
  else{
    $MaGioHang = $_GET['id'];
    $chitietgiohangs = execute_query("SELECT * FROM chitietgiohang WHERE MaGioHang = :MaGioHang", array('MaGioHang' => $MaGioHang));
    if(count($chitietgiohangs) == 0){
      alert('Chi tiết giỏ hàng không tồn tại !');
      location('quan_ly_gio_hang.php');
      return;
    }
    else
      $chitietgiohang = $chitietgiohangs;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chi tiết giỏ hàng</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' action='phe_duyet_gio_hang.php' method='get'>  
    <div class='table_container overflow-auto mt-4'>
      <input type="hidden" name="MaGioHang" id="MaGioHang" value="<?php echo $MaGioHang ?>">
      <div class='title p-3 mb-2 border-bottom fw-bold'>Chi Tiết Giỏ Hàng</div>
      <table class='table table-striped border-top mt-2 table-bordered align-middle'>
        <thead>
          <tr>
            <th style='width: 50px; min-width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th>
            <th class='text-center' style='width: 200px; min-width: 200px;'>Hình ảnh</th>
            <th style='min-width: 250px;'>Tên sản phẩm</th>
            <th style='width: 150px; min-width: 150px' class='text-center'>Kích thước</th>
            <th style='width: 150px; min-width: 150px;' class='text-center'>Giá</th>
            <th style='width: 150px; min-width: 150px;' class='text-center'>Số lượng</th>
            <th style='width: 150px; min-width: 150px;' class='text-center'>Tổng</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include_once '../module/database.php';
            $sql = "SELECT MaCTGH, chitietgiohang.MaGioHang, chitietgiohang.MaSanPham, chitietgiohang.SoLuong, chitietgiohang.Gia, sanpham.TenSanPham, sanpham.GiaKhuyenMai, sanpham.MaKichThuoc, kichthuoc.KichThuoc, sanpham.HinhAnh, giohang.TrangThai FROM chitietgiohang INNER JOIN giohang ON giohang.MaGioHang = chitietgiohang.MaGioHang
            INNER JOIN sanpham ON sanpham.MaSanPham = chitietgiohang.MaSanPham
            INNER JOIN kichthuoc ON sanpham.MaKichThuoc = kichthuoc.MaKichThuoc
            INNER JOIN sanphamkichthuoc ON sanphamkichthuoc.MaSanPham = sanpham.MaSanPham 
            WHERE chitietgiohang.MaGioHang={$MaGioHang}";
            $loop = '1';
            $mangtong = array();
            $giohangs = execute_query($sql);
            foreach($giohangs as $giohang){
              $loop = $loop + 1;
              $tong = $giohang['GiaKhuyenMai'] * $giohang['SoLuong'];
              $mangtong[$loop] = $tong;
              echo "
                <tr>
                  <td class='text-center'>{$giohang['MaGioHang']}</td>
                  <td class='text-center'><img src='../../data/san_pham/{$giohang['HinhAnh']}' style='width: 100px; height: 100px; object-fit: contain'></td>
                  <td>{$giohang['TenSanPham']}</td>
                  <td class='text-center'>{$giohang['KichThuoc']}</td>
                  <td class='text-center'>{$giohang['GiaKhuyenMai']}</td>
                  <td class='text-center'>{$giohang['SoLuong']}</td>
                  <td class='text-center'>{$tong}</td>
                </tr>
              ";
            }
            $tonggiohang = array_sum($mangtong);
            echo "
                <td></td>
                <td><div class='title fw-bold text-primary text-center'>*Tổng tiền giỏ hàng:</div></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><div class='title fw-bold text-primary text-center'>$tonggiohang</div></td>";
          ?>
        </tbody>
      </table>
      <div class='action_container ps-3 pb-3'>
        <?php
          if($giohang['TrangThai'] == 0){
            echo "<button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href='phe_duyet_gio_hang.php?id={$giohang['MaGioHang']}'>Duyệt giỏ hàng <i class='bx bx-list-check'></i></a></button>";
          }
        ?>
        <?php
          if($giohang['TrangThai'] == 0){
            echo "<button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href='quan_ly_gio_hang.php'>Quay lại <i class='bx bx-arrow-back'></i></a></button>";
          }
          if($giohang['TrangThai'] == 1){
            echo "<button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href='danh_sach_gio_hang_da_duyet.php'>Quay lại <i class='bx bx-arrow-back'></i></a></button>";
          }
        ?>
      </div>
    </div>
  </form>
  <div class='footer'>
  </div>
  <script src='../js/sidebar.js'></script>
  <script src='../js/refresh.js'></script>
</body>
</html>