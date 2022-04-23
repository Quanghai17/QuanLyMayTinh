<?php 
	require('../model/Category_db.php'); 
	$action=filter_input(INPUT_POST,'action');
	if($action==NULL){
		$action=filter_input(INPUT_GET, 'action');
		if($action==NULL){
			$action='list_categories';
		}
	}
	if($action=='list_categories'){
		$open ="category";
		$category= new Category();
		$categories=$category->list();
		include('../view/category/list.php');//chuyển dl trong mảng sang view
	}
	else if($action=='show_add_form'){
		include('../view/category/add.php');
	}
	else if($action=='add_category'){
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$name = postInput('name');
			$slug = to_slug(postInput('name'));
			$category = new Category();
			$error = [];
			if(postInput('name')=='')
			{
				$error['name'] = "Mời bạn nhập đầy đủ danh mục";
				include('../view/category/add.php');
			}
			if(empty($error['name']))
			{	
				$isset = $category->limit($name);
				if( $isset && count($isset)>0)
				{
					$_SESSION['error'] = "Tên danh mục đã tồn tại";
					include('../view/category/add.php');
				}
				else
				{
					$category->add(array('`categoryID`'=>'','`categoryName`'=>"$name",'`slug`'=>"$slug"));	
					$_SESSION['success'] = "Thêm mới thành công";
					header('Location: ?list_categories');
				}
				
			}
		}
	}
	else if($action=='view_category'){
		$category_id=$_GET['category_id'];
		$category= new Category();
		$current_category=$category->list_id($category_id);
		if(empty($current_category))
		{
			$_SESSION['error'] = "Dữ liệu không tồn tại";
			header('Location: ?list_categories');
		}
		else{
			include('../view/category/edit.php');
		}
	}
	else if($action=='edit_category'){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$slug = to_slug(postInput('name'));
		$category= new Category();
		$error = [];
		$category->edit(array('categoryName'=>"$name",'slug'=>"$slug"),$id);
		if(empty($error))
		{	
			$_SESSION['success'] = "Cập nhập thành công";
			header('Location: ?list_categories');
		}
	}
	elseif ($action=='back_home') {
		$category_id=$_GET['id'];
		$category= new Category();
		$current_category=$category->list_id($category_id);
		if(empty($current_category))
		{
			$_SESSION['error'] = "Dữ liệu không tồn tại";
			header('Location: ?list_categories');
		}
		else{
			
			$home = $current_category['home'] == 0 ? 1 : 0;
			$update = $category->edit(array('home'=>"$home"),$category_id);
			if($update>0)
			{
				$_SESSION['success'] = "Cập nhập thành công";
				header('Location: ?list_categories');
			}
			else
			{
				$_SESSION['error'] = "Dữ liệu không thay đổi";
				header('Location: ?list_categories');
			}
		}
	}
	else if($action=='del_category'){
		$category_id=$_GET['category_id'];
		$category= new Category();
		$current_category=$category->list_id($category_id);

		$isset = $category->limit2($category_id);
		if($isset == NULL)
		{
			if(empty($current_category))
			{
				$_SESSION['error'] = "Dữ liệu không tồn tại";
				header('Location: ?list_categories');
			}
			$current_category=$category->del($category_id);
			if($current_category>0)
			{
				$_SESSION['success'] = "Xoá thành công";
				header('Location: ?list_categories');
			}
			else
			{
				$_SESSION['error'] = "Dữ liệu không thay đổi";
				header('Location: ?list_categories');
			}
		}
		else
		{
			$_SESSION['error'] = "Danh mục có sản phẩm, Bạn không thể xóa";
			header('Location: ?list_categories');
		}
		
	}



 ?>