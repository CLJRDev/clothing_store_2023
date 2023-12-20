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
          <input type="text" name='Tukhoa' class="form-control js_text" value='<?php if(isset($_SESSION['tu_khoa_san_pham'])) echo $_SESSION['tu_khoa_san_pham'];?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Kích thước</div>
          <select name="KichThuoc" class="form-select js_select" id="inputGroupSelect01 KichThuoc">
          <option value='-1'>Tất cả</option>
            <?php
              foreach($kichthuocs as $kichthuoc) {
                if($_SESSION['kich_thuoc'] == $kichthuoc['MaKichThuoc'])
                  echo "<option selected value='{$kichthuoc['MaKichThuoc']}'>{$kichthuoc['KichThuoc']}</option>";
                else
                  echo "<option value='{$kichthuoc['MaKichThuoc']}'>{$kichthuoc['KichThuoc']}</option>";
              }
            ?>
          </select>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Giá từ</div>
          <input type="number" name='GiaTu' class="form-control js_text" value='<?php if(isset($_SESSION['gia_tu'])) echo $_SESSION['gia_tu']; ?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Giá đến</div>
          <input type="number" name='GiaDen' class="form-control js_text" value='<?php if(isset($_SESSION['gia_den'])) echo $_SESSION['gia_den']; ?>'>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Loại sản phẩm</div>
          <select name="MaLoaiSanPham" class="form-select js_select" id="inputGroupSelect01 MaLoaiSanPham">
            <option value='-1'>Tất cả</option>
            <?php
              foreach($loaisanphams as $loaisanpham) {
                if($_SESSION['ma_loai_san_pham'] == $loaisanpham['MaLoaiSanPham'])
                  echo "<option selected value='{$loaisanpham['MaLoaiSanPham']}'>{$loaisanpham['TenLoaiSanPham']}</option>";
                else
                  echo "<option value='{$loaisanpham['MaLoaiSanPham']}'>{$loaisanpham['TenLoaiSanPham']}</option>";
              }
            ?>
          </select>
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Hãng sản xuất</div>
          <select name="MaHangSanXuat" class="form-select js_select" id="inputGroupSelect01 TenHangSanXuat">
            <option value='-1'>Tất cả</option>
            <?php
              foreach($hangsanxuats as $hangsanxuat) {
                if($_SESSION['ma_hang_san_xuat'] == $hangsanxuat['MaHangSanXuat'])
                  echo "<option selected value='{$hangsanxuat['MaHangSanXuat']}'>{$hangsanxuat['TenHangSanXuat']}</option>";
                else
                  echo "<option value='{$hangsanxuat['MaHangSanXuat']}'>{$hangsanxuat['TenHangSanXuat']}</option>";
              }
            ?>
          </select>
        </div>  
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Giới tính</div>
          <select name='GioiTinh' class="form-select js_select" id="inputGroupSelect01 GioiTinh">
            <?php 
              $gioi_tinhs = array('-1'=>'Tất cả', 'Nam'=>'Nam', 'Nữ'=>'Nữ');
              foreach($gioi_tinhs as $key => $value){
                if($key == $_SESSION['gioi_tinh'])
                  echo "<option selected value='{$key}'>{$value}</option>";
                else
                  echo "<option value='{$key}'>{$value}</option>";
              }
            ?>
          </select> 
        </div> 
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Trạng Thái</div>
          <select name='TrangThai' class="form-select js_select" id="inputGroupSelect01 TrangThai">
            <?php
              $trang_thais = array('-1' => 'Tất cả', '0' => 'Khóa', '1' => 'Kích hoạt');
              foreach($trang_thais as $key => $value){
                if($_SESSION['trang_thai_san_pham'] == $key)
                  echo "<option selected value='{$key}'>$value</option>";
                else
                  echo "<option value='{$key}'>$value</option>";
              }
            ?>
          </select> 
        </div>       
      </div>  
    </div>  
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh sách sản phẩm</div>
      <div class='action_container ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Tìm Kiếm <i class='bx bx-search' ></i></button>
        <button class='button_add text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href="them_san_pham.php">Thêm Mới <i class='bx bx-message-square-add'></i></a></button>
        <button class='button_reset text-white py-2 px-3 rounded' type='button'>Reset <i class='bx bx-refresh'></i></i></button>
      </div>
      <table class='table table-striped border-top mt-2 table-bordered align-middle'>
        <thead>
          <tr>
            <th style='width: 50px; min-width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th>
            <th style='min-width: 250px;' class='text-center'>Tên sản phẩm</th>
            <th style='min-width: 100px; width: 100px;' class='text-center'>Hình ảnh</th>
            <th style='min-width: 120px; width: 60px;' class='text-center'>Số lượng</th>
            <th style='width: 60px; min-width: 120px;' class='text-center'>Giá gốc</th>
            <th style='width: 60px; min-width: 150px;' class='text-center'>Giá khuyến mãi</th>
            <th style='width: 80px; min-width: 120px;' class='text-center'>Kích thước</th>
            <th style='width: 80px; min-width: 150px;' class='text-center'>Hãng sản xuất</th>
            <th style='width: 100px; min-width: 120px;' class='text-center'>Trạng Thái</th>
            <th style='width: 120px; min-width: 120px;' class='text-center'>Hành Động</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT
                      sanpham.MaSanPham,
                      sanpham.TenSanPham,
                      sanpham.HinhAnh,
                      sanpham.GiaGoc,
                      sanpham.GiaKhuyenMai,
                      sanpham.MoTa,
                      sanpham.GioiTinh,
                      sanpham.MaKichThuoc,
                      sanpham.MaLoaiSanPham,
                      sanpham.MaHangSanXuat,
                      sanpham.TrangThai,
                      sanphamkichthuoc.SoLuong,
                      kichthuoc.KichThuoc,
                      loaisanpham.TenLoaiSanPham,
                      hangsanxuat.TenHangSanXuat 
                    FROM
                        sanpham
                    INNER JOIN
                        kichthuoc ON sanpham.MaKichThuoc = kichthuoc.MaKichThuoc
                    INNER JOIN
                        loaisanpham ON sanpham.MaLoaiSanPham = loaisanpham.MaLoaiSanPham
                    INNER JOIN
                        hangsanxuat ON sanpham.MaHangSanXuat = hangsanxuat.MaHangSanXuat
                    INNER JOIN
                        sanphamkichthuoc ON sanpham.MaSanPham = sanphamkichthuoc.MaSanPham AND sanpham.MaKichThuoc = sanphamkichthuoc.MaKichThuoc 
                    WHERE 1=1";
            $params = array();
            if(isset($_SESSION['tu_khoa_san_pham']))
              if($_SESSION['tu_khoa_san_pham'] != ''){
                $sql .= " AND CONCAT(TenSanPham,MoTa) LIKE CONCAT('%',:tu_khoa,'%')";
                $params['tu_khoa'] = $_SESSION['tu_khoa_san_pham'];
              }
            if(isset($_SESSION['kich_thuoc']))
              if($_SESSION['kich_thuoc'] != -1){
                $sql .= " AND sanpham.MaKichThuoc = :kich_thuoc";
                $params['kich_thuoc'] = $_SESSION['kich_thuoc'];
              }
            if(isset($_SESSION['gia_tu']))
              if($_SESSION['gia_tu'] != ''){
                $sql .= " AND GiaKhuyenMai >= :gia_tu";
                $params['gia_tu'] = $_SESSION['gia_tu'];
              }
            if(isset($_SESSION['gia_den']))
              if($_SESSION['gia_den'] != ''){
                $sql .= " AND GiaKhuyenMai <= :gia_den";
                $params['gia_den'] = $_SESSION['gia_den'];
              }
            if(isset($_SESSION['ma_loai_san_pham']))
              if($_SESSION['ma_loai_san_pham'] != -1){
                $sql .= " AND sanpham.MaLoaiSanPham = :ma_loai_san_pham";
                $params['ma_loai_san_pham'] = $_SESSION['ma_loai_san_pham'];
              }
            if(isset($_SESSION['ma_hang_san_xuat']))
              if($_SESSION['ma_hang_san_xuat'] != -1){
                $sql .= " AND sanpham.MaHangSanXuat = :ma_hang_san_xuat";
                $params['ma_hang_san_xuat'] = $_SESSION['ma_hang_san_xuat'];
              }
            if(isset($_SESSION['gioi_tinh']))
              if($_SESSION['gioi_tinh'] != -1){
                $sql .= " AND GioiTinh = :gioi_tinh";
                $params['gioi_tinh'] = $_SESSION['gioi_tinh'];
              }
            if(isset($_SESSION['trang_thai_san_pham']))
              if($_SESSION['trang_thai_san_pham'] != -1){
                $sql .= " AND sanpham.TrangThai = :trang_thai";
                $params['trang_thai'] = $_SESSION['trang_thai_san_pham'];
              }
            $page_index = 1;
            $page_length = 10;
            if(isset($_GET['pid']))
              $page_index = $_GET['pid'];
            $start_index = ($page_index - 1) * $page_length;
            $sql = $sql." LIMIT {$start_index}, {$page_length}";
            $sanphams = execute_query($sql,$params);                        
            foreach($sanphams as $sanpham){
              echo "
                <tr>
                  <td class='text-center'>{$sanpham['MaSanPham']}</td>
                  <td>{$sanpham['TenSanPham']}</td>
                  <td><img src='../../data/san_pham/{$sanpham['HinhAnh']}' style='width: 100px; height: 100px; object-fit: contain'></td>
                  <td class='text-center'>{$sanpham['SoLuong']}</td>
                  <td class='text-center'>{$sanpham['GiaGoc']}</td>
                  <td class='text-center'>{$sanpham['GiaKhuyenMai']}</td>
                  <td class='text-center'>{$sanpham['KichThuoc']}</td>
                  <td class='text-center'>{$sanpham['TenHangSanXuat']}</td>
                  <td class='text-center'><input onclick='return false;' type='checkbox' ".($sanpham['TrangThai'] == 1 ? 'checked' : 'unchecked')."></td>
                  <td class='text-center'>
                    <a class='text-dark me-2' href='xem_chi_tiet.php?sanphamid={$sanpham['MaSanPham']}&kichthuocid={$sanpham['MaKichThuoc']}'><i class='bx bx-detail' style='transform: scale(1.5);'></i></a>
                    <a class='text-dark ms-1 me-1' href='sua_san_pham.php?sanphamid={$sanpham['MaSanPham']}&kichthuocid={$sanpham['MaKichThuoc']}'><i class='bx bx-pencil' style='transform: scale(1.5);'></i></a>
                    <a class='text-dark ms-2' href='xu_ly_xoa.php?sanphamid={$sanpham['MaSanPham']}&kichthuocid={$sanpham['MaKichThuoc']}'><i style='transform: scale(1.5);' class='bx bx-message-alt-x'></i></a>
                  </td>
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
      <div class="pagination d-flex justify-content-center">
        <ul class="pagination">
          <?php
            $row_number = execute_query("SELECT COUNT(*) AS dem FROM sanpham")[0]['dem'];
            $page_number = (int) $row_number / $page_length;
            if($row_number % $page_length != 0)
              $page_number++;
            for($i = 1; $i <= $page_number; $i++)
              echo "<a href='quan_ly_san_pham.php?pid={$i}' class='page-link'>{$i}</a>";  
          ?>          
        </ul>
      </div>
    </div>
  </form>
  <div class='footer'>

  </div>
  <script src='../js/sidebar.js'></script>
  <script src='../js/refresh.js'></script>
</body>
</html>