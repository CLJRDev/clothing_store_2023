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
  <form action='xu_ly_tim_kiem.php' method='post' class='d-flex align-items-center justify-content-between header px-3'>
    <?php
      include 'module/header.php';
    ?>
  </form>
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
                echo "<a class='text-decoration-none text-dark d-flex align-items-center py-3' href='xem_theo_hang_san_xuat.php?id={$hang_san_xuat['MaHangSanXuat']}'>
                    <img class='icon_hang_san_xuat ms-4' src='../data/hang_san_xuat/{$hang_san_xuat['HinhAnh']}'>
                  </a>
                ";
              }
            ?>
          </div>
          <div class='products'>
            <?php
              $params = array();
              $sql = "";
              if(isset($_GET['id'])){
                $ma_hang_san_xuat = $_GET['id'];
                $sql = "SELECT * FROM sanpham WHERE MaHangSanXuat=:ma_hang_san_xuat";
                $params['ma_hang_san_xuat'] = $ma_hang_san_xuat;
              }else{
                $sql = "SELECT * FROM sanpham";
              }
              $page_index = 1;
              $page_length = 9;
              if(isset($_GET['pid']))
                $page_index = $_GET['pid'];
              $page_start = ($page_index - 1) * $page_length;
              $sql .= " LIMIT {$page_start}, {$page_length}";
              $san_phams = execute_query($sql, $params);
              foreach($san_phams as $san_pham){
                echo "<div class='item bg-white overflow-hidden position-relative'>
                        <img class='product_img mb-3' src='../data/san_pham/{$san_pham['HinhAnh']}'>
                        <img class='rating_img ms-4' src='../img/rating.png'>
                        <div class='fw-bold py-1 ms-4'>{$san_pham['TenSanPham']}</div>
                        <div class='fw-bold ms-4'><span class='text-secondary text-decoration-line-through me-2'>"."$"."{$san_pham['GiaGoc']}</span> <span style='color: #ae1c9a;'>"."$"."{$san_pham['GiaKhuyenMai']}</span></div>
                        <a href='gio_hang/xu_ly_them_gio_hang.php?id={$san_pham['MaSanPham']}'><button class='position-absolute px-4 py-2 fw-bold'>Add To Cart</button></a>
                      </div>";
              }
            ?>                                    
          </div>  
        </div>           
      </div>
      <div class="pagination d-flex justify-content-center mt-3">
        <?php
          if(isset($_GET['id'])){
            $ma_hang_san_xuat = $_GET['id'];
            $row_number = execute_query("SELECT COUNT(*) AS dem FROM sanpham WHERE  MaHangSanXuat=:ma_hang_san_xuat", array('ma_hang_san_xuat' => $ma_hang_san_xuat))[0]['dem'];
            $page_number = (int) $row_number/$page_length;
            if($row_number % $page_length != 0)
              $page_number++;
            for($i = 1; $i <= $page_number; $i++){
              echo "<ul class='pagination px-1'>
                  <a href='xem_theo_hang_san_xuat.php?id={$ma_hang_san_xuat}&pid={$i}' class='page-link'>{$i}</a>         
                </ul>";
            }
          }else{
            $row_number = execute_query("SELECT COUNT(*) AS dem FROM sanpham")[0]['dem'];
            $page_number = (int) $row_number/$page_length;
            if($row_number % $page_length != 0)
              $page_number++;
            for($i = 1; $i <= $page_number; $i++){
              echo "<ul class='pagination px-1'>
                  <a href='xem_theo_hang_san_xuat.php?pid={$i}' class='page-link'>{$i}</a>         
                </ul>";
            }
          }
        ?>       
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