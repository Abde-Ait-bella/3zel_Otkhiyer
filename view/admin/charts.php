<?php include_once "../parties/_header.php" ?>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav bg-dark navbar navbar-dark navbar-expand">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="order-1 order-lg-0 btn btn-link btn-sm me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fa-bars fas"></i></button>
            <!-- Navbar Search-->
            <form class="form-inline d-md-inline-block my-2 my-md-0 d-none me-0 me-md-3 ms-auto">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fa-search fas"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="me-3 me-lg-4 ms-auto ms-md-0 navbar-nav">
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-fw fa-user fas"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="accordion sb-sidenav sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fa-tachometer-alt fas"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="collapsed nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-columns fas"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-angle-down fas"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="nav sb-sidenav-menu-nested">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="collapsed nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-book-open fas"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-angle-down fas"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="accordion nav sb-sidenav-menu-nested" id="sidenavAccordionPages">
                                    <a class="collapsed nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa-angle-down fas"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="nav sb-sidenav-menu-nested">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="collapsed nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa-angle-down fas"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="nav sb-sidenav-menu-nested">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fa-chart-area fas"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fa-table fas"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="px-4 container-fluid">
                        <h1 class="mt-4">Charts</h1>
                        <ol class="mb-4 breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Charts</li>
                        </ol>
                        <div class="mb-4 card">
                            <div class="card-body">
                                Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official
                                <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>
                                .
                            </div>
                        </div>
                        <div class="mb-4 card">
                            <div class="card-header">
                                <i class="fa-chart-area fas me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="text-muted card-footer small">Updated yesterday at 11:59 PM</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4 card">
                                    <div class="card-header">
                                        <i class="fa-chart-bar fas me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="text-muted card-footer small">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4 card">
                                    <div class="card-header">
                                        <i class="fa-chart-pie fas me-1"></i>
                                        Pie Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="text-muted card-footer small">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="bg-light mt-auto py-4">
                    <div class="px-4 container-fluid">
                        <div class="d-flex justify-content-between align-items-center small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
    </body>
</html>
