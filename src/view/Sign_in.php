<?php include_once __DIR__ . "/../view/parties/_header.php" ?>

<body>

	<?php
	session_start();

	if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client") { 
		header("Location: /shop_product/");
	  }elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin"){
		header("Location: /shop_product/admin");
	  }

	if (isset($_SESSION['success']['rejester'])) { ?>
		<h1 class="text-center">
			<?=
				$_SESSION['success']['rejester'];
			unset($_SESSION['success']['rejester'])
				?>
		</h1>
	<?php } elseif (isset($_SESSION['errors']['email'])) { ?>
		<h1 class="text-center">
			<?=
				$_SESSION['errors']['email'];
			unset($_SESSION['errors']['email'])
				?>
		</h1>
	<?php } elseif (isset($_SESSION['errors']['login'])) { ?>
		<h1 class="text-center">
			<?=
				$_SESSION['errors']['login'];
			unset($_SESSION['errors']['login'])
				?>
		</h1>
	<?php } ?>

	<nav class="bg-light px-3 navbar flex justify-content-between navbar-expand-lg navbar-light">
  <a class="mt-2 mt-lg-0 navbar-brand navbar-collapse"
    href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/" ?>">
    <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/assets/images/logo.png" ?>" height="15"
      alt="MDB Logo" loading="lazy" />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="" id="navbarSupportedContent">
        <div>
          <a onclick="toglePanier()" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/signup" ?>"
            class="text-white btn btn-danger">Inscription</a>
        </div>
  </div>
</nav>
	<section class="ftco-section">
		<div class="container">
			<div class="justify-content-center row">
				<div class="col-lg-5 col-md-7">
					<div class="wrap">
						<div class="img"></div>
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
							<form action="/shop_product/signin" method="POST" class="signin-form">
								<div class="mt-3 form-group">
									<input type="text" class="form-control" name="email" required>
									<label class="form-control-placeholder" for="email">Email</label>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" name="password" class="form-control"
										required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field"
										class="fa fa-eye fa-fw field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit"
										class="form-control px-3 rounded text-bold btn btn-secondary submit">Sign
										In</button>
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
							<p  class="text-center text-secondary">Not a member? <a class="text-decoration-none text-danger"  data-toggle="tab"
							href="/shop_product/signup">Sign Up</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include_once __DIR__ . "/../view/parties/_footer.php" ?>

</body>

</html>