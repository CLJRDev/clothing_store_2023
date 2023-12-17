<?php
  include 'kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xem Sản Phẩm Theo Loại</title>
  <?php
    include 'module/head.php';
  ?>
</head>
<body>
  <div class='d-flex align-items-center justify-content-between header px-3'>
    <?php
      include 'module/header.php';
    ?>  
  </div>
  <div class='body containter-fluid'>
    <div class='display_section py-5'>
      <div class='container-md'>
        <div class='display'>
          <div class='sidebar bg-white pt-4 d-flex flex-column overflow-hidden'>
            <div class='fw-bold h5 ms-4'>Loại Sản Phẩm</div>
            <?php
              $sql = "SELECT * FROM loaisanpham";
              $loai_san_phams = execute_query($sql);
              foreach($loai_san_phams as $loai_san_pham){
                echo "<a class='text-decoration-none text-dark d-flex align-items-center py-3' href='xem_theo_loai_san_pham.php?id={$loai_san_pham['MaLoaiSanPham']}'>
                    <img class='icon_loai_san_pham ms-4' src='../data/loai_san_pham/{$loai_san_pham['HinhAnh']}'>
                    <div class='ms-2'>{$loai_san_pham['TenLoaiSanPham']}</div>
                  </a>
                ";
              }
            ?>
          </div>
          <div class='products'>
            <?php
              if(isset($_GET['id'])){
                $ma_loai_san_pham = $_GET['id'];
                $san_phams = execute_query("SELECT * FROM sanpham WHERE MaLoaiSanPham=:ma_loai_san_pham LIMIT 9", array('ma_loai_san_pham' => $ma_loai_san_pham));
              }else{
                $san_phams = execute_query("SELECT * FROM sanpham LIMIT 9");
              }
              foreach($san_phams as $san_pham){
                echo "<div class='item bg-white overflow-hidden position-relative'>
                        <img class='product_img mb-3' src='../data/san_pham/{$san_pham['HinhAnh']}'>
                        <img class='rating_img ms-4' src='../img/rating.png'>
                        <div class='fw-bold py-1 ms-4'>{$san_pham['TenSanPham']}</div>
                        <div class='fw-bold ms-4'><span class='text-secondary text-decoration-line-through me-2'>"."$"."{$san_pham['GiaGoc']}</span> <span style='color: #ae1c9a;'>"."$"."{$san_pham['GiaKhuyenMai']}</span></div>
                        <button class='position-absolute px-4 py-2 fw-bold'>Add To Cart</button>
                      </div>";
              }
            ?>                                    
          </div>  
        </div>           
      </div>
      <div class="pagination d-flex justify-content-center mt-4">
        <?php
        
        ?>       
        <ul class="pagination px-1">
          <a href='' class='page-link'>1</a>         
        </ul>
      </div> 
    </div>
  </div>
  <div class='footer'>
    <?php
      include 'module/footer.php';
    ?>
  </div>
  <script src='js/danh_muc.js'></script>
</body>
</html>