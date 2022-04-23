<!-- Đây là trang chủ admin -->
<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG-->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Sửa bài viết
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-list"></i><a href="">Bài viết</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i> Thêm mới
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="Blog.php" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <input type="hidden" name="action" value="edit_category">
                <input type="hidden" name="id" value="<?php echo $current_blog['blog_id']; ?>">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tên danh mục</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="new category" name="title"
                           value="<?php echo $current_blog['title']; ?>">
                    <?php require_once("../../testError/testError.php"); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung bài viết</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="inputEmail3" placeholder="Nhập nội dung bài viết"
                              name="content" value="<?php echo ($current_blog['content']); ?>"><?php echo ($current_blog['content']); ?></textarea>
                    <?php if (isset($error['content'])): ?>
                        <p class="text-danger"><?php echo $error['content']; ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputEmail3" name="image"
                           value="<?php echo $current_blog['image']; ?>"/>
                    <input type="hidden" class="form-control" id="inputEmail3" name="image_str"
                           value="<?php echo $current_blog['image']; ?>"/>
                    <?php if (isset($error['image'])): ?>
                        <p class="text-danger"><?php echo $error['image']; ?></p>
                    <?php endif ?>
                    <img src='../../public/upload/blog/<?php echo $current_blog['image']; ?>' width='100'
                         heigth='100'/>
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
<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>
