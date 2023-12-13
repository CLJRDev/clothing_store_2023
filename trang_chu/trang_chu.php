<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang chủ</title>
  <?php
    include 'module/head.php';
  ?>
</head>
<body>
  <div class='d-flex align-items-center justify-content-between header px-3'>
    <div class='d-flex'>
      <img class='logo' src="../logo2.avif">
      <button class='d-flex align-items-center ms-4 category_button'>
        <div class='d-flex align-items-center category_icon_container p-2'><i class='bx bx-menu text-white fs-4 category_icon'></i></div>      
        <div class='fs-6 text-white ps-2'>Danh mục
          <div class='category bg-white'>
            <?php
              include '../quan_tri/module/database.php';
              $sql = 'SELECT * FROM loaisanpham';
              $loai_san_phams = execute_query($sql);
              foreach($loai_san_phams as $loai_san_pham){
                echo "<a class='d-flex align-items-center px-3 py-2 text-decoration-none text-dark border-bottom' href=''>
                    <img class='p-1' src='../data/loai_san_pham/{$loai_san_pham['HinhAnh']}'>
                    <div class='ms-4'>{$loai_san_pham['TenLoaiSanPham']}</div>              
                  </a>";
              }
            ?>        
          </div>
        </div>
      </button>    
    </div>    
    <div class='search_container d-flex'>
      <input type="text" name='tu_khoa' class='form-control input_search' placeholder='Nhập từ khóa cần tìm'>
      <button class='px-3 py-2 button_search ms-2'><i class='bx bx-search' ></i></button>
    </div>
    <div class='d-flex justify-content-center align-items-center'>
      <button class='button_cart'><i style='transform: scale(2.0);' class='bx bx-cart text-white mx-5'></i></button>
      <button class='button_user'><img class='user_img' src="../user_img.png"></button>
    </div>
  </div>
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
              echo "<a href='#' class='item text-decoration-none text-dark d-flex flex-column justify-content-center align-items-center'>
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
              echo "<a class='item text-decoration-none bg-white d-flex justify-content-center align-items-center'>
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
            include 'hang_moi_ve.php';
          ?>
        </div>
      </div>
    </div> 
    <div class='flash_sale_section py-5'>
      <div class='flash_sale container-md'>
        <?php
          include 'flash_sale.php';
        ?>
      </div>
    </div>
    <div class='top_selling_section py-5'>
      <div class='top_selling container-md'>
        <div class='fw-bold h5'>Sản Phẩm Bán Chạy</div>
        <div class='item_container mt-3'>
          <?php
            include 'top_selling.php';
          ?>
        </div>
      </div>
    </div>
    <div class='other_products_section py-5'>
      <div class='other_products container-md'>
        <div class='fw-bold h5'>Sản Phẩm Khác</div>
        <div class='item_container mt-3'>
        <?php
          include 'other_products.php';
        ?>
        </div>
      </div>
    </div>
  </div>
  <div class='footer'>
    <footer class="text-center text-lg-start bg-light text-dark">
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"></section>
      <section class="">
        <div class="container text-left text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-3" style="color: #ae1c9a!important;">
            <i class="bi bi-building"></i>CongLamJr
          </h6>
          <p>
            Công ty thành lập năm 2023 
          </p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-3" style="color: #ae1c9a!important;">
            Lối tắt
          </h6>
          <div class="pb-2">
            <a href="#!" class="text-reset text-decoration-none">Loại sản phẩm</a>
          </div>
          <div class="pb-2">
            <a href="#!" class="text-reset text-decoration-none">Hãng sản xuất</a>
          </div>
          <div class="pb-2">
            <a href="#!" class="text-reset text-decoration-none">Sản phẩm mới</a>
          </div>
          <div class="pb-2">
            <a href="#!" class="text-reset text-decoration-none">Sản phẩm bán chạy</a>
          </div>
          </div>

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-3" style="color: #ae1c9a!important;">
              Dịch vụ khác
            </h6>
            <div class="pb-2">
              <a href="#!" class="text-reset text-decoration-none">Khuyến mãi</a>
            </div>
            <div class="pb-2">
              <a href="#!" class="text-reset text-decoration-none">Đổi trả</a>
            </div>
            <div class="pb-2">
              <a href="#!" class="text-reset text-decoration-none">Đặt hàng</a>
            </div>
            <div class="pb-2">
              <a href="#!" class="text-reset text-decoration-none">Trợ giúp</a>
            </div>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-5">
            <h6 class="text-uppercase fw-bold mb-3" style="color: #ae1c9a!important;">Liên lạc</h6>
            <div class="pb-2">
              <i class="bi bi-telephone-fill pr-1 text-decoration-none"></i> 0225.123.456
            </div>
            <div class="pb-2">
              <i class="bi bi-phone-fill pr-1 text-decoration-none"></i> 079.123.4567
            </div>
            <div class="pb-2">
              <i class="bi bi-envelope-fill pr-1 text-decoration-none"></i> website@gmail.com
            </div>
          </div>
        </div>
        </div>
      </section>
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2023 Copyright:
        <a class="text-reset pb-2 fw-bold text-decoration-none" href="#">CongLamJr.com</a>
      </div>
    </footer>
  </div>
  <script src='js/danh_muc.js'></script>
  <script src='js/countdown.js'></script>
</body>
</html>