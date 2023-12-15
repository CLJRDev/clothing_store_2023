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
  <div class='d-flex align-items-center justify-content-between header px-3'>
    <?php
      include 'module/header.php';
    ?>  
  </div>
  <div class='product_ids' hidden>

  </div>
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
                $sql = "SELECT DISTINCT kichthuoc.KichThuoc
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
                    <img src='../data/san_pham/{$san_pham['HinhAnh']}'>
                    <div class='ms-4'>{$san_pham['TenSanPham']}</div>
                  </td>
                  <td class='text-center'>"."$"."{$san_pham['GiaKhuyenMai']}</td>
                  <td class='text-center'><input style='width: 50%;' class='text-center' type='number' min='1' max='{$san_pham['SoLuong']}' required='true'></td>
                  <td class='text-center'>
                    <select name='kich_thuoc'>";
                      foreach($kich_thuocs as $kich_thuoc){
                        echo "<option value='{$kich_thuoc['MaKichThuoc']}'>{$kich_thuoc['KichThuoc']}</option>";
                      }
                echo "</select>
                  </td>
                  <td class='text-center'>"."$"."{$san_pham['GiaKhuyenMai']}</td>
                  <td class='text-center'><button type='button' style='border: none; background-color: transparent;' class='fw-bold'>X</button></td>
                </tr>";
              }
            }              
          ?>         
          <!-- <tr>
            <td class='text-center d-flex align-items-center'>
              <img src='../data/san_pham//494b1022f3fe78b68d3f9e5a2adbff7c.webp'>
              <div class='ms-4'>Sản phẩm 1</div>
            </td>
            <td class='text-center'>1</td>
            <td class='text-center'><input style='width: 50%; border: none;' class='text-center' type='number' min='1' max='20' required='true'></td>
            <td class='text-center'>
              <select name="kich_thuoc">
                <option value="">S</option>
                <option value="">M</option>
                <option value="">L</option>
              </select>
            </td>
            <td class='text-center'>1</td>
            <td class='text-center'><button type='button' style='border: none; background-color: transparent;' class='fw-bold'>X</button></td>
          </tr>           -->
        </tbody>
      </table>
    </div>  
  </form>
  <div class='footer'>
    <?php
      include 'module/footer.php';
    ?>
  </div>  
  <script src='js/danh_muc.js'></script>
</body>
</html>