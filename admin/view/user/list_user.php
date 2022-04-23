<!-- Đây là list của category -->

 <?php require_once __DIR__."/../../layouts/header.php"; ?>          
    <!-- Page Heading NOI DUNG-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách thành viên
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Thành viên
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
                            <th>Tên thành viên</th>
                            <th>Email</th>
                            <th>Mật khẩu</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Quyền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $user['userName']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['password']; ?></td>
                            <td><?php echo $user['phone']; ?></td>
                            <td><?php echo $user['address']; ?></td>
                            <td><?php echo $user['level']==0 ? "User":"Admin"; ?></td>                          
                            <td><a href="?action=view_user&amp;user_id=<?php echo $user['userID']; ?>" class="btn-xs btn-info"><i class="fa fa-edit"></i>Edit</a>
                                <a href="?action=del_user&amp;user_id=<?php echo $user['userID']; ?>" class="btn-xs btn-danger"><i class="fa fa-times"></i>Del</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>                                   
                </table>
            </div>
        </div>
    </div>
<?php require_once __DIR__."/../../layouts/footer.php"; ?>       
                