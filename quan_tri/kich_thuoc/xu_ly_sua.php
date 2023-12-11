<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $MaKichThuoc = $_POST['MaKichThuoc'];
  $KichThuoc = $_POST['KichThuoc'];

  $dem = execute_query("SELECT COUNT(*) FROM kichthuoc WHERE KichThuoc=:KichThuoc", array('KichThuoc' => $KichThuoc))[0][0];
  if($dem > 0){
    alert('Kích thước đã tồn tại !');
    location("sua_kich_thuoc.php?id={$MaKichThuoc}");
    return;
  }
  $sql = "UPDATE kichthuoc SET KichThuoc=:KichThuoc WHERE MaKichThuoc=:MaKichThuoc";
  $params = array();
  $params['MaKichThuoc'] = $MaKichThuoc;
  $params['KichThuoc'] = $KichThuoc;
  execute_command($sql,$params);
  alert("Sửa kích thước thành công !");
  location("sua_kich_thuoc.php?id={$MaKichThuoc}");
?>