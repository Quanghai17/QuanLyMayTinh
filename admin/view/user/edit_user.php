<!-- Đây là trang chủ admin -->
 <?php require_once __DIR__."/../../layouts/header.php"; ?>          
        <!-- Page Heading NOI DUNG-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Sửa thông tin khách hàng
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-list"></i><a href="">Danh mục</a>
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
                <form class="form-horizontal" action="User.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <input type="hidden" name="action" value="edit_user">
                        <input type="hidden" name="id" value="<?php echo $current_user['userID'] ?>">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên khách hàng</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php echo $current_user['userName'] ?>" name="name">
                            <?php if (isset($error['name'])): ?>
                                <p class="text-danger"><?php echo $error['name']; ?></p>
                            <?php endif ?>                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="inputEmail3" value="<?php echo $current_user['email']; ?>" name="email">
                            <?php if(isset($error['code'])): ?>
                                <p class="text-danger"><?php //echo $error['code']; ?></p>
                            <?php endif ?>                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mật khẩu</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="inputEmail3" value="<?php echo $current_user['password']; ?>" name="password">                       
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Điện thoại</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="inputEmail3" value="<?php echo $current_user['phone'] ?>" name="phone">                         
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="10%" name="address" value="<?php echo $current_user['address'] ?>" />                     
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Quyền</label>
                        <div class="col-sm-3">
                            <select class="form-control" name= "level"> 
                                    <option value="0" <?php echo $current_user['level'] == 0 ? "selected = 'selected'" : ''; ?>>User</option>
                                    <option value="1" <?php echo $current_user['level'] == 1 ? "selected = 'selected'" : ''; ?>>Admin</option>
                            </select>  
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
                