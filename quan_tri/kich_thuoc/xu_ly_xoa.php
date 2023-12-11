<?php
  include_once '../module/database.php';
  include_once '../module/thong_bao.php';

  $MaKichThuoc = $_GET['id'];
  $sql = "SELECT * FROM kichthuoc WHERE MaKichThuoc=:MaKichThuoc";
  $params = array('MaKichThuoc' => $MaKichThuoc);
  execute_command("DELETE FROM kichthuoc WHERE MaKichThuoc=:MaKichThuoc", $params);
  location("them_kich_thuoc.php");
?>