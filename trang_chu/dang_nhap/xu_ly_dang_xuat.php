<?php
	include '../../quan_tri/module/thong_bao.php';
	session_start();
	session_destroy();
	location('../login.php');
?>