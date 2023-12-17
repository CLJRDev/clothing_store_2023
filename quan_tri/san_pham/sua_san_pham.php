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
  <title>Sửa sản phẩm</title>
  <?php
    include '../module/head.php';
  ?>
</head>
<body>
  <?php
    include '../module/header.php';
    include '../module/sidebar.php';
  ?>
  <form class='body' action='xu_ly_sua.php' method='post' enctype='multipart/form-data'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Sửa thông tin sản phẩm</div>
      <div class="input-group px-3 row">
        <div class='col-md-6'>
          <input type="hidden" readonly name='MaSanPham' class="form-control" value='<?php echo $sanpham['MaSanPham']; ?>'>
          <div class='pb-3'>
            <div class='mb-1'>Tên sản phẩm</div>
            <input type="text" name='TenSanPham' class="form-control" id="TenSanPham" placeholder="Nhập tên sản phẩm" required="true" value='<?php echo $sanpham['TenSanPham']; ?>'>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Giá gốc</div>
            <input type="number" name='GiaGoc' class="form-control" id="GiaGoc" placeholder="Nhập giá gốc" required="true" value='<?php echo $sanpham['GiaGoc']; ?>'>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Giá khuyến mãi</div>
            <input type="number" name='GiaKhuyenMai' class="form-control" id="GiaKhuyenMai" placeholder="Nhập giá khuyến mãi" required="true" value='<?php echo $sanpham['GiaKhuyenMai']; ?>'>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Kích thước</div>
            <select name="KichThuoc" class="form-select" id="inputGroupSelect01 KichThuoc">
              <?php
                foreach($kichthuocs as $kichthuoc) {
                  if($kichthuoc[0] == $sanpham['MaKichThuoc'])
                    echo "<option selected value='{$kichthuoc['MaKichThuoc']}'>{$kichthuoc['KichThuoc']}</option>";
                  else
                    echo "<option value='{$kichthuoc['MaKichThuoc']}'>{$kichthuoc['KichThuoc']}</option>";
                }
              ?>
            </select>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Loại sản phẩm</div>
            <select name="TenLoaiSanPham" class="form-select" id="inputGroupSelect01 TenLoaiSanPham">
              <?php
                foreach($loaisanphams as $loaisanpham) {
                  if($loaisanpham[0] == $sanpham['MaLoaiSanPham'])
                    echo "<option selected value='{$loaisanpham['MaLoaiSanPham']}'>{$loaisanpham['TenLoaiSanPham']}</option>";
                  else
                    echo "<option value='{$loaisanpham['MaLoaiSanPham']}'>{$loaisanpham['TenLoaiSanPham']}</option>";
                }
              ?>
            </select>
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Hãng sản xuất</div>
            <select name="TenHangSanXuat" class="form-select" id="inputGroupSelect01 TenHangSanXuat">
              <?php
                foreach($hangsanxuats as $hangsanxuat) {
                  if($hangsanxuat[0] == $sanpham['MaHangSanXuat'])
                    echo "<option selected value='{$hangsanxuat['MaHangSanXuat']}'>{$hangsanxuat['TenHangSanXuat']}</option>";
                  else
                    echo "<option value='{$hangsanxuat['MaHangSanXuat']}'>{$hangsanxuat['TenHangSanXuat']}</option>";
                }
              ?>
            </select>
          </div> 
        </div>
        <div class='col-md-6'> 
          <div class='pb-3'>
            <div class='mb-1'>Giới tính</div>
            <select name='GioiTinh' class="form-select" id="inputGroupSelect01 GioiTinh">
              <?php
                if($sanpham['GioiTinh'] == 1){
                  echo "
                  <option selected value='Nam'>Nam</option>
                  <option value='Nữ'>Nữ</option>";
                }
                else
                  echo "
                  <option value='Nam'>Nam</option>
                  <option selected value='Nữ'>Nữ</option>";
              ?>
            </select> 
          </div>
          <div class='pb-3'>
            <div class='mb-1'>Số lượng</div>
            <input type="number" name='SoLuong' class="form-control" id="SoLuong" required="true" value="<?php echo $soluong['SoLuong']; ?>">
          </div> 
          <div class='pb-3'>
            <div class='mb-1'>Trạng Thái</div>
            <select name='TrangThai' class="form-select" id="inputGroupSelect01 TrangThai">
              <?php
                if($sanpham['TrangThai'] == 1){
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
          <div class='pb-3'>
            <div class='mb-1'>Hình Ảnh</div>
            <input type="file" name='HinhAnh' class="form-control" id="inputGroupFile01 HinhAnh">
          </div>
          <div class='d-flex justify-content-center align-items-center'>
            <img class='img_edit' src='../../data/san_pham/<?php echo $sanpham['HinhAnh'];?>'>
          </div>
        </div>
        <div class='col-md-12 pb-3'>
          <div class='mb-1'>Mô tả sản phẩm</div>
          <textarea type="text" name='MoTa' rows="4" class="form-control" id="MoTa" required="true"><?php echo $sanpham['MoTa']; ?></textarea>
        </div>
        <div class='action_container ps-3 pb-3'>
          <button class='button_edit text-white py-2 px-3 rounded' type='submit'>Sửa Đổi <i class='bx bx-message-square-add'></i></button>
          <button class='button_edit text-white py-2 px-3 rounded' type='reset'>Reset <i class='bx bx-refresh'></i></button>
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