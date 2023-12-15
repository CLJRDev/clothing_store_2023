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
                echo "<a class='text-decoration-none text-dark d-flex align-items-center py-3' href=''>
                    <img class='icon_loai_san_pham ms-4' src='../data/loai_san_pham/{$loai_san_pham['HinhAnh']}'>
                    <div class='ms-2'>{$loai_san_pham['TenLoaiSanPham']}</div>
                  </a>
                ";
              }
            ?>
          </div>
          <div class='products'>
            <?php
              include 'products_loai_san_pham.php';
            ?>  
            <div></div>
            <div class="pagination d-flex justify-content-center">
              <ul class="pagination px-1">
                <a href='' class='page-link'>1</a>         
              </ul>
              <ul class="pagination px-1">
                <a href='' class='page-link'>1</a>         
              </ul>
              <ul class="pagination px-1">
                <a href='' class='page-link'>1</a>         
              </ul>
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
</body>
</html>