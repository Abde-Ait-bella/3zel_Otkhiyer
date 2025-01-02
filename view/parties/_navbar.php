<nav class="bg-light px-3 navbar navbar-expand-lg navbar-light">
  <a class="mt-2 mt-lg-0 navbar-brand navbar-collapse"
    href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/index.php" ?>">
    <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/assets/images/logo.png" ?>" height="15"
      alt="MDB Logo" loading="lazy" />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="mr-auto navbar-nav">
      <li class="mx-5 active nav-item">
        <a class="nav-link" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/index.php" ?>">Home
          <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="dropdown nav-item">
        <a class="dropdown-toggle nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <!-- <li class="nav-item">
        <a class="disabled nav-link" href="#">Disabled</a>
      </li> -->
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <!-- <button class="my-2 my-sm-0 btn btn-outline-success" type="submit">Search</button> -->
      </form>



    </ul>

    <div class="mx-3">
      <button onclick="togglePanier()" class="btn btn-outline-dark">
        <i class="bi-cart-fill me-1"></i>
        Cart
        <span class="bg-dark rounded-pill text-white badge ms-1">0</span>
      </button>
      <div class="containerPanier d-none"></div>
    </div>
    <div>
      <a onclick="toglePanier()"
        href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/view/Sign_in.php" ?>"
        class="text-white btn btn-warning">Se connecter</a>
    </div>

    <ul class="ms-3 me-lg-4 navbar-nav">
      <li class="dropdown nav-item">
      <div class="profiletoggle" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      </div>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Settings</a></li>
          <!-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="#!">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>