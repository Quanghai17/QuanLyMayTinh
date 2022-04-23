<!-- Đây là trang chủ admin -->
 <?php require_once __DIR__."/../../layouts/header.php"; ?>          
        <!-- Page Heading NOI DUNG-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Thêm mới sản phẩm
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
                <form class="form-horizontal" action="Product.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <input type="hidden" name="action" value="add_product">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="new product" name="name">
                            <?php if (isset($error['name'])): ?>
                                <p class="text-danger"><?php echo $error['name']; ?></p>
                            <?php endif ?>                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Danh mục sản phẩm</label>
                        <div class="col-sm-8">
                            <select class="form-control" name= "cateName">
                                <?php foreach($categories as $category):?> 
                                    <option value="<?php echo $category['categoryID'];?>"><?php echo $category['categoryName']; ?></option>
                                <?php endforeach; ?>
                            </select>                         
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="action" value="add_product">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mã code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="new product" name="code">
                            <?php if (isset($error['code'])): ?>
                                <p class="text-danger"><?php echo $error['code']; ?></p>
                            <?php endif ?>                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="inputEmail3" placeholder="20$" name="price">
                            <?php if (isset($error['price'])): ?>
                                <p class="text-danger"><?php echo $error['price']; ?></p>
                            <?php endif ?>                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Giảm giá</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="inputEmail3" placeholder="10%" name="sale" value="0" />                     
                        </div>

                        <label for="inputEmail3" class="col-sm-1 col-form-label">Hình ảnh</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" id="inputEmail3" name="image" /> 
                            <?php if (isset($error['image'])): ?>
                                <p class="text-danger"><?php echo $error['image']; ?></p>
                            <?php endif ?>                      
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Màu sắc</label>
                        <div class="col-sm-3">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-secondary active">
                                <input type="radio" value="Black" name="color" id="option1" autocomplete="off" checked> Black
                              </label>
                              <label class="btn btn-secondary">
                                <input type="radio" value="Pink" name="color" id="option2" autocomplete="off"> Pink
                              </label>
                              <label class="btn btn-secondary">
                                <input type="radio" value="Gray" name="color" id="option3" autocomplete="off"> Gray
                              </label>
                            </div>                
                        </div>

                        <label for="inputEmail3" class="col-sm-1 col-form-label">Số lượng</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="inputEmail3" placeholder="0" name="number" />                     
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung</label>
                        <div class="col-sm-8">
                            <textarea name="content" rows="4" class="form-control"></textarea>
                            <?php if (isset($error['content'])): ?>
                                <p class="text-danger"><?php echo $error['content']; ?></p>
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
                