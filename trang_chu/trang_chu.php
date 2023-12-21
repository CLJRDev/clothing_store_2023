<?php
  include 'kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang chủ</title>
  <?php
    include 'module/head.php';
  ?>
</head>
<body>
  <form action='xu_ly_tim_kiem.php' method='post' style='position: fixed; z-index: 10000;' class='d-flex align-items-center justify-content-between header px-3'>
    <?php
      include 'module/header.php';
    ?>
  </form>
  <div class='body containter-fluid'>
    <div class="containter-md slideshow d-flex justify-content-center align-items-center">     
      <img class='slide_img' src="../img/slide2.jpg" alt="">      
		</div>   
    <div class='category_section pt-4 pb-3'>
      <div class='category container-md'>
        <div class='fw-bold h5'>Danh Mục</div>
        <div class='item_container'>
          <?php
            $sql = 'SELECT * FROM loaisanpham';
            $loai_san_phams = execute_query($sql);
            foreach($loai_san_phams as $loai_san_pham){
              echo "<a href='xem_theo_loai_san_pham.php?id={$loai_san_pham['MaLoaiSanPham']}' class='item text-decoration-none text-dark d-flex flex-column justify-content-center align-items-center'>
                  <img src='../data/loai_san_pham/{$loai_san_pham['HinhAnh']}'>
                  <div class='mt-3 fw-bold'>{$loai_san_pham['TenLoaiSanPham']}</div>
                </a>
              ";
            }
          ?>
        </div>
      </div>          
    </div>
    <div class='brand_section py-4'>
      <div class='brand container-md'>
        <div class='fw-bold h5'>Hãng Sản Xuất</div>
        <div class='item_container'>
          <?php
            $sql = "SELECT * FROM hangsanxuat";
            $hang_san_xuats = execute_query($sql);
            foreach($hang_san_xuats as $hang_san_xuat){
              echo "<a href='xem_theo_hang_san_xuat.php?id={$hang_san_xuat['MaHangSanXuat']}' class='item text-decoration-none bg-white d-flex justify-content-center align-items-center'>
                <img src='../data/hang_san_xuat/{$hang_san_xuat['HinhAnh']}'>
              </a>  
              ";
            }
          ?>                  
        </div>
      </div>
    </div> 
    <div class='new_arrival_section py-5'>
      <div class='new_arrival container-md'>
        <div class='fw-bold h5'>HÀNG MỚI VỀ</div>
        <div class='item_container'>          
          <?php
            $sql = "SELECT * FROM sanpham INNER JOIN sanphamkichthuoc ON sanpham.MaSanPham = sanphamkichthuoc.MaSanPham WHERE sanphamkichthuoc.SoLuong > 0 ORDER BY sanpham.MaSanPham DESC LIMIT 8";
            $hang_moi_ves = execute_query($sql);            
            foreach($hang_moi_ves as $hang_moi_ve){
              echo "<div class='item bg-white overflow-hidden position-relative'>
                      <img class='product_img mb-3' src='../data/san_pham/{$hang_moi_ve['HinhAnh']}'>
                      <img class='rating_img ms-4' src='../img/rating.png'>
                      <div class='fw-bold py-1 ms-4'>{$hang_moi_ve['TenSanPham']}</div>
                      <div class='fw-bold ms-4'><span class='text-secondary text-decoration-line-through me-2'>"."$"."{$hang_moi_ve['GiaGoc']}</span> <span style='color: #ae1c9a;'>"."$"."{$hang_moi_ve['GiaKhuyenMai']}</span></div>
                      <a href='gio_hang/xu_ly_them_gio_hang.php?id={$hang_moi_ve['MaSanPham']}'><button class='position-absolute px-4 py-2 fw-bold'>Add To Cart</button></a>
                    </div>";
            }
          ?>          
        </div>
      </div>
    </div> 
    <div class='flash_sale_section py-5'>
      <div class='flash_sale container-md'>
        <?php
          include 'module/flash_sale.php';
        ?>
        <div class='item_container'>
        <?php
          $sql = "SELECT * FROM sanpham INNER JOIN sanphamkichthuoc ON sanphamkichthuoc.MaSanPham = sanpham.MaSanPham WHERE sanphamkichthuoc.SoLuong > 0 
                  ORDER BY (GiaGoc - GiaKhuyenMai) DESC LIMIT 4";
          $flash_sales = execute_query($sql);
          foreach($flash_sales as $flash_sale){
            echo "<div class='item bg-white overflow-hidden position-relative'>
                    <div hidden id='{$flash_sale['MaSanPham']}'>{$flash_sale['MaSanPham']}</div>
                    <img class='product_img mb-3' src='../data/san_pham/{$flash_sale['HinhAnh']}'>
                    <img class='rating_img ms-4' src='../img/rating.png'>
                    <div class='fw-bold py-1 ms-4'>{$flash_sale['TenSanPham']}</div>
                    <div class='fw-bold ms-4'><span class='text-secondary text-decoration-line-through me-2'>"."$"."{$flash_sale['GiaGoc']}</span> <span style='color: #ae1c9a;'>"."$"."{$flash_sale['GiaKhuyenMai']}</span></div>
                    <a href='gio_hang/xu_ly_them_gio_hang.php?id={$flash_sale['MaSanPham']}'><button class='position-absolute px-4 py-2 fw-bold'>Add To Cart</button></a>
                  </div>";
          }
        ?>
        </div>
      </div>
    </div>
    <div class='top_selling_section py-5'>
      <div class='top_selling container-md'>
        <div class='fw-bold h5'>Sản Phẩm Bán Chạy</div>
        <div class='item_container mt-3'>
          <?php
            $sql = "SELECT * FROM sanpham INNER JOIN sanphamkichthuoc ON sanpham.MaSanPham = sanphamkichthuoc.MaSanPham 
            INNER JOIN kichthuoc ON kichthuoc.MaKichThuoc = sanpham.MaKichThuoc 
            AND kichthuoc.MaKichThuoc = sanphamkichthuoc.MaKichThuoc WHERE sanphamkichthuoc.SoLuong >0 ORDER BY SoLuong ASC LIMIT 6";
            $san_pham_ban_chays = execute_query($sql);
            foreach($san_pham_ban_chays as $san_pham_ban_chay){
              echo "<div class='item bg-white d-flex position-relative p-3'>
                      <div hidden id='{$san_pham_ban_chay['MaSanPham']}'>{$san_pham_ban_chay['MaSanPham']}</div>
                      <img class='product_img' src='../data/san_pham/{$san_pham_ban_chay['HinhAnh']}'>
                      <div class='d-flex flex-column justify-content-center'>
                        <img class='rating_img ms-3' src='../img/rating.png'>
                        <div class='fw-bold py-1 ms-3'>{$san_pham_ban_chay['TenSanPham']}</div>
                        <div class='fw-bold ms-3'><span class='text-secondary text-decoration-line-through me-2'>"."$"."{$san_pham_ban_chay['GiaGoc']}</span> <span style='color: #ae1c9a;'>"."$"."{$san_pham_ban_chay['GiaKhuyenMai']}</span></div>
                      </div>
                      <a href='gio_hang/xu_ly_them_gio_hang.php?id={$san_pham_ban_chay['MaSanPham']}'><button class='position-absolute fw-bold'>Add To Cart</button></a>
                    </div>";
            }
          ?>
        </div>
      </div>
    </div>
    <div class='other_products_section py-5'>
      <div class='other_products container-md'>
        <div class='fw-bold h5'>Sản Phẩm Khác</div>
        <div class='item_container mt-3'>
        <?php
          $sql = "SELECT * FROM sanpham INNER JOIN sanphamkichthuoc ON sanpham.MaSanPham = sanphamkichthuoc.MaSanPham WHERE sanphamkichthuoc.SoLuong > 0 ORDER BY sanpham.MaSanPham DESC LIMIT 12";
          $san_pham_khacs = execute_query($sql);            
          foreach($san_pham_khacs as $san_pham_khac){
            echo "<div class='item bg-white overflow-hidden position-relative '>
                    <div hidden id='{$san_pham_khac['MaSanPham']}'>{$san_pham_khac['MaSanPham']}</div>
                    <img class='product_img mb-3' src='../data/san_pham/{$san_pham_khac['HinhAnh']}'>
                    <img class='rating_img ms-3' src='../img/rating.png'>
                    <div style='text-wrap: nowrap; font-size: 14px;' class='fw-bold py-1 ms-3'>{$san_pham_khac['TenSanPham']}</div>
                    <div style='font-size: 14px;' class='fw-bold ms-3'><span class='text-secondary text-decoration-line-through me-2'>"."$"."{$san_pham_khac['GiaGoc']}</span> <span style='color: #ae1c9a;'>"."$"."{$san_pham_khac['GiaKhuyenMai']}</span></div>
                    <a href='gio_hang/xu_ly_them_gio_hang.php?id={$san_pham_khac['MaSanPham']}'><button class='d-flex align-items-center justify-content-center position-absolute p-2'><i class='bx bx-cart-add fs-5'></i></button></a>
                  </div>";
          }
        ?>
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
  <script src='js/countdown.js'></script>
</body>
</html>