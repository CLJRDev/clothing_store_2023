<?php
	session_start();
	include_once '../quan_tri/module/thong_bao.php';
	if (!isset($_SESSION['QuanTri']) && !isset($_SESSION['KhachHang'])) {
		location('login.php');
	}
	return;
?>