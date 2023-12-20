<?php
  session_start();
  $_SESSION['tu_khoa_san_pham'] = $_POST['Tukhoa'];
  $_SESSION['kich_thuoc'] = $_POST['KichThuoc'];
  $_SESSION['ma_loai_san_pham'] = $_POST['MaLoaiSanPham'];
  $_SESSION['ma_hang_san_xuat'] = $_POST['MaHangSanXuat'];
  $_SESSION['gioi_tinh'] = $_POST['GioiTinh'];
  $_SESSION['trang_thai_san_pham'] = $_POST['TrangThai'];
  header('location: thong_ke_hang_ton.php', TRUE, 307);
?>