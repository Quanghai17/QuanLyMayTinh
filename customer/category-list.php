<?php require_once __DIR__."/autoload/controller.php"; ?>
<?php require_once __DIR__."/layouts/header.php"; ?>

			<?php require_once __DIR__."/layouts/menu-left.php"; ?>
				<div class="col-sm-9 padding-right">
					<div class="features_items clearfix"><!--features_items-->
						<h2 class="title text-center"><?php echo $tenDM; ?></h2>
						<?php foreach ($productDMs as $product) : ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="product-details.php?idsp=<?php echo $product['productID']; ?>">
											<img src="../public/upload/product/<?php echo $product['image_pro'];?>" width="100%" height="250px"/>
										</a>
										<h5><?php echo $product['productName']; ?></h5>
										<p><b style="color: #E10C00;"><?php echo formatnumber($product['price']); ?></b></p>
										
									</div>
									
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
<!--										<li><a href="#"><i class="fa fa-heart" style="color:red;"></i>Yêu thích</a></li>-->
										<li><a href="#"><i class="fa fa-plus-square"></i>Bình luận</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						
					</div><!--features_items-->
					
					
				</div>
			</div>
		</div>
	</section>
<?php require_once __DIR__."/layouts/footer.php"; ?>
 
	
	