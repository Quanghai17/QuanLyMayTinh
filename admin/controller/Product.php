<?php 
	require('../model/Product_db.php');
	require('../model/Category_db.php');
	$action=filter_input(INPUT_POST,'action');
	if($action==NULL){
		$action=filter_input(INPUT_GET, 'action');
		if($action==NULL){
			$action='list_products';
		}
	}
	if($action=='list_products'){
		$open ="product";
		$product= new Product();
		$products=$product->list_join();
		include('../view/product/list_pro.php');//chuyển dl trong mảng sang view
	}
	else if($action=='show_add_form'){
		$category = new Category();
		$categories = $category->list();
		include('../view/product/add_pro.php');
	}
	else if($action=='add_product'){
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$name = postInput('name');
			$slug = to_slug(postInput('name'));
			$cate  = postInput('cateName');
			$des = postInput('content');
			$price = postInput('price');
			$sale = postInput('sale');
			$code = postInput('code');
			$color = postInput('color');
			$number = postInput('number');
			$create_at = date('Y-m-d');
			$product = new Product();
			$error = [];
			if(postInput('name')=='')
			{
				$error['name'] = "Mời bạn nhập đầy đủ tên sản phẩm";
				$category = new Category();
				$categories = $category->list();
				include('../view/product/add_pro.php');
			}	
			if(empty($error))
			{
				
				$isset = $product->limit($code);
				if($isset && count($isset)>0)
				{
					$_SESSION['error'] = "Trùng code";
					$category = new Category();
					$categories = $category->list();
					include('../view/product/add_pro.php');
				}
				else
				{	

					move_uploaded_file($_FILES['image']['tmp_name'],'../../public/upload/product/'.$_FILES['image']['name']);
					$file_name = $_FILES['image']['name'];
					$product->add(array('`productID`'=>'','`productName`'=>"$name",'`price`'=>"$price",'`sale`'=>"$sale",'`image_pro`'=>"$file_name",'`categoryID`'=>"$cate",'`productCode`'=>"$code",'`color`'=>"$color",'`number`'=>"$number",'`slug_pro`'=>"$slug",'`description`'=>"$des",'`ceated_pro`'=>"$create_at"));
					$_SESSION['success'] = "Thêm mới thành công";
					header('Location: ?list_products');
				}
			}
		}
	}
	else if($action=='view_product'){
		$product_id=$_GET['product_id'];
		$product= new product();
		$current_product=$product->list_id($product_id);
		$category = new Category();
		$categories = $category->list();
		if(empty($current_product))
		{
			$_SESSION['error'] = "Dữ liệu không tồn tại";
			header('Location: ?list_categories');
		}
		else{
			include('../view/product/edit_pro.php');
		}
	}
	else if($action=='edit_product'){
		$id = postInput('id');
		$name = postInput('name');
		$slug = to_slug(postInput('name'));
		$cate  = postInput('cateName');
		$des = postInput('content');
		$price = postInput('price');
		$sale = postInput('sale');
		$code = postInput('code');
		$color = postInput('color');
		$number = postInput('number');
		$update_at = date('Y-m-d');
		$error = [];
//		xử lý img=============
        $img_name = '';
        $image_str = postInput('image_str');
        move_uploaded_file($_FILES['image']['tmp_name'], '../../public/upload/product/' . $_FILES['image']['name']);
        $file_name = $_FILES['image']['name'];
        if (!empty($file_name)){
            $img_name = $file_name;
        }
        else{
            $img_name = $image_str;
        }
        $product= new product();
        $product->edit(array('`productName`' => "$name", '`price`' => "$price", '`sale`' => "$sale", '`image_pro`' => "$img_name", '`categoryID`' => "$cate", '`productCode`' => "$code", '`color`' => "$color", '`number`' => "$number", '`slug_pro`' => "$slug", '`description`' => "$des", '`update_pro`' => "$update_at"), $id);
		if(empty($error))
		{
			$_SESSION['success'] = "Cập nhập thành công";
			header('Location: ?list_categories');
		}
	}
	else if($action=='del_product'){
		$product_id=$_GET['product_id'];
		$product= new product();
		$current_product=$product->list_id($product_id);
		if(empty($current_product))
		{
			$_SESSION['error'] = "Dữ liệu không tồn tại";
			header('Location: ?list_categories');
		}
		$current_product=$product->del($product_id);
		if($current_product>0)
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



 ?>