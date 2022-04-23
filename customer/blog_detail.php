<?php require_once __DIR__."/autoload/controller.php"; ?>
<?php require_once __DIR__."/layouts/header.php"; ?>
<section>
		<div class="container">
			<div class="row">
				<?php require_once __DIR__."/layouts/menu-left.php"; ?>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Chi tiết bài viết</h2>
						<div class="single-blog-post">
							<h2 style="text-align: center; margin-bottom: 20px;"><?php echo $blog['title']; ?></h2>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-calendar"></i> </i> <?php echo $blog['create_at']; ?></li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="../public/upload/blog/<?php echo $blog['image'];?>" alt="">
							</a>
							<p>
                                <?php echo $blog['content']; ?>
							</p>
							<div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="blog_detail.php?action=get_view_blog_detail&amp;idblog=<?php echo $blog['blog_id']; ?>">Trước</a></li>
									<li><a href="blog_detail.php?action=get_view_blog_detail&amp;idblog=<?php echo $blog['blog_id']; ?>">Sau</a></li>
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->

					<div class="rating-area">
						<ul class="ratings">
							<li class="rate-this">Đánh giá:</li>
							<li>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</li>
							<li class="color">(6 votes)</li>
						</ul>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Laptop <span>/</span></a></li>
							<li><a class="color" href="">PC <span>/</span></a></li>
							<li><a class="color" href="">Phụ kiện</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

				</div>
			</div>
		</div>
	</section>
<?php require_once __DIR__."/layouts/footer.php"; ?>