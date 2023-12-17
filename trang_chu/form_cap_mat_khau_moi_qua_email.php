<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include 'module/head.php';
  ?>
  <title>Quên mật khẩu?</title>
  <?php
    include '../quan_tri/module/head.php';
  ?>
  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Arial', sans-serif;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form {
      max-width: 600px;
      width: 100%;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
    }

    .title {
      font-size: 24px;
      text-align: center;
    }

    .action_container {
      display: flex;
      justify-content: space-between;
    }

    .button_add {
      cursor: pointer;
    }

    .table_container {
      max-height: 300px; /* Just an example, adjust as needed */
      overflow-y: auto;
    }
  </style>
</head>
<body>
  <!-- <div class='d-flex align-items-center justify-content-between header px-3'>
    <?php
      include 'module/header.php';
    ?>
   
  </div> -->
  <form style='' class='body' action='xu_ly_cap_mat_khau_moi_qua_email.php' method='post'>
    <div class='form'>
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Cấp Lại Mật Khẩu !</div> 
      <div class="input-group px-3 row">
        <div class='col-md-12'>
          <div class='pb-3'>
            <div class='mb-1'>Tên tài khoản</div>
            <input type="text" name='TaiKhoan' class="form-control" id="TaiKhoan" placeholder="Nhập tên tài khoản" required="true">
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Email</div>
            <input type="text" name='Email' class="form-control" id="Email" required="true" placeholder="Nhập địa chỉ Email đăng ký tài khoản">
          </div>   
        </div>   
      </div>  
    </div>  
    <div class='table_container overflow-auto mt-4'>
      <div class='action_container ps-3'>
        <button class='button_add btn-danger py-2 px-3 rounded me-3' type='submit'>Nhận mật khẩu mới <i class='bx bx-message-square-add'></i></button>
        <button class='button_add btn-danger py-2 px-3 rounded me-3' type='reset'>Reset<i class='bx bx-refresh' ></i></button>
        <a href='login.php'><button class='button_add btn-danger py-2 px-3 me-3 rounded' type='button'>Quay Lại<i class='bx bx-arrow-back' ></i></button></a>
      </div>
    </div>
  </form>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
</body>
</html>