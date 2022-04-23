<?php require_once __DIR__."/autoload/controller.php"; 
	if(!isset($_SESSION[$name_cart]) || count($_SESSION[$name_cart])==0)
        {
            echo "<script> alert('Không có sản phẩm trong giỏ hàng!'); location.href='index.php' </script>; ";
        }
?>
<?php require_once __DIR__."/layouts/header.php"; ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php require("../testError/testError.php") ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="text-align: center;">Sản phẩm</td>
							<td class="description" style="text-align: center;">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							$sub_total = 0;
							foreach ($_SESSION[$name_cart] as $id => $product):?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="../public/upload/product/<?php echo $product['img']; ?>" alt="" width="135px" height="141px"></a>
							</td>
							<td class="cart_description" style="text-align: center;">
								<h4><a href=""><?php echo $product['name']; ?></a></h4>
								<p>Mã code: HDGS56H</p>
							</td>
							<td class="cart_price">
								<p><?php echo formatnumber($product['price']); ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<!-- <a class="cart_quantity_up" onclick="myFunction1()"> + </a> -->
									<input class="cart_quantity_input" type="number" name="quantity" value="<?php echo $product['qty']?>" autocomplete="off" size="2" onclick="myFunction()" id="num">
									<!-- <a class="cart_quantity_down" onclick="myFunction2()"> - </a> -->
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo formatnumber($product['price']*$product['qty']); ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="remove-cart.php?idsp=<?php echo $id; ?>"><i class="fa fa-times"></i></a>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="update-cart.php?idsp=<?php echo $id; ?>"><i class="fa fa-arrow-up"></i></a>
							</td>
						</tr>
						<?php 
							$sub_total += $product['price']*$product['qty'];
							endforeach; 
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Đặt hàng ngay?</h3>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Sử dụng phiếu giảm giá</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Sử dụng Voicher quà tặng</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Miễn thuế</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Việt Nam</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Hà Nội</option>
									<option>Thái Nguyên</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền <span><?php echo formatnumber($sub_total); ?></span></li>
							<li>Tiền thuế <span>0đ</span></li>
							<li>Phí ship <span>Free ship</span></li>
							<li>Tổng <span><?php echo formatnumber($sub_total) ?></span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Thanh toán</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
<script>
	function myFunction() {
		document.getElementById("num").value;
		a = document.getElementById("num").value;
		if (a==0) {
			location.href='remove-cart.php?idsp=<?php echo $id; ?>'
		}
	}
</script>
		
<?php require_once __DIR__."/layouts/footer.php"; ?>