<?php require_once __DIR__."/autoload/controller.php";
	$idsp = intval(getInput("idsp"));
	unset($_SESSION[$name_cart][$idsp]);
	$_SESSION['success'] = "Xóa giỏ hàng thành công!";
	header("location: cart.php");
 ?>