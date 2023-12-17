<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sửa kích thước</title>
  <?php
    include '../module/head.php';
    include_once '../module/database.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
    include_once '../module/thong_bao.php';
    $sql = 'SELECT * FROM kichthuoc WHERE MaKichThuoc=:MaKichThuoc';
    $params = array('MaKichThuoc' => $_GET['id']);
    $data = execute_query($sql, $params);
    if(count($data) == 0){
      alert("Kích thước không tồn tại !");
      location("them_kich_thuoc.php");
      return;
    }
    else
      $kichthuoc = $data[0];
  ?>
  <form class='body' action='xu_ly_sua.php' method='post' enctype='multipart/form-data'>
      <div class='form'> 
        <div class='title p-3 mb-3 border-bottom fw-bold'>Thông tin kích thước</div>
            <div class="input-group px-3 row">
              <div class='col-md-6'>
                <input type="hidden" readonly name='MaKichThuoc' class="form-control" id="MaKichThuoc" placeholder="Mã kích thước" value="<?php echo $kichthuoc['MaKichThuoc']?>">
                <div class='pb-3'>
                  <div class='mb-1'>Sửa kích thước</div>
                  <input type="text" name='KichThuoc' class="form-control" id="KichThuoc" placeholder="Nhập kích thước" required="true" value="<?php echo $kichthuoc['KichThuoc']?>">
                </div> 
            </div>  
          </div>
          <div class='action_container ps-3 pb-3'>
            <button class='button_edit text-white py-2 px-3 rounded' type='submit'>Sửa Đổi <i class='bx bx-message-square-add'></i></button>
            <button class='button_edit text-white py-2 px-3 rounded' type='reset'>Reset <i class='bx bx-message-square-add'></i></button>
        </div> 
      </div>     
      </div>     
    </div>   
  </form>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
</body>
</html>