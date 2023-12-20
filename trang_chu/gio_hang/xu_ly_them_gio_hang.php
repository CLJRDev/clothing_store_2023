<?php
  session_start();
  include '../../quan_tri/module/thong_bao.php';
  $id = $_GET['id'];
  if(isset($_SESSION['cartItems'])){
    $productIds = $_SESSION['cartItems'];

    // Kiểm tra xem id đã tồn tại trong giỏ hàng chưa
    if (!in_array($id, $productIds)) {
      // Nếu chưa tồn tại, thêm vào giỏ hàng
      array_push($productIds, $id);
      $_SESSION['cartItems'] = $productIds;
    }else
      alert("Sản phẩm đã có trong giỏ hàng!");
  }
  else{
    $productIds = array($id);
    $_SESSION['cartItems'] = $productIds;
  } 
  location("../trang_chu.php");
?>