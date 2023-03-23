<?php require_once __DIR__."/autoload/controller.php"; ?>
<?php require_once __DIR__."/layouts/header.php"; ?>
	<section id="slider"><!--slider-->
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12">
	                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
	                        <ol class="carousel-indicators">
	                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
	                            <li data-target="#slider-carousel" data-slide-to="1"></li>
	                            <li data-target="#slider-carousel" data-slide-to="2"></li>
	                        </ol>
	                        
	                        <div class="carousel-inner">
	                            <div class="item active" style="width: 100%; height: 40%;">
<!--	                                <div class="col-sm-6">-->
<!--	                                    <h1><span>SKY</span>-SHOPPER</h1>-->
<!--	                                    <h2>Sale S-Shop </h2>-->
<!--	                                    <p>Siêu khuyến mãi từ 02/2020 - 09/2020</p>-->
<!--	                                    <button type="button" class="btn btn-default get">Get it now</button>-->
<!--	                                </div>-->
<!--	                                <div class="col-sm-6">-->
	                                    <img src="../public/frontend/images/bg1.png" class="girl img-responsive" alt="" />
<!--	                                    <img src="images/home/pricing.png"  class="pricing" alt="" />-->
<!--	                                </div>-->
	                            </div>
	                            <div class="item" style="width: 100%; height: 40%;">
	                                <img src="../public/frontend/images/bg2.png" class="girl img-responsive"  alt="" />
	                            </div>
	                            
	                            <div class="item" style="width: 100%; height: 40%;">
	                                <img src="../public/frontend/images/bg3.png" class="girl img-responsive"  alt="" />
	                            </div>
	                            
	                        </div>
	                        
	                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
	                            <i class="fa fa-angle-left" style="margin-left: 32px"></i>
	                        </a>
	                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
	                            <i class="fa fa-angle-right" style="margin-right: 32px"></i>
	                        </a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	    </section><!--/slider-->
			<?php require_once __DIR__."/layouts/menu-left.php"; ?>
				<div class="col-sm-9 padding-right">
					<?php foreach ($data as $key => $products):?>
					<div class="features_items clearfix"><!--features_items-->
						
							<h2 class="title text-center"><?php echo $key; ?></h2>
							<?php foreach ($products as $product-detail) : ?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="product-details.php?action=get_view&amp;idsp=<?php echo $product['productID']; ?>">
												<img src="../public/upload/product/<?php echo $product['image_pro'];?>" width="100%" height="250px"/>
											</a>
											<h5><?php echo $product['productName']; ?></h5>
											<p><b style="color: #E10C00;"><?php echo formatnumber($product['price']); ?></b></p>
											
										</div>	
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
<!--											<li><a href="#"><i class="fa fa-heart" style="color:red;"></i>Yêu thích</a></li>-->
											<li><a href="add-cart.php?idsp=<?php echo $product['productID'] ?>"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a></li>
										</ul>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
					</div><!--features_items-->
					<?php endforeach; ?>
					
				</div>
			</div>
		</div>
	</section>
<?php require_once __DIR__."/layouts/footer.php"; ?>
 
	
	
