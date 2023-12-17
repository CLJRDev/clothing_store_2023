<?php
  include 'kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xem Sản Phẩm Theo Hãng</title>
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
            <div class='fw-bold h5 ms-4'>Hãng Sản Xuất</div>
            <?php
              $sql = "SELECT * FROM hangsanxuat";
              $hang_san_xuats = execute_query($sql);
              foreach($hang_san_xuats as $hang_san_xuat){
                echo "<a class='text-decoration-none text-dark d-flex align-items-center py-3' href=''>
                    <img class='icon_hang_san_xuat ms-4' src='../data/hang_san_xuat/{$hang_san_xuat['HinhAnh']}'>
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