<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';
  $param = array('TaiKhoan' => $_GET['id']);
  $data = execute_query("SELECT * FROM nguoidung WHERE TaiKhoan = :TaiKhoan", $param);
  if(count($data) == 0){
    alert('Tài khoản không tồn tại !');
    location('them_nguoi_dung.php');
    return;
  }else
    $nguoidung = $data[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sửa người dùng</title>
  <?php
    include '../module/head.php';
    include_once '../module/database.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' action='xu_ly_sua.php' method='post' enctype='multipart/form-data'>
    <div class='form'> 
        <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Người Dùng</div>
        <div class="input-group px-3 row">
          <div class='col-md-6'>
            <div class='pb-3'>
              <div class='mb-1'>Tên tài khoản</div>
              <input type="text" readonly name='TaiKhoan' class="form-control" value='<?php echo $nguoidung['TaiKhoan']; ?>'>
            </div>
            <div class='pb-3'>
              <div class='mb-1'>Mật khẩu</div>
              <input type="password" name='MatKhau' class="form-control" id="MatKhau">
            </div>
            <div class='pb-3'>
              <div class='mb-1'>Xác nhận mật khẩu</div>
              <input type="password" name='XacNhanMatKhau' class="form-control" id="XacNhanMatKhau">
            </div>
            <div class='pb-3'>              
              <div class='mb-1'>Email</div>
              <input type="text" name='Email' class="form-control" required="true" id="Email" value='<?php echo $nguoidung['Email']; ?>'>
            </div>
            <div class='pb-3'>
              <div class='mb-1'>Hình Ảnh</div>
              <input type="file" name='HinhAnh' class="form-control" id="inputGroupFile01 HinhAnh">
            </div>
          </div>
          <div class="col-md-6">
            <div class='pb-3'>
              <div class='mb-1'>Quyền</div>
              <select name='Quyen' class="form-select" id="Quyen">
                <?php
                  if($nguoidung['Quyen'] == 0){
                    echo '<option value="1">Quản trị</option>';
                    echo '<option value="0" selected>Khách hàng</option>';
                  }
                  else{
                    echo '<option value="1" selected>Quản trị</option>';
                    echo '<option value="0">Khách hàng</option>';
                  }
                ?>
              </select>
            </div>
            <div class='pb-3'>
              <div class='mb-1'>Trạng Thái</div>
              <select name='TrangThai' class="form-select" id="inputGroupSelect01 TrangThai">
                  <?php
                    if($nguoidung['TrangThai'] == 1){
                      echo "
                      <option selected value='1'>Kích hoạt</option>
                      <option value='0'>Khóa</option>";
                    }
                    else
                      echo "
                      <option value='1'>Kích hoạt</option>
                      <option selected value='0'>Khóa</option>";
                  ?>
                </select>
            </div>
            <div class='d-flex justify-content-center align-items-center'>
              <img class='img_edit' src='../../data/nguoi_dung/<?php echo $nguoidung['HinhAnh'];?>'>
            </div>
          </div> 
      </div>
      <div class='action_container ps-3 pb-3'>
          <button class='button_edit text-white py-2 px-3 rounded' type='submit'>Sửa Đổi <i class='bx bx-message-square-add'></i></button>
          <button class='button_edit text-white py-2 px-3 rounded' type='reset'>Reset <i class='bx bx-refresh'></i></button>
        </div>       
      </div>   
    </div>   
  </form>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
</body>
</html>