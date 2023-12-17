<?php
	session_start();
	include_once 'thong_bao.php';
	if (!isset($_SESSION['QuanTri'])) {
		location('../../trang_chu/trang_chu.php');
	}
	return;
?>