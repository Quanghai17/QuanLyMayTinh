<?php require_once __DIR__."/autoload/controller.php"; ?>
<?php require_once __DIR__."/layouts/header.php"; ?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row ">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="clearfix"> 
	                	<?php require_once("../testError/testError.php"); ?>
	                </div>
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<form action="" method="POST">
							<input type="email" placeholder="Email Address" name="email" />
							<?php if (isset($error['email'])): ?>
                                    <p class="text-danger"><?php echo $error['email']; ?></p>
                            <?php endif ?>
							<input type="password" placeholder="Password" name="password" />
							<?php if (isset($error['password'])): ?>
                                <p class="text-danger"><?php echo $error['password']; ?></p>
                            <?php endif ?>
							<span>
								<input type="checkbox" class="checkbox"> 
								Lưu thông tin đăng nhập
							</span>
							<button type="submit" class="btn btn-default" name="login">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<?php require_once("../testError/testError.php"); ?>
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới!</h2>
						<form action="../admin/controller/User.php" method="POST">
							<input type="hidden" name="action" value="add_user">
							<input type="hidden" name="level" value='0' />
							<input type="text" name="name" placeholder="Name"/>
							<input type="email" name="email" placeholder="Email"/>
							<input type="text" name="phone" placeholder="Phone"/>
							<input type="text" name="address" placeholder="Address"/>
							<input type="password" name="password" placeholder="Password"/>
							<button type="submit" name="signin" class="btn btn-default">Đăng kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

<?php require_once __DIR__."/layouts/footer.php"; ?>