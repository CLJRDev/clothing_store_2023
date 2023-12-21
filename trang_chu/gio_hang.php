<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include 'module/head.php';
  ?>
  <title>Giỏ hàng</title>
  <link rel='stylesheet' href='style/cart.css'>
</head>
<body>
  <form action='xu_ly_tim_kiem.php' method='post' class='d-flex align-items-center justify-content-between header px-3'>
    <?php
      include 'module/header.php';
    ?>
  </form>
  <form class='body container-fluid' action='dat_hang.php' method='post'>
    <div class='container-md py-5'>
      <div class='text-center h4 fw-bold mb-4' style='color: #ae1c9a;'>Giỏ Hàng</div>
      <table class='table table-striped align-middle fw-bold table-bordered'>
        <thead>
          <tr>
            <th class='text-center' style='min-width: 200px;'>SẢN PHẨM</th>
            <th class='text-center' style='min-width: 150px; width: 150px;'>GIÁ</th>
            <th class='text-center' style='min-width: 200px; width: 200px;'>SỐ LƯỢNG</th>
            <th class='text-center' style='min-width: 200px; width: 200px;'>KÍCH THƯỚC</th>
            <th class='text-center' style='min-width: 200px; width: 200px;'>TỔNG TIỀN</th>
            <th class='text-center' style='min-width: 150px; width: 150px;'>HÀNH ĐỘNG</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include '../quan_tri/module/thong_bao.php';
            if(isset($_SESSION['cartItems'])){
              $san_pham_ids = $_SESSION['cartItems'];
              foreach($san_pham_ids as $id){
                $sql = "SELECT * FROM sanpham 
                        INNER JOIN kichthuoc ON sanpham.MaKichThuoc = kichthuoc.MaKichThuoc
                        INNER JOIN sanphamkichthuoc ON sanphamkichthuoc.MaSanPham = sanpham.MaSanPham 
                        WHERE sanpham.MaSanPham=:ma_san_pham";
                $san_pham = execute_query($sql, array('ma_san_pham'=>$id))[0];
                $sql = "SELECT DISTINCT kichthuoc.KichThuoc,sanpham.MaKichThuoc
                        FROM sanpham
                        INNER JOIN sanphamkichthuoc ON sanpham.MaSanPham = sanphamkichthuoc.MaSanPham
                        INNER JOIN kichthuoc ON sanphamkichthuoc.MaKichThuoc = kichthuoc.MaKichThuoc WHERE sanpham.TenSanPham=:ten_san_pham";
                $kich_thuocs = execute_query($sql, array('ten_san_pham'=>$san_pham['TenSanPham']));
                $sql = "SELECT sanphamkichthuoc.SoLuong FROM sanpham 
                        INNER JOIN kichthuoc ON sanpham.MaKichThuoc = kichthuoc.MaKichThuoc
                        INNER JOIN sanphamkichthuoc ON sanphamkichthuoc.MaSanPham = sanpham.MaSanPham
                        WHERE sanpham.MaSanPham = :ma_san_pham";
                $so_luong = execute_query($sql, array('ma_san_pham'=>$id));
                echo "<tr>
                  <td class='text-center d-flex align-items-center'>
                    <input hidden name='san_pham_{$id}' value='{$id}'>
                    <img src='../data/san_pham/{$san_pham['HinhAnh']}'>
                    <div class='ms-4'>{$san_pham['TenSanPham']}</div>
                  </td>
                  <td class='text-center'>"."$"."{$san_pham['GiaKhuyenMai']}</td>
                  <td class='text-center'>
                    <input style='width: 50%;' data-id='{$id}' data-price='{$san_pham['GiaKhuyenMai']}' class='text-center so_luong_input' type='number' name='so_luong_{$id}' min='1' max='{$san_pham['SoLuong']}' value='1' required='true'>
                  </td>
                  <td class='text-center'>
                    <select name='kich_thuoc_{$id}'>";
                      foreach($kich_thuocs as $kich_thuoc){
                        echo "<option value='{$kich_thuoc['MaKichThuoc']}'>{$kich_thuoc['KichThuoc']}</option>";
                      }
                echo "</select>
                  </td>
                  <td class='text-center total_price' id='tong_tien_{$id}'>"."$"."{$san_pham['GiaKhuyenMai']}</td>
                  <td class='text-center'>
                    <a href='gio_hang/xu_ly_xoa_san_pham.php?id={$id}' class='text-decoration-none text-dark' class='fw-bold'><i class='bx bx-x-circle' style='transform: scale(1.5);'></i></a>
                  </td>
                </tr>";
              }
            }              
          ?>         
        </tbody>
      </table>
      <div class='d-flex justify-content-center'>
        <?php
          if(isset($_SESSION['cartItems']))
            echo "<button type='submit' style='background-color: #ae1c9a;' class='checkout_button text-white px-4'></button>";
          else
            echo "<button type='button' style='background-color: #ae1c9a;' class='checkout_button text-white px-4'></button>";
        ?>
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