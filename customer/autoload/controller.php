<?php
require('autoload.php');

$db = new DB_driver();
//lấy danh sách danh mục sản phẩm;
$categories = $db->select('category');

// Lấy danh sách tất cả sản phẩm theo giảm dần của ngày tạo ======Sản phẩm mới nhất
$products = $db->sort_desc_limit('product', 1, 'ceated_pro', 3);

//lấy danh mục sản phẩm có home = 1
$sqlHomecate = "SELECT categoryName,categoryID FROM category WHERE home=1 ORDER BY updated_at";
$cateHome = $db->fetchsql($sqlHomecate);
//Lấy các sản phẩm của category được active
$data = [];
foreach ($cateHome as $home) {
    $cateID = intval($home['categoryID']);
    $sql = "SELECT * FROM product WHERE categoryID = $cateID LIMIT 3";
    $productHome = $db->fetchsql($sql);
    $data[$home['categoryName']] = $productHome; //mảng 2 chiều lưu trữ giá trị sản phẩm theo từng danh mục sản phẩm
}

//lấy sản phẩm theo id sản phẩm
$idsp = intval(getInput("idsp"));
$sp = $db->select_id("product", "productID = $idsp");

//Lấy sản phẩm theo danh mục sản phẩm
$idDM = intval(getInput("iddm"));
$tenDM = getInput("name");
$sqlSanPhamTheoDM = "SELECT * FROM product WHERE categoryID = $idDM";
$productDMs = $db->fetchsql($sqlSanPhamTheoDM);

// Lấy danh sách tất cả sản phẩm theo giảm dần của lượt view
$sqlnew = "SELECT * FROM product WHERE 1 ORDER BY view DESC LIMIT 3";
$products2 = $db->fetchsql($sqlnew);

//get customer
$sql_cus= "SELECT * FROM customer WHERE 1 ORDER BY created_at DESC LIMIT 3";
$customers = $db->fetchsql($sql_cus);


//xử lý phần login
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $p = '';
    if ($_POST['email'] == NULL) {
        $error['email'] = 'Bạn chưa nhập email';
    } else {
        $u = $_POST['email'];
    }
    if ($_POST['password'] == NULL) {
        $error['password'] = 'Bạn chưa nhập mật khẩu';
    } else {
        $p = $_POST['password'];
    }
    if ($u && $p) {
        $isset = $db->fetchOne("user", "email = '" . $u . "' AND password = '" . md5($p) . "' ");
        if ($isset && $isset > 0) {
            // $sql = "SELECT * FROM user WHERE email = '".$u."' AND password = '".md5($p)."' LIMIT 1";
            // $user = $db->fetchsql($sql);
            //header("Location:index.php");
            $_SESSION['userName'] = $isset['userName'];
            $_SESSION['userID'] = $isset['userID'];
            $_SESSION['level'] = $isset['level'];
            if ($isset['level'] == 0) {
                echo "<script> alert('Đăng nhập thành công'); location.href='index.php' </script>; ";
            } else {
                $_SESSION['user'] = 'admin';
                header("Location:../admin/index.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Bạn chưa có tài khoản, Mời đăng kí";
            echo "<script> alert('Bạn chưa có tài khoản, Mời đăng kí'); location.href='login.php' </script>; ";
        }

    }
}
$id_user = $_SESSION['userID'];
$name_cart = 'cart' . $id_user;

$action = filter_input(INPUT_GET, 'action');
if ($action == 'get_view') {
    $id_sp = $sp["productID"];
    // Tên chức năng
    $function = 'view';
    // Khởi tạo tên session là chuỗi gồm tên chức năng và id bài viết, mục đích tránh trùng ID với những chức năng khác, bạn có thể thêm một giá trị nào đó, để chắc chắn chuỗi này không bao giờ trùng với mỗi chuỗi nào khác.
    $cookie_name = $function . '_' . $id_sp;
    $_COOKIE[$cookie_name] = 0;
    // Lấy giá trị cookie.
    $check_view = $_COOKIE[$cookie_name];
    //tạo cookie
    setcookie($cookie_name, $check_view, time() + 3600, "/");
    if (empty($check_view)) {
        // Gán giá trị cookie
        $_COOKIE[$cookie_name] = 1;

        // Thực hiện cập nhật lượt xem, cộng dồn thêm 1
        $sql = 'UPDATE product SET view=view+1 WHERE productID=' . $id_sp;
        $sp3 = $db->fetchsql_2($sql);
    }
}
//     elseif($action=='search_pro')
//     {
//         $name = $_POST['keywork'];
//         $sqlSearch = "SELECT * FROM product WHERE productName = $name";
//         $productSearch = $db->fetchsql($sqlSearch);
//         echo $productSearch;
//         if($productSearch == null)
//         {
//
//             include('index.php');
//             echo "<script type='text/javascript'>
//                     alert('Không tồn tại sản phẩm');
//                     </script>";
//         }
//         else
//         {
//             header('location: product-search.php');
//         }
//     }
$blogs = $db->select('blog');
if ($action == 'get_view_blog_detail') {
    $idbl = intval(getInput("idblog"));
    $blog = $db->select_id("blog", "blog_id = $idbl");
}
?>