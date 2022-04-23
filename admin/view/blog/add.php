<!-- Đây là trang chủ admin -->
<?php require_once __DIR__."/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG-->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới bài viết
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-list"></i><a href="">Tin tức</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i> Thêm mới
            </li>
        </ol>
        <div class="clearfix">
            <?php require_once("../../testError/testError.php"); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="Blog.php" method="POST" enctype="multipart/form-data" >
            <div class="form-group row">
                <input type="hidden" name="action" value="add_blog">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tiêu đề bài viết</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nhập tiêu đề" name="title">
                    <?php if (isset($error['title'])): ?>
                        <p class="text-danger"><?php echo $error['title']; ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung bài viết</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="inputEmail3" placeholder="Nhập nội dung bài viết" name="content"></textarea>
                    <?php if (isset($error['content'])): ?>
                        <p class="text-danger"><?php echo $error['content']; ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" id="inputEmail3" name="image" />
                    <?php if (isset($error['image'])): ?>
                        <p class="text-danger"><?php echo $error['image']; ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.row -->
<?php require_once __DIR__."/../../layouts/footer.php"; ?>
