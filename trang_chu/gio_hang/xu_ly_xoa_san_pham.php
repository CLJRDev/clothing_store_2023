<?php
  session_start();
  $san_pham_ids = $_SESSION['cartItems'];
  $id = $_GET['id'];
  $key = array_search($id, $san_pham_ids);
  unset($san_pham_ids[$key]);
  if(count($san_pham_ids) > 0)
    $_SESSION['cartItems'] = $san_pham_ids;
  else
    unset($_SESSION['cartItems']);
  header("Location: ../gio_hang.php", TRUE, 307);
?>