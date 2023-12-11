<?php
  include_once '../module/database.php';
  $loaisanphams = execute_query("SELECT * FROM loaisanpham WHERE TrangThai=1");
  $hangsanxuats = execute_query("SELECT * FROM hangsanxuat WHERE TrangThai=1");
  $kichthuocs = execute_query("SELECT * FROM kichthuoc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản lý sản phẩm</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' action='xu_ly_tim_kiem.php' method='post'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Sản Phẩm</div>
      <div class="input-group px-3 row">
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Từ khóa</div>
          <input type="text" name='TenSanPham' class="form-control" id="TenSanPham" required="true">
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
          <div class='mb-1'>Giá từ</div>
          <input type="number" name='GiaTu' class="form-control" id="GiaTu" required="true">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Giá đến</div>
          <input type="number" name='GiaDen' class="form-control" id="GiaKhuyenMai" required="true">
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
          <div class='mb-1'>Giới tính</div>
          <select name='GioiTinh' class="form-select" id="inputGroupSelect01 GioiTinh">
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
          </select> 
        </div> 
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Trạng Thái</div>
          <select name='TrangThai' class="form-select" id="inputGroupSelect01 TrangThai">
            <option value="1">Kích hoạt</option>
            <option value="0">Khóa</option>
          </select> 
        </div>       
      </div>  
    </div>  
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh sách sản phẩm</div>
      <div class='action_container ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Tìm Kiếm <i class='bx bx-search' ></i></button>
        <button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href="them_san_pham.php">Thêm Mới <i class='bx bx-message-square-add'></i></a></button>
        <button class='button_add text-white py-2 px-3 rounded' type='reset'>Reset <i class='bx bx-refresh'></i></i></button>
      </div>
      <table class='table table-striped border-top mt-2 table-bordered'>
        <thead>
          <tr>
            <th style='width: 50px; min-width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th>
            <th style='min-width: 300px;' class='text-center'>Tên sản phẩm</th>
            <th style='width: 60px; min-width: 120px;' class='text-center'>Giá gốc</th>
            <th style='width: 60px; min-width: 150px;' class='text-center'>Giá khuyến mãi</th>
            <th style='width: 80px; min-width: 120px;' class='text-center'>Giới tính</th>
            <th style='width: 80px; min-width: 120px;' class='text-center'>Kích thước</th>
            <th style='width: 80px; min-width: 150px;' class='text-center'>Loại sản phẩm</th>
            <th style='width: 80px; min-width: 150px;' class='text-center'>Hãng sản xuất</th>
            <th style='width: 100px; min-width: 120px;' class='text-center'>Trạng Thái</th>
            <th style='width: 120px; min-width: 120px;' class='text-center'>Hành Động</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT sanpham.MaSanPham, TenSanPham, sanpham.HinhAnh, GiaGoc, GiaKhuyenMai, MoTa, GioiTinh, kichthuoc.KichThuoc, loaisanpham.TenLoaiSanPham, hangsanxuat.TenHangSanXuat, sanpham.TrangThai FROM `sanpham` 
                    INNER JOIN kichthuoc ON sanpham.MaKichThuoc = kichthuoc.MaKichThuoc
                    INNER JOIN loaisanpham ON sanpham.MaLoaiSanPham = loaisanpham.MaLoaiSanPham
                    INNER JOIN hangsanxuat ON sanpham.MaHangSanXuat = hangsanxuat.MaHangSanXuat WHERE 1=1";
            $sanphams = execute_query($sql);
            foreach($sanphams as $sanpham){
              $gioitinh = "";
              if ($sanpham['GioiTinh'] == 1)
                $gioitinh = "Nam";
              if ($sanpham['GioiTinh'] == 0)
                $gioitinh = "Nữ";
              echo "
                <tr>
                  <td class='text-center'>{$sanpham['MaSanPham']}</td>
                  <td>{$sanpham['TenSanPham']}</td>
                  <td>{$sanpham['GiaGoc']}</td>
                  <td>{$sanpham['GiaKhuyenMai']}</td>
                  <td class='text-center'>{$gioitinh}</td>
                  <td class='text-center'>{$sanpham['KichThuoc']}</td>
                  <td>{$sanpham['TenLoaiSanPham']}</td>
                  <td>{$sanpham['TenHangSanXuat']}</td>
                  <td class='text-center'><input onclick='return false;' type='checkbox' ".($sanpham['TrangThai'] == 1 ? 'checked' : 'unchecked')."></td>
                  <td class='text-center d-flex justify-content-around align-items-center'>
                    <a class='text-dark' href='sua_san_pham.php?id={$sanpham['MaSanPham']}'><i class='bx bx-pencil' style='transform: scale(1.5);'></i></a>
                    <a class='text-dark' href='xu_ly_xoa.php?id={$sanpham['MaSanPham']}'><i style='transform: scale(1.5);' class='bx bx-message-alt-x'></i></a>
                  </td>
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
    </div>
  </form>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
</body>
</html>