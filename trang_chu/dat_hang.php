<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include 'module/head.php';
  ?>
  <title>Đặt Hàng</title>
  <link rel='stylesheet' href='style/checkout.css'>
</head>
<body>
  <div class='d-flex align-items-center justify-content-between header px-3'>
    <?php
      include 'module/header.php';
    ?>  
  </div>
  <form class='body container-fluid' action='gio_hang/xu_ly_dat_hang.php' method='post'>
    <?php
      $cartItems = $_SESSION['cartItems'];
      $ids = array();
      foreach($cartItems as $cartItem)
        array_push($ids, $cartItem);
      $so_luongs = array();
      $kich_thuocs = array();
      foreach($ids as $id){
        echo "<input hidden value='{$_POST['so_luong_'.$id]}' name='so_luong_{$id}'>";
        echo "<input hidden value='{$_POST['kich_thuoc_'.$id]}' name='kich_thuoc_{$id}'>";
        array_push($so_luongs, $_POST['so_luong_'.$id]);
        array_push($kich_thuocs, $_POST['kich_thuoc_'.$id]);
      }
    ?>
    <div class='container-md py-5'>
      <div class='text-center h4 fw-bold mb-4' style='color: #ae1c9a;'>Đặt Hàng</div>
      <div class='d-flex justify-content-around'>
        <div class='p-3 detail position-relative'>
          <a class='position-absolute fs-5' href='gio_hang.php' style='color: #ae1c9a;'><i class='bx bx-arrow-back'></i></a>
          <div class='fw-bold fs-5 text-center mb-3 title'>Thông tin giao hàng</div>
          <div>Tên người đặt *</div>
          <input type="text" name='ten_nguoi_dat' class='form-control mb-3' required='true'>
          <div>Số điện thoại *</div>
          <input type="text" name='so_dien_thoai' class='form-control mb-3' required='true'>
          <div>Tỉnh / Thành phố *</div>
          <input type="text" name='tinh_thanh_pho' class='form-control mb-3' required='true'>
          <div>Thành phố / Quận / Huyện *</div>
          <input type="text" name='thanh_pho_quan_huyen' class='form-control mb-3' required='true'>
          <div>Địa chỉ *</div>
          <input type="text" name='dia_chi' class='form-control mb-3' required='true'>
        </div>
        <div class='p-3 summary'>
          <div class='fw-bold fs-5 text-center mb-3 title'>Tóm tắt đơn hàng</div>
          <?php
            $tong_tien = 0;
            for($i=0;$i<count($ids);$i++){
              $san_pham = execute_query("SELECT * FROM sanpham WHERE MaSanPham=:ma_san_pham", array('ma_san_pham' => $ids[$i]))[0];
              $kich_thuoc = execute_query("SELECT * FROM kichthuoc WHERE MaKichThuoc=:ma_kich_thuoc", array('ma_kich_thuoc' => $kich_thuocs[$i]))[0];
              $so_luong = $so_luongs[$i];
              $gia = $san_pham['GiaKhuyenMai'];
              $tien = $so_luong * $gia;
              $tong_tien += $tien;
              echo "<div class='border-bottom d-flex justify-content-between px-3 mb-3'>
                      <div>
                        <div class=''>{$san_pham['TenSanPham']} X{$so_luong}</div>
                        <div class='fw-light'>Size {$kich_thuoc['KichThuoc']}</div>
                      </div>
                      <div>$".$tien."</div>
                    </div>";
            }
          ?>
          <div class='d-flex justify-content-between align-items-center px-3'>
            <div class='fw-bold fs-5'>Total:</div>
            <div class='total_price fw-bold'>$<?php echo $tong_tien; ?></div>
            <input hidden type="text" name='tong_tien' value='<?php echo $tong_tien; ?>'>
          </div>
          <div class='px-3 mb-3'>
            <button type='submit' class='place_order_button text-white mt-3'>Đặt Hàng Ngay</button>
          </div>
        </div>
      </div>
    </div> 
  </form>
  <div class='footer'>
    <?php
      include 'module/footer.php';
    ?>
  </div>  
  <script src='js/danh_muc.js'></script>
  <script src='js/cart.js'></script>
</body>
</html>