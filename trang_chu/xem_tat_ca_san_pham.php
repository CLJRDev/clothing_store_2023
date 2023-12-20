<?php
  include 'kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xem Tất Cả Sản Phẩm</title>
  <?php
    include 'module/head.php';
  ?>
</head>
<body>
  <form action='xu_ly_tim_kiem.php' method='post' class='d-flex align-items-center justify-content-between header px-3'>
    <?php
      include 'module/header.php';
    ?>
  </form>
  <div class='body containter-fluid' style='background-color: rgba(174, 28, 154, 0.08);'>
    <div class='container-md py-5 all_products'>
      <div class='fw-bold h5'>TẤT CẢ SẢN PHẨM</div>
      <div class='item_container'>
        <?php
          $sql = "SELECT * FROM sanpham WHERE 1=1";
          $params = array();
          if(isset($_GET['ten_san_pham'])){
            $ten_san_pham = $_GET['ten_san_pham'];
            if($ten_san_pham != ''){
              $sql .= " AND TenSanPham LIKE CONCAT('%',:ten_san_pham,'%')";
              $params['ten_san_pham'] = $ten_san_pham;
            }
          }
          $page_index = 1;
          $page_length = 12;
          if(isset($_GET['pid']))
            $page_index = $_GET['pid'];
          $start_index = ($page_index - 1) * $page_length;
          $sql = $sql." LIMIT {$start_index}, {$page_length}";
          $san_phams = execute_query($sql,$params);
          foreach($san_phams as $san_pham){
            echo "<div class='item bg-white d-flex position-relative p-3'>
                    <img class='product_img' src='../data/san_pham/{$san_pham['HinhAnh']}'>
                    <div class='d-flex flex-column justify-content-center'>
                      <img class='rating_img ms-3' src='../img/rating.png'>
                      <div class='fw-bold py-1 ms-3'>{$san_pham['TenSanPham']}</div>
                      <div class='fw-bold ms-3'><span class='text-secondary text-decoration-line-through me-2'>"."$"."{$san_pham['GiaGoc']}</span> <span style='color: #ae1c9a;'>"."$"."{$san_pham['GiaKhuyenMai']}</span></div>
                    </div>
                    <a href='gio_hang/xu_ly_them_gio_hang.php?id={$san_pham['MaSanPham']}'><button class='position-absolute fw-bold'>Add To Cart</button></a>
                  </div>";
          }
        ?>         
      </div>
      <div class="pagination d-flex justify-content-center mt-3">
        <ul class="pagination px-1">
          <?php
            if(isset($_GET['ten_san_pham'])){
              $ten_san_pham = $_GET['ten_san_pham'];
              if($ten_san_pham != ''){
                $row_number = execute_query("SELECT COUNT(*) AS dem FROM sanpham WHERE TenSanPham LIKE CONCAT('%',:ten_san_pham,'%')", array('ten_san_pham' => $ten_san_pham))[0]['dem'];
              }
            }else{
              $row_number = execute_query("SELECT COUNT(*) AS dem FROM sanpham")[0]['dem'];
            }
            $page_number = (int) $row_number / $page_length;
            if($row_number % $page_length != 0)
              $page_number++;
            for($i = 1; $i <= $page_number; $i++){
              if(isset($_GET['ten_san_pham'])){
                $ten_san_pham = $_GET['ten_san_pham'];
                if($ten_san_pham != ''){
                  echo "<a href='xem_tat_ca_san_pham.php?ten_san_pham={$ten_san_pham}&pid={$i}' class='page-link'>{$i}</a>";  
                }
              }else{
                echo "<a href='xem_tat_ca_san_pham.php?pid={$i}' class='page-link'>{$i}</a>";  
              }
            }
          ?>          
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