<?php
  include '../module/database.php';
  include '../module/thong_bao.php';
  $KichThuoc = $_POST['KichThuoc'];

  $dem = execute_query("SELECT COUNT(*) FROM kichthuoc WHERE KichThuoc=:KichThuoc", array('KichThuoc' => $KichThuoc))[0][0];
  if($dem > 0){
    alert('Kích thước đã tồn tại !');
    location('them_kich_thuoc.php');
    return;
  }
  $sql = "INSERT kichthuoc (KichThuoc) VALUES (:KichThuoc)";  
  $params = array();
  $params['KichThuoc'] = $KichThuoc;
  execute_command($sql, $params);
  location("them_kich_thuoc.php");
?>