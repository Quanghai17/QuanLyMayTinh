<?php
require('../model/Blog_db.php');
$action=filter_input(INPUT_POST,'action');
if($action==NULL){
    $action=filter_input(INPUT_GET, 'action');
    if($action==NULL){
        $action='list_blogs';
    }
}
if($action=='list_blogs'){
    $open ="blog";
    $blog= new Blog();
    $blogs=$blog->list();
    include('../view/blog/list.php');//chuyển dl trong mảng sang view
}
else if($action=='show_add_form'){
    include('../view/blog/add.php');
}
else if($action=='add_blog'){
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = postInput('title');
        $slug = to_slug(postInput('title'));
        $content = postInput('content');
        $create_at = date('Y-m-d');
        $blog = new Blog();
        $error = [];
        if(postInput('title')=='')
        {
            $error['title'] = "Mời bạn nhập đầy đủ nội dung";
            include('../view/blog/add.php');
        }
        if(empty($error['title']))
        {
            move_uploaded_file($_FILES['image']['tmp_name'],'../../public/upload/blog/'.$_FILES['image']['name']);
            $file_name = $_FILES['image']['name'];
            $blog->add(array('`blog_id`'=>'','`title`'=>"$name",'`content`'=>"$content",'`image`'=>"$file_name",'`create_at`'=>"$create_at"));
            $_SESSION['success'] = "Thêm mới thành công";
            header('Location: ?list_blogs');

        }
    }
}
else if($action=='view_blog'){
    $blog_id=$_GET['blog_id'];
    $blog= new Blog();
    $current_blog=$blog->list_id($blog_id);
    if(empty($current_blog))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        header('Location: ?list_blog');
    }
    else{
        include('../view/blog/edit.php');
    }
}
else if($action=='edit_category'){
    $id = postInput('id');
    $name = postInput('title');
    $slug = to_slug(postInput('title'));
    $content = postInput('content');
    $create_at = date('Y-m-d');
    $error = [];

    $img_name = '';
    $image_str = postInput('image_str');
    move_uploaded_file($_FILES['image']['tmp_name'], '../../public/upload/blog/' . $_FILES['image']['name']);
    $file_name = $_FILES['image']['name'];
    if (!empty($file_name)){
        $img_name = $file_name;
    }
    else{
        $img_name = $image_str;
    }
    $blog = new Blog();
    $blog->edit(array('`blog_id`'=>'','`title`'=>"$name",'`content`'=>"$content",'`image`'=>"$img_name",'`create_at`'=>"$create_at"), $id);
    if(empty($error))
    {
        $_SESSION['success'] = "Cập nhập thành công";
        header('Location: ?list_blog');
    }
}
else if($action=='del_blog'){
    $blog_id=$_GET['blog_id'];
    $blog= new Blog();
    $current_blog=$blog->list_id($blog_id);
    if(empty($current_blog))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        header('Location: ?list_blog');
    }
    $current_blog=$blog->del($blog_id);
    if($current_blog>0)
    {
        $_SESSION['success'] = "Xoá thành công";
        header('Location: ?list_blog');
    }
    else
    {
        $_SESSION['error'] = "Dữ liệu không thay đổi";
        header('Location: ?list_blog');
    }

}



?>