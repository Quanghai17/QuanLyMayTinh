<?php require_once __DIR__ . "/autoload/controller.php";
?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
<?php require_once __DIR__ . "/layouts/menu-left.php"; ?>
<style>
    .view-product img {
    /* border: 1px solid #F7F7F0; */
    height: 73%;
    width: 125%;
    }
    .product-information {
        /* border: 1px solid #F7F7F0; */
        overflow: hidden;
        padding-bottom: 60px;
        padding-left: 148px;
        padding-top: 81px;
        position: relative;
    }
</style>

    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="../public/upload/product/<?php echo $sp['image_pro']; ?>" alt=""/>

                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                    <h2><?php echo $sp['productName']; ?></h2>
                    <p>Mã code: <?php echo $sp['productCode']; ?></p>
                    <p><img src="../public/frontend/images/rating.png" alt=""/></p>
                    <span>
									<span><?php echo formatnumber($sp['price']); ?></span>
								</span>
                    <p>Số lượng:
                        <input type="number" value="1" style="width: 45px; margin-left: 10px; margin-left: 20px;"/>
                        <button type="button" class="btn btn-fefault cart">
                            <a href="add-cart.php?idsp=<?php echo $sp['productID'] ?>" style="color:black">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </a>
                        </button>
                    </p>
                    <a href=""><img src="../public/frontend/images/share.png" class="share img-responsive" alt=""/></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
                    <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="details">
                    <div class="col-sm-12">
                        <?php echo $sp['description']; ?>
                    </div>
                </div>

                <div class="tab-pane fade active in" id="reviews">
                    <div class="col-sm-12">
                        <ul>
                            <!--										<li><a href=""><i class="fa fa-user"></i>Admin</a></li>-->
                            <!--										<li><a href=""><i class="fa fa-clock-o"></i>-->
                            <?php //echo date("h:i"); ?><!--</a></li>-->
                            <li><a href=""><i class="fa fa-calendar-o"></i><?php echo $sp['ceated_pro']; ?></a></li>
                        </ul>
                        <!--									<p>--><?php //echo $sp['description']; ?><!--</b></p>-->
                        <?php require_once("../testError/testError.php"); ?>
                        <form action="../admin/controller/Customer.php" method="POST">
                            <input type="hidden" name="idsp" value="<?php echo $sp['productID']; ?>">
                            <input type="hidden" name="action" value="add_customer">
                            <span>
											<input type="text" placeholder="Your Name" name="name"/>
											<input type="email" placeholder="Email Address" name="email"/>
										</span>
                            <textarea name="content"></textarea>
                            <!--										<b>Rating: </b> <img src="../public/frontend/images/rating.png" alt="" />-->
                            <button type="submit" class="btn btn-default pull-right">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->
        <div class="response-area" style="margin-left: 15px;">
            <h2>Bình luận</h2>
            <ul class="media-list">
                <?php foreach ($customers as $customer) : ?>
                    <li class="media">
                        <div class="media-body">
                            <ul class="sinlge-post-meta">
                                <li><i class="fa fa-user"></i><?php echo $customer['name']; ?></li>
                                <li><i class="fa fa-calendar"></i> <?php echo $customer['created_at']; ?></li>
                            </ul>
                            <p><?php echo $customer['content']; ?></p>
                            <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div><!--/Response-area-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Sản phẩm đề xuất</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <div class="item active">
                        <?php foreach ($products as $key) : ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo2 text-center">
                                            <img src="../public/upload/product/<?php echo $key['image_pro']; ?>"/>
                                            <h5><?php echo $product['productName']; ?></h5>
                                            <p>
                                                <b style="color: #E10C00;"><?php echo formatnumber($product['price']); ?></b>
                                            </p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="item">
                        <?php foreach ($products as $key) : ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo2 text-center">
                                            <img src="../public/upload/product/<?php echo $key['image_pro']; ?>"/>
                                            <h5><?php echo $product['productName']; ?></h5>
                                            <p>
                                                <b style="color: #E10C00;"><?php echo formatnumber($product['price']); ?></b>
                                            </p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->

    </div>
    </div>
    </div>
    </section>

<?php require_once __DIR__ . "/layouts/footer.php"; ?>