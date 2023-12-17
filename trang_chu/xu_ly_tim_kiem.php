<?php
  $ten_san_pham = $_POST['tu_khoa'];
  header("Location: xem_tat_ca_san_pham.php?ten_san_pham={$ten_san_pham}", TRUE, 307);
?>