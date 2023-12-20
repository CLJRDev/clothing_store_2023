<?php
  include '../module/kiem_tra_dang_nhap.php';
?>
<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';
  $masanpham = $_GET['sanphamid'];
  $makichthuoc = $_GET['kichthuocid'];
  $params = array('MaSanPham' => $masanpham, 'MaKichThuoc'=>$makichthuoc);
  $data = execute_query("SELECT * FROM sanpham WHERE MaSanPham=:MaSanPham AND MaKichThuoc=:MaKichThuoc", $params);
  if(count($data) == 0){
    alert('Sản phẩm không tồn tại !');
    location('quan_ly_san_pham.php');
    return;
  }else{
    $sanpham = $data[0];
    $kichthuocs = execute_query("SELECT * FROM kichthuoc ORDER BY MaKichThuoc");
    $loaisanphams = execute_query("SELECT * FROM loaisanpham ORDER BY MaLoaiSanPham");
    $hangsanxuats = execute_query("SELECT * FROM hangsanxuat ORDER BY MaHangSanXuat");
    $soluong =  execute_query("SELECT * FROM sanphamkichthuoc WHERE MaSanPham=:MaSanPham AND MaKichThuoc=:MaKichThuoc ORDER BY MaKichThuoc,MaSanPham", $params)[0];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chi tiết sản phẩm</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' action='sua_san_pham.php' method='get' enctype='multipart/form-data'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Xem chi tiết thông tin sản phẩm</div>
      <div class="input-group px-3 row">
        <div class='col-md-6'>
          <input type="hidden" readonly name='MaSanPham' class="form-control" value='<?php echo $sanpham['MaSanPham']; ?>'>
          <div class='pb-3'>
            <div class='mb-1'>Tên sản phẩm</div>
            <input type="text" name='TenSanPham' class="form-control" id="TenSanPham" readonly required="true" value='<?php echo $sanpham['TenSanPham']; ?>'>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Giá gốc</div>
            <input type="number" name='GiaGoc' class="form-control" id="GiaGoc" readonly required="true" value='<?php echo $sanpham['GiaGoc']; ?>'>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Giá khuyến mãi</div>
            <input type="number" name='GiaKhuyenMai' class="form-control" id="GiaKhuyenMai" readonly required="true" value='<?php echo $sanpham['GiaKhuyenMai']; ?>'>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Kích thước</div>
              <?php
                foreach($kichthuocs as $kichthuoc) {
                  if($kichthuoc[0] == $sanpham['MaKichThuoc'])
                    echo "<input type='text' name='KichThuoc' class='form-control' id='KichThuoc' readonly required='true' value='{$kichthuoc['KichThuoc']}'>";
                }
              ?>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Loại sản phẩm</div>
              <?php
                foreach($loaisanphams as $loaisanpham) {
                  if($loaisanpham[0] == $sanpham['MaLoaiSanPham'])
                    echo "<input type='text' name='TenLoaiSanPham' class='form-control' id='TenLoaiSanPham' readonly required='true' value='{$loaisanpham['TenLoaiSanPham']}'>";
                }
              ?>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Hãng sản xuất</div>
              <?php
                foreach($hangsanxuats as $hangsanxuat) {
                  if($hangsanxuat[0] == $sanpham['MaHangSanXuat'])
                    echo "<input type='text' name='TenHangSanXuat' class='form-control' id='TenHangSanXuat' readonly required='true' value='{$hangsanxuat['TenHangSanXuat']}'>";
                }
              ?>
          </div> 
        </div>
        <div class='col-md-6'> 
          <div class='pb-3'>
            <div class='mb-1'>Giới tính</div>
              <?php
                if($sanpham['GioiTinh'] === 'Nam'){
                  echo "<input type='text' name='GioiTinh' class='form-control' id='GioiTinh' readonly required='true' value='Nam'>";
                }
                else
                  echo "<input type='text' name='GioiTinh' class='form-control' id='GioiTinh' readonly required='true' value='Nữ'>";
              ?> 
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Số lượng</div>
            <input type="number" name='SoLuong' class="form-control" id="SoLuong" readonly required="true" value="<?php echo $soluong['SoLuong']; ?>">
          </div> 
          <div class='pb-3'>
            <div class='mb-1'>Trạng Thái</div>
              <?php
                if($sanpham['TrangThai'] == 1){
                  echo "<input type='text' name='TrangThai' class='form-control' id='TrangThai' readonly required='true' value='Kích hoạt'>";
                }
                else
                  echo "<input type='text' name='TrangThai' class='form-control' id='TrangThai' readonly required='true' value='Khóa'>";
              ?>
          </div>
          <div class='d-flex justify-content-center align-items-center'>
            <img class='img_edit' src='../../data/san_pham/<?php echo $sanpham['HinhAnh'];?>'>
          </div>
        </div>
        <div class='col-md-12 pb-3'>
          <div class='mb-1'>Mô tả sản phẩm</div>
          <textarea type="text" name='MoTa' rows="4" class="form-control" id="MoTa" readonly required="true"><?php echo $sanpham['MoTa']; ?></textarea>
        </div>
        <div class='action_container ps-3 pb-3'>
          <?php
            echo "<button class='button_edit text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href='sua_san_pham.php?sanphamid={$sanpham['MaSanPham']}&kichthuocid={$sanpham['MaKichThuoc']}'>Sửa sản phẩm <i class='bx bx-message-square-add'></i></a></button>"
          ?>
          <button class='button_edit text-white py-2 px-3 rounded' type='button'><a class='text-decoration-none text-white' href='quan_ly_san_pham.php'>Quay lại <i class='bx bx-arrow-back'></i></a></button>
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