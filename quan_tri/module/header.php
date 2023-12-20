<div id='header' class='d-flex justify-content-between align-items-center container-fluid'>
  <img class='ms-3' id='logo' src="../../img/logo2.avif">
  <div class='d-flex align-items-center me-3'>
    <i class='bx bx-bell fs-2 notification_icon text-white me-4'></i>
    <?php
      $hinh_anh = execute_query('SELECT HinhAnh FROM nguoidung WHERE TaiKhoan=:tai_khoan', array('tai_khoan' => $_SESSION['TenTaiKhoan']))[0][0];
    ?>
    <img class='user_img' id='profile_image' src="../../data/nguoi_dung/<?php echo $hinh_anh; ?>">    
  </div>
</div>