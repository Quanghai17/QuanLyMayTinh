<!-- Đây là list của category -->

<?php require_once __DIR__."/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG-->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh sách tin tức
            <a href="?action=show_add_form" class="btn btn-success">Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Tin tức
            </li>
        </ol>
        <div class="clearfix">
            <?php require_once("../../testError/testError.php"); ?>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-m12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Ảnh</th>
                    <th>Ngày tạo</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($blogs as $blog): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $blog['title']; ?></td>
                        <td><?php echo $blog['content']; ?></td>
                        <td><img src='../../public/upload/blog/<?php echo $blog['image'];?>' width='100' heigth='100'/></td>
                        <td><?php echo $blog['create_at']; ?></td>
                        <td><a href="?action=view_blog&amp;blog_id=<?php echo $blog['blog_id']; ?>" class="btn-xs btn-info"><i class="fa fa-edit"></i>Edit</a>
                            <a href="?action=del_blog&amp;blog_id=<?php echo $blog['blog_id']; ?>" class="btn-xs btn-danger"><i class="fa fa-times"></i>Del</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <!-- <div class="pull-right">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> -->
        </div>
    </div>
</div>
<?php require_once __DIR__."/../../layouts/footer.php"; ?>
