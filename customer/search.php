<?php require_once __DIR__ . "/autoload/controller.php"; ?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
<?php require_once __DIR__ . "/layouts/menu-left.php"; ?>
<div class="col-sm-9 padding-right">
<?php
  $query = $_GET['keywork'];
  $min_length = 1;
  if(strlen($query) >= $min_length)
  {
      $query = htmlspecialchars($query);
      $raw_results = $db->fetchsql("SELECT * FROM product WHERE (`productName` LIKE '%".$query."%') OR (`productID` LIKE '%".$query."%')") or die();
      if($raw_results > 0)
      {
          foreach ($raw_results as $product) {?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="product-details.php?action=get_view&amp;idsp=<?php echo $product['productID']; ?>">
                                <img src="../public/upload/product/<?php echo $product['image_pro']; ?>"
                                     width="100%" height="250px"/>
                            </a>
                            <h5><?php echo $product['productName']; ?></h5>
                            <p><b style="color: #E10C00;"><?php echo formatnumber($product['price']); ?></b></p>

                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-heart" style="color:red;"></i>Yêu thích</a></li>
                            <li><a href="add-cart.php?idsp=<?php echo $product['productID'] ?>"><i
                                            class="fa fa-shopping-cart"></i>Art to cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }

      }
      else {
          echo "Không tìm thấy kết quả";
      }

  }
?>
</div><!--features_items-->
</section>
<?php require_once __DIR__ . "/layouts/footer.php"; ?>


