<div id='header' class='d-flex justify-content-between align-items-center container-fluid'>
  <img class='ms-3' id='logo' src="../../img/logo2.avif">
  <div class='d-flex align-items-center me-3'>
    <a class='bell_container position-relative' href='../gio_hang/quan_ly_gio_hang.php'>
      <?php
        $gio_hang = execute_query("SELECT COUNT(*) FROM giohang WHERE trangthai=0")[0][0];
        if($gio_hang > 0)
          echo "<div class='position-absolute text-decoration-none bg-danger fw-bold text-white notification_number'>{$gio_hang}</div>";
      ?>
      <i style='transform: scale(2.2);' class='bx bx-bell notification_icon text-white me-4'></i>
    </a>
    <?php
      $hinh_anh = execute_query('SELECT HinhAnh FROM nguoidung WHERE TaiKhoan=:tai_khoan', array('tai_khoan' => $_SESSION['TenTaiKhoan']))[0][0];
    ?>
    <img class='user_img' id='profile_image' src="../../data/nguoi_dung/<?php echo $hinh_anh; ?>">    
  </div>
</div>