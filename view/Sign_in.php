<?php include_once "../view/parties/_header.php" ?>
<?php include_once "../view/parties/_navbar.php" ?>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="justify-content-center row">
				<div class="col-lg-5 col-md-7">
					<div class="wrap">
						<div class="img" style="background-image: url(../assets/images/bg-1.jpg);"></div>
						<div class="p-4 p-md-5 login-wrap">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<!-- <div class="w-100">
									<p class="d-flex justify-content-end social-media">
										<a href="#" class="d-flex justify-content-center align-items-center social-icon"><span class="fa fa-facebook"></span></a>
										<a href="#" class="d-flex justify-content-center align-items-center social-icon"><span class="fa fa-twitter"></span></a>
									</p>
								</div> -->
			      	</div>
							<form action="#" class="signin-form">
			      		<div class="mt-3 form-group">
			      			<input type="text" class="form-control" required>
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
		            <div class="form-group">
		              <input id="password-field" type="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password-field" class="fa fa-eye fa-fw field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control px-3 rounded text-bold btn btn-secondary submit">Sign In</button>
		            </div>
		            <div class="d-md-flex form-group">
		            	<div class="w-50 text-left">
			            	<label class="mb-0 checkbox-primary checkbox-wrap">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="text-md-right text-secondary w-50">
										<label type="button" href="#">Forgot Password</label>
									</div>
		            </div>
		          </form>
		          <p class="text-center text-secondary">Not a member? <label data-toggle="tab" href="./Sign_Up.html">Sign Up</label></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

<?php include_once "../view/parties/_footer.php" ?>

	</body>
</html>

