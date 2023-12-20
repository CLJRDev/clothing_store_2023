<?php
	include '../../quan_tri/module/database.php';
	include '../../quan_tri/module/thong_bao.php';
	$TaiKhoan = $_POST['TaiKhoan'];
	$Email = $_POST['Email'];
	$data = execute_query("SELECT * FROM nguoidung WHERE TaiKhoan=:tai_khoan", array('tai_khoan' => $TaiKhoan));
	if(count($data) == 0){
	  alert('Tài khoản không tồn tại !');
	  location('../lay_mat_khau.php');
	  return;
	}
	else {
		$KiemTraEmail = $data[0];
		if($KiemTraEmail['Email'] == $Email){
			$mahoamatkhau = md5('1');
			$sql = "UPDATE nguoidung SET MatKhau='{$mahoamatkhau}' WHERE TaiKhoan='{$TaiKhoan}'";
			execute_command($sql);
			alert("Cập nhật mật khẩu cho tài khoản '{$TaiKhoan}' thành công ! Mật khẩu mới cho tài khoản là: 1 !");
			location("../login.php");
			return;
		}
		else{
			alert("Thông tin tài khoản không chính xác ! Vui lòng kiểm tra lại !");
			location("../login.php");
			return;
		}
	}
?>