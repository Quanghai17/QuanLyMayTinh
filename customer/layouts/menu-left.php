
  <section>
        <div class="container">
            
            <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <?php foreach($categories as $category): ?>
                                <li><a href="../customer/category-list.php?iddm=<?php echo $category['categoryID']; ?>&name=<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                            <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach ($products as $product):?>
                                <li class="clearfix">
                                    <a href="product-details.php?action=get_view&amp;idsp=<?php echo $product['productID']; ?>">
                                        <img src="../public/upload/product/<?php echo $product['image_pro'];?>" class="img-responsive pull-left" width="80px" heght="80px">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $product["productName"]; ?></p >
                                            <?php if($product["sale"]>0): ?>
                                                <b class="price">Giảm giá: <?php echo $product["sale"]; ?>%</b><br>
                                            <?php endif; ?>
                                            <b>Giá gốc: <?php echo formatnumber($product["price"]); ?></b><br>
                                            <span class="view"><i class="fa fa-eye"></i> <?php echo $product["view"] ?>
<!--                                                : <i class="fa fa-heart-o"></i> 10</span>-->
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul> 
                            <!-- </marquee> -->
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm hot </h3>
                            <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                             <ul>
                                <?php foreach ($products2 as $product):?>
                                <li class="clearfix">
                                    <a href="product-details.php?action=get_view&amp;idsp=<?php echo $product['productID']; ?>">
                                        <img src="../public/upload/product/<?php echo $product['image_pro'];?>" class="img-responsive pull-left" width="80px" heght="80px">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $product["productName"]; ?></p >
                                            <?php if($product["sale"]>0): ?>
                                                <b class="price">Giảm giá: <?php echo $product["sale"]; ?>%</b><br>
                                            <?php endif; ?>
                                            <b >Giá gốc: <?php echo formatnumber($product["price"]); ?></b><br>
                                            <span class="view"><i class="fa fa-eye"></i> <?php echo $product["view"] ?>
<!--                                                : <i class="fa fa-heart-o"></i> 10</span>-->
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul> 
                            <!-- </marquee> -->
                        </div>
            </div>