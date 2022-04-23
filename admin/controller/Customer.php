<?php
	require('../model/Customer_db.php');
	$action=filter_input(INPUT_POST,'action');
	if($action==NULL){
		$action=filter_input(INPUT_GET, 'action');
		if($action==NULL){
			$action='list_customers';
		}
	}
	if($action=='list_customers'){
		$open ="customer";
		$customer= new Customer();
		$customers=$customer->list();
		include('../view/customer/list_customer.php');//chuyển dl trong mảng sang view
	}
	else if($action=='add_customer') {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = postInput('name');
            $mail = postInput('email');
            $content = postInput('content');
            $customer = new Customer();
            $id_add = $customer->add(array('`customer_id`' => '', '`name`' => "$name", '`email`' => "$mail", '`content`' => "$content"));
            if ($id_add > 0) {
                $_SESSION['success'] = "Cảm ơn bạn đã đóng góp ý kiến!";
                $idsp = $_POST['idsp'];
                header('Location:../../customer/product-details.php?idsp='.$idsp);
            } else {
                $_SESSION['error'] = "Nội dung không khả dụng";
            }
        }
    }
	else if($action=='del_customer'){
		$customer_id=$_GET['customer_id'];
		$customer= new Customer();
		$current_customer = $customer->list_id($customer_id);
		if(empty($current_customer))
		{
			$_SESSION['error'] = "Dữ liệu không tồn tại";
			header('Location: ?list_customers');
		}
		$current_customer=$customer->del($customer_id);
		if($current_customer>0)
		{
			$_SESSION['success'] = "Xoá thành công";
			header('Location: ?list_customers');
		}
		else
		{
			$_SESSION['error'] = "Dữ liệu không thay đổi";
			header('Location: ?list_customers');
		}
	}
?>