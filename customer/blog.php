<?php require_once __DIR__."/autoload/controller.php"; ?>
<?php require_once __DIR__."/layouts/header.php"; ?>
<section>
    <div class="container">
        <div class="row">
            <?php require_once __DIR__."/layouts/menu-left.php"; ?>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Tin tức mới nhất</h2>
                    <?php foreach ($blogs as $blog) : ?>
                        <div class="single-blog-post" style="margin-bottom: 20px;">
                        <h3><?php echo $blog['title']; ?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i> <?php echo $blog['create_at']; ?></li>
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
                            <img src="../public/upload/blog/<?php echo $blog['image'];?>" alt="" style="width: 100%; height: 300px;">
                        </a>
                        <p>
                            <?php echo substr($blog['content'],0,400); ?>
                        </p>
                        <a  class="btn btn-primary" href="blog_detail.php?action=get_view_blog_detail&amp;idblog=<?php echo $blog['blog_id']; ?>">Xem thêm >></a>
                    </div>
                    <?php endforeach; ?>
<!--                    <div class="pagination-area">-->
<!--                        <ul class="pagination">-->
<!--                            <li><a href="" class="active">1</a></li>-->
<!--                            <li><a href="">2</a></li>-->
<!--                            <li><a href="">3</a></li>-->
<!--                            <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once __DIR__."/layouts/footer.php"; ?>