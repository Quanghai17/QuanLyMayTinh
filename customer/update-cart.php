<?php
	require_once __DIR__."/autoload/controller.php";
	if(!isset($_SESSION['userID']))
	{
		echo "<script> alert('Hãy đăng nhập để thực hiện mua hàng!'); location.href='index.php' </script>; ";
	}
    else{
        //$id_user = $_SESSION['userID'];
    	$idsp = intval(getInput("idsp"));
    	//lấy thông tin chi tiết của sản phẩm
        $sp = $db->select_id("product","productID = $idsp");
        //$name_cart = 'cart'.$id_user
        //Kiểm tra nếu tồn tại thì cập nhập giỏi hàng
        //Ngược lại thì tạo mới
        if(!isset($_SESSION[$name_cart][$idsp]))
        {
        	//Nếu không tồn tại => thêm mới
        	$_SESSION[$name_cart][$idsp]['id'] = $sp['productID'];
            $_SESSION[$name_cart][$idsp]['name'] = $sp['productName'];
        	$_SESSION[$name_cart][$idsp]['img'] = $sp['image_pro'];
            $_SESSION[$name_cart][$idsp]['des'] = $sp['description'];
            $_SESSION[$name_cart][$idsp]['code'] = $sp['productCode'];
        	$_SESSION[$name_cart][$idsp]['price'] = ($sp['price']*(100-$sp['sale']))/100;
        	$_SESSION[$name_cart][$idsp]['qty'] = 1;
        }
        else
        {
        	//Cập nhập giỏ hàng
        	$_SESSION[$name_cart][$idsp]['qty'] += 1;
        }
        echo "<script> alert('Thêm sản phẩm thành công!'); location.href='cart.php' </script>; ";
    }
?>