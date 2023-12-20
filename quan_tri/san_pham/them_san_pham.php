<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<?php
  include_once '../module/database.php';
  $loaisanphams = execute_query("SELECT * FROM loaisanpham WHERE TrangThai=1");
  $hangsanxuats = execute_query("SELECT * FROM hangsanxuat WHERE TrangThai=1");
  $kichthuocs = execute_query("SELECT * FROM kichthuoc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm sản phẩm</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' action='xu_ly_them.php' method='post' enctype='multipart/form-data'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Sản Phẩm</div>
      <div class="input-group px-3 row">
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Tên sản phẩm</div>
          <input type="text" name='TenSanPham' class="form-control" id="TenSanPham" required="true">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Giá gốc</div>
          <input type="number" name='GiaGoc' class="form-control" id="GiaGoc" required="true">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Giá khuyến mãi</div>
          <input type="number" name='GiaKhuyenMai' class="form-control" id="GiaKhuyenMai" required="true">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Kích thước</div>
          <select name="KichThuoc" class="form-select" id="inputGroupSelect01 KichThuoc">
            <?php
              foreach($kichthuocs as $kichthuoc) {
                echo "<option value='{$kichthuoc['MaKichThuoc']}'>{$kichthuoc['KichThuoc']}</option>";
              }
            ?>
          </select>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Loại sản phẩm</div>
          <select name="TenLoaiSanPham" class="form-select" id="inputGroupSelect01 TenLoaiSanPham">
            <?php
              foreach($loaisanphams as $loaisanpham) {
                echo "<option value='{$loaisanpham['MaLoaiSanPham']}'>{$loaisanpham['TenLoaiSanPham']}</option>";
              }
            ?>
          </select>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Hãng sản xuất</div>
          <select name="TenHangSanXuat" class="form-select" id="inputGroupSelect01 TenHangSanXuat">
            <?php
              foreach($hangsanxuats as $hangsanxuat) {
                echo "<option value='{$hangsanxuat['MaHangSanXuat']}'>{$hangsanxuat['TenHangSanXuat']}</option>";
              }
            ?>
          </select>
        </div>  
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Hình Ảnh</div>
          <input type="file" name='HinhAnh' class="form-control" id="inputGroupFile01 HinhAnh">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Giới tính</div>
          <select name='GioiTinh' class="form-select" id="inputGroupSelect01 GioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
          </select> 
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Số lượng</div>
          <input type="number" name='SoLuong' class="form-control" id="SoLuong" required="true">
        </div> 
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Trạng Thái</div>
          <select name='TrangThai' class="form-select" id="inputGroupSelect01 TrangThai">
            <option value="1">Kích hoạt</option>
            <option value="0">Khóa</option>
          </select> 
        </div>
        <div class='col-md-12 pb-3'>
          <div class='mb-1'>Mô tả sản phẩm</div>
          <textarea type="text" name='MoTa' rows="4" class="form-control" id="MoTa" required="true"></textarea>
        </div>       
      </div>  
      <div class='action_container pb-3 ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Thêm Mới <i class='bx bx-message-square-add'></i></button>
        <button class='button_add text-white py-2 px-3 rounded' type='reset'>Reset <i class='bx bx-refresh'></i></button>
      </div>
    </div>  
  </form>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
</body>
</html>