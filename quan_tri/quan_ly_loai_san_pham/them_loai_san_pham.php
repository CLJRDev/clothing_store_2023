<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loại Sản Phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,100&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='../style/style.css'>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div id='header' class='d-flex justify-content-between align-items-center container-fluid'>
    <img class='ms-3' id='logo' src="../../logo.png">
    <div class='d-flex align-items-center me-3'>
      <i class='bx bx-bell fs-2 notification_icon me-4'></i>
      <img class='user_img' id='profile_image' src="../../user_img.png">    
    </div>
  </div>
  <div class='pt-3 sidebar'>
    <div class='d-flex align-items-center justify-content-between px-3 py-1'>
      <a href="#" class='d-flex text-decoration-none align-items-center fs-6'>
        Người Dùng
      </a>
      <a href="#"><i class='bx bx-user fs-4'></i></a>
    </div>
    <div class='d-flex align-items-center justify-content-between px-3 py-1'>
      <a href="#" class='d-flex text-decoration-none align-items-center fs-6'>
        Sản Phẩm
      </a>
      <a href="#"><i class='bx bx-notepad fs-4'></i></a>
    </div>
    <div class='d-flex align-items-center justify-content-between px-3 py-1'>
      <a href="#" class='d-flex text-decoration-none align-items-center fs-6'>
        Kích Thước
      </a>
      <a href="#"><i class='bx bx-font-size fs-4'></i></a>
    </div>
    <div class='d-flex align-items-center justify-content-between px-3 py-1'>
      <a href="#" class='d-flex text-decoration-none align-items-center fs-6'>
        Loại Sản Phẩm
      </a>
      <a href="#"><i class='bx bx-category fs-4'></i></a>
    </div>
    <div class='d-flex align-items-center justify-content-between px-3 py-1'>
      <a href="#" class='d-flex text-decoration-none align-items-center fs-6'>
        Hãng Sãn Xuất
      </a>
      <a href="#"><i class='bx bx-store fs-4'></i></a>
    </div>
    <div class='d-flex align-items-center justify-content-between px-3 py-1'>
      <a href="#" class='d-flex text-decoration-none align-items-center fs-6'>
        Giỏ Hàng
      </a>
      <a href="#"><i class='bx bx-package fs-4'></i></a>
    </div>
    <div class='d-flex align-items-center justify-content-between px-3 py-1'>
      <a href="#" class='d-flex text-decoration-none align-items-center fs-6'>
        Thống Kê
      </a>
      <a href=""><i class='bx bx-coin-stack fs-4'></i></a>
    </div>
  </div>
  <form class='body' action='xu_ly_them.php' method='post' enctype='multipart/form-data'>
    <div class='form'> 
      <div class='title p-3 mb-3 border-bottom fw-bold'>Thông Tin Loại Sản Phẩm</div>
      <div class="input-group px-3 row">
        <div class='col-md-6 pb-2'>
          <div class='mb-1'>Tên Loại Sản Phẩm</div>
          <input type="text" name='ten_loai_san_pham' class="form-control">
        </div>  
        <div class='col-md-6 pb-2'>
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
    <div class='table_container mt-4'>
      <div class='title p-3 mb-2 border-bottom fw-bold'>Danh Sách Loại Sản Phẩm</div>
      <div class='action_container ps-3'>
        <button class='button_add text-white py-2 px-3 rounded' type='submit'>Thêm Mới <i class='bx bx-message-square-add'></i></button>
      </div>      
      <table class='table table-striped border-top mt-2'>
        <thead>
          <tr>
            <th style='width: 50px;' class='text-center'><i style='transform: scale(1.6);' class='bx bx-key'></i></th>
            <th>Tên Loại Sản Phẩm</th>
            <th style='width: 150px;' class='text-center'>Trạng Thái</th>
            <th style='width: 120px;' class='text-center'>Hành Động</th>
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
                    <a class='text-dark' href='xu_ly_sua.php'><i class='bx bx-pencil' style='transform: scale(1.5);'></i></a>
                    <a class='text-dark' href='xu_ly_xoa.php'><i style='transform: scale(1.5);' class='bx bx-message-alt-x'></i></a>
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
</body>
</html>