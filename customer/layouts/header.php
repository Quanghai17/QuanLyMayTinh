<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Sky-Shop</title>
    <link href="../public/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="../public/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="../public/frontend/css/price-range.css" rel="stylesheet">
    <link href="../public/frontend/css/animate.css" rel="stylesheet">
    <link href="../public/frontend/css/main.css" rel="stylesheet">
    <link href="../public/frontend/css/responsive.css" rel="stylesheet">

    <link href="../public/frontend/css/style.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

     <style>
        .img1{
            width: 194px;
            height: 106px;
        }
        .form-inline .form-group {
        display: inline-block;
        margin-top: 50px;
        vertical-align: middle;
    }
    .mainmenu ul li a{
        color: #FE980F;
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 700;
    margin: 0 15px;
    text-transform: uppercase;
    margin-bottom: -22px;
    position: relative;
    }
    </style>
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +84 234 567 89</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@skyshop.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <?php if(isset($_SESSION['userName'])):?>
                                    <li><a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['userName']; ?></a></li>
                                    <?php if($_SESSION['level']==0):  ?>
                                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                    <?php else: ?>
                                        <li><a href="../admin/index.php"><i class="fa fa-crosshairs"></i>Trang quản trị</a></li>
                                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                    <?php endif; ?>
                                     <li><a href="logout.php"><i class="fa fa-share-square-o"></i>Thoát</a></li>
                                     
                                <?php else: ?>
                                    <li><a href="login.php"><i class="fa fa-lock"></i> Đăng nhập/Đăng kí</a></li>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle" ><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left ">
                            <a href="index.php"><img class="img1" src="../public/frontend/images/logo (1).png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8" >
                        <!-- style="padding-right: 0; padding-top: 88px;" -->
                        <div class="shop-menu pull-right">
                            <form class="form-inline" method="get" action="search.php">
                                <div class="form-group">  
                                    <input type="hidden" name="action" value="search_pro" >                                
                                    <input type="text" name="keywork" placeholder="Search" class="form-control" style="width: 81%">
                                    <button type="submit" class="btn btn-default" name="ok"><i class="fa fa-search"></i></button>
                                </div>                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12" >
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left" >
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php" >Trang chủ</a></li>
                                <li><a href="product.php">Sản phẩm</a>
                                </li> 
                                <li><a href="blog.php">Tin tức</a>
                                </li> 
                                <!-- <li><a href="404.html">404</a></li> -->
                                <li><a href="contact-us.php">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
  