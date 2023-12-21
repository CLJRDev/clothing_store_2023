<div class='d-flex'>
  <img class='logo' src="../img/logo2.avif">
  <button type='button' class='d-flex align-items-center ms-4 category_button'>
    <div class='d-flex align-items-center category_icon_container p-2'><i class='bx bx-menu text-white fs-4 category_icon'></i></div>      
    <div class='fs-6 text-white ps-2'>Danh mục
      <div class='category bg-white' style='z-index: 1000;'>
        <a class='d-flex align-items-center px-3 py-2 text-decoration-none text-dark border-bottom' href='trang_chu.php'>
          <i style='color: #ae1c9a; transform: scale(1.5);' class='bx bx-home-alt-2'></i>
          <div class='ms-4'>Trang Chủ</div>              
        </a>
        <a class='d-flex align-items-center px-3 py-2 text-decoration-none text-dark border-bottom' href='xem_theo_loai_san_pham.php'>
          <i style='color: #ae1c9a; transform: scale(1.5);' class='bx bxl-react'></i>
          <div class='ms-4'>Loại Sản Phẩm</div>              
        </a>
        <a class='d-flex align-items-center px-3 py-2 text-decoration-none text-dark border-bottom' href='xem_theo_hang_san_xuat.php'>
          <i style='color: #ae1c9a; transform: scale(1.5);' class='bx bxl-apple'></i>
          <div class='ms-4'>Hãng Sản Xuất</div>              
        </a>
        <a class='d-flex align-items-center px-3 py-2 text-decoration-none text-dark border-bottom' href='xem_theo_hang_khuyen_mai.php'>
          <i style='color: #ae1c9a; transform: scale(1.5);' class='bx bxl-shopify'></i>
          <div class='ms-4'>Flash Sale</div>              
        </a>
        <a class='d-flex align-items-center px-3 py-2 text-decoration-none text-dark border-bottom' href='xem_theo_hang_moi_ve.php'>
          <i style='color: #ae1c9a; transform: scale(1.5);' class='bx bx-cake'></i>
          <div class='ms-4'>Hàng Mới Về</div>                        
        </a>
        <a class='d-flex align-items-center px-3 py-2 text-decoration-none text-dark border-bottom' href='xem_tat_ca_san_pham.php'>
          <i style='color: #ae1c9a; transform: scale(1.5);' class='bx bx-border-all'></i>
          <div class='ms-4'>Xem Tất Cả</div>              
        </a>
        <?php
          if(isset($_SESSION['QuanTri'])){
            echo "<a class='d-flex align-items-center px-3 py-2 text-decoration-none text-dark border-bottom' href='../quan_tri/nguoi_dung/quan_ly_nguoi_dung.php'>
                <i style='color: #ae1c9a; transform: scale(1.5);' class='bx bx-command'></i>
                <div class='ms-4'>Trang Quản Lý</div>              
              </a>";
          }
        ?>
        <a class='d-flex align-items-center px-3 py-2 text-decoration-none text-dark border-bottom' href='dang_nhap/xu_ly_dang_xuat.php'>
          <i style='color: #ae1c9a; transform: scale(1.5);' class='bx bx-log-out-circle' ></i>
          <div class='ms-4'>Đăng Xuất</div>              
        </a>
      </div>
    </div>
  </button>    
</div>    
<div class='search_container d-flex'>
  <input required='true' type="text" name='tu_khoa' class='form-control input_search' placeholder='Nhập từ khóa cần tìm'>
  <button type='submit' class='px-3 py-2 button_search ms-2'><i class='bx bx-search' ></i></button>
</div>
<?php
  $hinh_anh = execute_query('SELECT HinhAnh FROM nguoidung WHERE TaiKhoan=:tai_khoan', array('tai_khoan' => $_SESSION['TenTaiKhoan']))[0][0];
?>
<div class='d-flex justify-content-center align-items-center'>
  <a href='gio_hang.php' class='text-decoration-none cart_container position-relative'>
    <?php
      if(isset($_SESSION['cartItems'])){
        $cart_quantity = count($_SESSION['cartItems']);
        if($cart_quantity > 0)
          echo "<div class='position-absolute bg-danger fw-bold text-white notification_number'>{$cart_quantity}</div>";
      }
    ?>
    <i style='transform: scale(2.0);' class='bx bx-cart text-white mx-5'></i>
  </a>
  <a href="trang_ca_nhan.php"><button type='button' class='button_user'><img class='user_img' src='../data/nguoi_dung/<?php echo $hinh_anh; ?>'></button></a>
</div>
<?php
  // if (isset($_SESSION['QuanTri']) || isset($_SESSION['KhachHang'])) {
	// 	echo "<div class='d-flex justify-content-center align-items-center'>
  //   <a href='gio_hang.php' class='text-decoration-none'><i style='transform: scale(2.0);' class='bx bx-cart text-white mx-5'></i></a>
  //   <button type='button' class='button_user'><img class='user_img' src='../user_img.png'></button>
  // </div>";
	// }else{
  //   echo "<div class='d-flex justify-content-center align-items-center'>
  //   <a href='' class='text-decoration-none'><i style='transform: scale(2.0);' class='bx bx-cart text-white mx-5'></i></a>
  //   <button type='button' class='button_user text-white me-3'><i style='transform: scale(2.0);' class='bx bx-user'></i></button>
  // </div>";
  // }
?>
