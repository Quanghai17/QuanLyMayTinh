
 <?php require_once __DIR__."/../../layouts/header.php"; ?>
    <!-- Page Heading NOI DUNG-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách bình luận
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Bình luận
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
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Nội dung</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($customers as $customer): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $customer['name']; ?></td>
                            <td><?php echo $customer['email']; ?></td>
                            <td><?php echo $customer['content']; ?></td>
                            <td><?php echo $customer['created_at']; ?></td>
                            <td><a href="?action=del_customer&amp;customer_id=<?php echo $customer['customer_id']; ?>" class="btn-xs btn-danger"><i class="fa fa-times"></i>Del</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once __DIR__."/../../layouts/footer.php"; ?>
