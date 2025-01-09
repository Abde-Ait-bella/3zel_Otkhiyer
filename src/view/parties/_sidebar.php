<nav class="accordion sb-sidenav sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="/shop_product/admin">
                        <div class="sb-nav-link-icon"><i class="fa-tachometer-alt fas"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>

                    <a class="collapsed nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-columns fas"></i></div>
                        Layouts
                        <div class="sb-sidenav-collapse-arrow"><i class="fa-angle-down fas"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="nav sb-sidenav-menu-nested">
                            <a class="nav-link" href="/shop_product/products">Produits</a>
                            <a class="nav-link" href="/shop_product/orders">Commandes</a>
                        </nav>
                    </div>
                    <a class="collapsed nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa-book-open fas"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fa-angle-down fas"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="accordion nav sb-sidenav-menu-nested" id="sidenavAccordionPages">
                            <a class="collapsed nav-link" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-angle-down fas"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="nav sb-sidenav-menu-nested">
                                    <a class="nav-link" href="login.php">Login</a>
                                    <a class="nav-link" href="register.php">Register</a>
                                    <a class="nav-link" href="password.php">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="collapsed nav-link" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseError" aria-expanded="false"
                                aria-controls="pagesCollapseError">
                                Error
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-angle-down fas"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="nav sb-sidenav-menu-nested">
                                    <a class="nav-link" href="401.php">401 Page</a>
                                    <a class="nav-link" href="404.php">404 Page</a>
                                    <a class="nav-link" href="500.php">500 Page</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="charts.php">
                        <div class="sb-nav-link-icon"><i class="fa-chart-area fas"></i></div>
                        Charts
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>