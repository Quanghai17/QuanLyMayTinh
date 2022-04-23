<?php 
	require('../model/User_db.php');
	$action=filter_input(INPUT_POST,'action');
	if($action==NULL){
		$action=filter_input(INPUT_GET, 'action');
		if($action==NULL){
			$action='list_users';
		}
	}
	if($action=='list_users'){
		$open ="user";
		$user= new User();
		$users=$user->list();
		include('../view/user/list_user.php');//chuyển dl trong mảng sang view
	}
	else if($action=='add_user'){
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$name = postInput('name');
			$mail = postInput('email');
			$password = md5(postInput('password'));
			$phone = postInput('phone');
			$address = postInput('address');
			$level = postInput('level');
			$user = new User();		
			$isset = $user->limit($mail);
			//var_dump($isset);
			if( $isset && count($isset)>0)
			{
				$_SESSION['error'] = "Trùng mail";
				header('location:../../customer/login.php');
			}
			else
			{			
				$id_add=$user->add(array('`userID`'=>'','`userName`'=>"$name",'`email`'=>"$mail",'`password`'=>"$password",'`phone`'=>"$phone",'`address`'=>"$address",'`level`'=>"$level"));
				if($id_add>0)
				{
					$_SESSION['success'] = "Đăng kí thành công, mời bạn đăng nhập!";
					header('Location:../../customer/login.php');	
				}
				else
				{
					$_SESSION['error'] = "Thêm mới thất bại";
			 	}
			}
		}
	}
	else if($action=='view_user'){
		$user_id=$_GET['user_id'];
		$user= new User();
		$current_user=$user->list_id($user_id);		
		if(empty($current_user))
		{
			$_SESSION['error'] = "Dữ liệu không tồn tại";
			header('Location: ?list_users');
		}
		else{
			include('../view/user/edit_user.php');
		}
	}
	else if($action=='edit_user'){
		$id = postInput('id');
		$name = postInput('name');
		$mail = postInput('email');
		$password = md5(postInput('password'));
		$phone = postInput('phone');
		$address = postInput('address');
		$user= new User();
		$error = [];		
		$user->edit(array('`userName`'=>"$name",'`email`'=>"$mail",'`password`'=>"$password",'`phone`'=>"$phone",'`address`'=>"$address"),$id);
		if(empty($error))
		{	
			$_SESSION['success'] = "Cập nhập thành công";
			header('Location: ?list_users');
		}
	}
	else if($action=='del_user'){
		$user_id=$_GET['user_id'];
		$user= new User();
		$current_user=$user->list_id($user_id);
		if(empty($current_user))
		{
			$_SESSION['error'] = "Dữ liệu không tồn tại";
			header('Location: ?list_users');
		}
		$current_user=$user->del($user_id);
		if($current_user>0)
		{
			$_SESSION['success'] = "Xoá thành công";
			header('Location: ?list_users');
		}
		else
		{
			$_SESSION['error'] = "Dữ liệu không thay đổi";
			header('Location: ?list_users');
		}
	}



 ?>