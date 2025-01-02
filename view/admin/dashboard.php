<?php include_once "../parties/_header.php" ?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav bg-dark navbar navbar-dark navbar-expand">
        <!-- Navbar Brand-->
        <div class="d-flex">
            <a class="mt-2 mt-lg-0 px-3 navbar-brand navbar-collapse"
                href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/index.php" ?>">
                <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/assets/images/logo.png" ?>"
                    height="15" alt="MDB Logo" loading="lazy" />
            </a>
            <!-- Sidebar Toggle-->
            <button class="order-1 order-lg-0 btn btn-link btn-sm me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                    class="fa-bars fas"></i></button>
        </div>
        <!-- Navbar Search-->
        <form class="form-inline d-md-inline-block my-2 my-md-0 d-none me-0 me-md-3 ms-auto">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-danger" id="btnNavbarSearch" type="button"><i class="fa-search fas"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class=" me-lg-4 navbar-nav">
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
    </nav>
    <?php include_once "../parties/_sidebar.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>