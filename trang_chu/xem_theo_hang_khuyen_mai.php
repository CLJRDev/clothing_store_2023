<?php
  include 'kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xem Sản Phẩm Flash Sale</title>
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
  <div class='body containter-fluid' style='background-color: rgba(174, 28, 154, 0.08);'>
    <div class='container-md py-5'>
      <div class='fw-bold h5'>SẢN PHẨM FLASH SALE</div>
      <div class='products_container'>
        <?php
          include 'products_moi_ve.php';
        ?>             
      </div>
      <div class="pagination d-flex justify-content-center mt-3">
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
  <div class='footer'>
    <?php
      include 'module/footer.php';
    ?>
  </div>
  <script src='js/danh_muc.js'></script>
</body>
</html>