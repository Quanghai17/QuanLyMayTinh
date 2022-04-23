<!-- Đây là list của category -->

 <?php require_once __DIR__."/../../layouts/header.php"; ?>          
    <!-- Page Heading NOI DUNG-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách sản phẩm
                <a href="?action=show_add_form" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Sản phẩm
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
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Slug</th>
                            <th>Thông tin</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $product['productName']; ?></td>
                            <td><?php echo $product['categoryName']; ?></td>
                            <td><img src='../../public/upload/product/<?php echo $product['image_pro'];?>' width='100' heigth='100'/></td>
                            <td><?php echo $product['slug_pro']; ?></td>
                            <td>
                                <ul>
                                    <li>Giá sản phẩm: <?php echo $product['price']; ?></li>
                                    <li>Giảm giá: <?php echo $product['sale']; ?></li>
                                    <li>Mã code: <?php echo $product['productCode']; ?></li>
                                    <li>Màu sắc: <?php echo $product['color']; ?></li>
                                    <li>Số lượng: <?php echo $product['number']; ?></li>

                                </ul>
                            </td>
                            <td><a href="?action=view_product&amp;product_id=<?php echo $product['productID']; ?>" class="btn-xs btn-info"><i class="fa fa-edit"></i>Edit</a>
                                <a href="?action=del_product&amp;product_id=<?php echo $product['productID']; ?>" class="btn-xs btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fa fa-times"></i>Del</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>                                   
                </table>
                <div class="pull-right">
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
                </div>
            </div>
        </div>
    </div>
<?php require_once __DIR__."/../../layouts/footer.php"; ?>       
                