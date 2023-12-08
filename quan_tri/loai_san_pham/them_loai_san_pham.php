<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm Loại Sản Phẩm</title>
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
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Loại Sản Phẩm</div>
      <div class="input-group px-3 row">
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Tên Loại Sản Phẩm</div>
          <input type="text" name='ten_loai_san_pham' class="form-control">
        </div>  
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Hình Ảnh</div>
          <input type="file" name='hinh_anh' class="form-control" id="inputGroupFile01">
        </div>
        <div class='col-md-6 pb-3'>
          <div class='mb-1'>Trạng Thái</div>
          <select name='trang_thai' class="form-select" id="inputGroupSelect01">
            <option value="0">Kích hoạt</option>
            <option value="1">Khóa</option>
          </select> 
        </div>       
      </div>  
    </div>  
    <div class='table_container overflow-auto mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh Sách Loại Sản Phẩm</div>
      <div class='action_container ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Thêm Mới <i class='bx bx-message-square-add'></i></button>
      </div>      
      <table class='table table-striped border-top mt-2 table-bordered'>
        <thead>
          <tr>
            <th style='width: 50px; min-width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th>
            <th style='min-width: 200px;'>Tên Loại Sản Phẩm</th>
            <th style='width: 150px; min-width: 150px;' class='text-center'>Trạng Thái</th>
            <th style='width: 120px; min-width: 120px;' class='text-center'>Hành Động</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include_once '../module/database.php';
            $sql = 'SELECT * FROM loaisanpham';
            $loai_san_phams = execute_query($sql);
            foreach($loai_san_phams as $loai_san_pham){
              echo "
                <tr>
                  <td class='text-center'>{$loai_san_pham['MaLoaiSanPham']}</td>
                  <td>{$loai_san_pham['TenLoaiSanPham']}</td>
                  <td class='text-center'><input onclick='return false;' type='checkbox' ".($loai_san_pham['TrangThai'] == 0 ? 'checked' : '')."></td>
                  <td class='text-center d-flex justify-content-around align-items-center'>
                    <a class='text-dark' href='sua_loai_san_pham.php?id={$loai_san_pham['MaLoaiSanPham']}'><i class='bx bx-pencil' style='transform: scale(1.5);'></i></a>
                    <a class='text-dark' href='xu_ly_xoa.php?id={$loai_san_pham['MaLoaiSanPham']}'><i style='transform: scale(1.5);' class='bx bx-message-alt-x'></i></a>
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