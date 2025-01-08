<?php



include_once __DIR__ . "/../parties/_header.php" ;

session_start();
if (!isset($_SESSION['user_role']) && $_SESSION['user_role'] !== 1) { 
    header("Location: /shop_product/");
} 

?>


<body class="sb-nav-fixed">
 <?php include_once __DIR__."/../parties/_navbarAdmin.php" ?> 

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
        <?php include_once __DIR__."/../parties/_sidebar.php" ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="px-4 container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="mb-4 breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="bg-primary mb-4 text-white card">
                                <div class="card-body">Primary Card</div>
                                <div class="d-flex justify-content-between align-items-center card-footer">
                                    <a class="text-white small stretched-link" href="#">View Details</a>
                                    <div class="text-white small"><i class="fa-angle-right fas"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="bg-warning mb-4 text-white card">
                                <div class="card-body">Warning Card</div>
                                <div class="d-flex justify-content-between align-items-center card-footer">
                                    <a class="text-white small stretched-link" href="#">View Details</a>
                                    <div class="text-white small"><i class="fa-angle-right fas"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="bg-success mb-4 text-white card">
                                <div class="card-body">Success Card</div>
                                <div class="d-flex justify-content-between align-items-center card-footer">
                                    <a class="text-white small stretched-link" href="#">View Details</a>
                                    <div class="text-white small"><i class="fa-angle-right fas"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="bg-danger mb-4 text-white card">
                                <div class="card-body">Danger Card</div>
                                <div class="d-flex justify-content-between align-items-center card-footer">
                                    <a class="text-white small stretched-link" href="#">View Details</a>
                                    <div class="text-white small"><i class="fa-angle-right fas"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container py-5">
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            <div class="col">
                                <div class="card h-100 text-center shadow">
                                    <div class="card-body">
                                        <div class="display-4 text-primary mb-2">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <h2 class="card-title mb-3">1,234</h2>
                                        <p class="card-text text-muted">Active Users</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100 text-center shadow">
                                    <div class="card-body">
                                        <div class="display-4 text-success mb-2">
                                            <i class="bi bi-graph-up"></i>
                                        </div>
                                        <h2 class="card-title mb-3">56%</h2>
                                        <p class="card-text text-muted">Growth Rate</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100 text-center shadow">
                                    <div class="card-body">
                                        <div class="display-4 text-warning mb-2">
                                            <i class="bi bi-star"></i>
                                        </div>
                                        <h2 class="card-title mb-3">4.8</h2>
                                        <p class="card-text text-muted">Average Rating</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100 text-center shadow">
                                    <div class="card-body">
                                        <div class="display-4 text-danger mb-2">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                        <h2 class="card-title mb-3">98.3%</h2>
                                        <p class="card-text text-muted">Uptime</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-4 card">
                                <div class="card-header">
                                    <i class="fa-chart-area fas me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4 card">
                                <div class="card-header">
                                    <i class="fa-chart-bar fas me-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 card">
                        <div class="card-header">
                            <i class="fa-table fas me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Ancienneté</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usersData as $value) { ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                                        style="width: 45px; height: 45px" class="rounded-circle" />
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-1"><?= $value['user_name'] ?></p>
                                                        <p class="text-muted mb-0"><?= $value['user_email'] ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="padding: 21px 0">
                                                <p class="fw-normal mb-1 text-muted">
                                                    <?php
                                                    $now = new DateTime();
                                                    $givenDate = new DateTime($value['created_at']);
                                                    $interval = $now->diff($givenDate);
                                                    if ($interval->y > 0) {
                                                        echo $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
                                                    } elseif ($interval->m > 0) {
                                                        echo $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
                                                    } elseif ($interval->d > 0) {
                                                        echo $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago';
                                                    } elseif ($interval->h > 0) {
                                                        echo $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
                                                    } elseif ($interval->i > 0) {
                                                        echo $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago';
                                                    } else {
                                                        echo 'just now';
                                                    }
                                                    ?>
                                                </p>
                                            
                                            <td style="padding: 21px 0">
                                                <?php if ($value['status'] == 1) { ?>
                                                    <label 
                                                        class="badge badge-success text-decoration-none text-white rounded-pill d-inline">Active
                                                    </label>
                                                <?php } else { ?>
                                                    <label 
                                                        class="badge  badge-danger text-decoration-none text-white rounded-pill d-inline">
                                                        Desactiver
                                                    </label>
                                                <?php } ?>
                                            </td>

                                            </td>
                                            <td style="padding: 21px 0">
                                                <?php if ($value['status'] == 1) { ?>
                                                    <a href=<?= "/shop_product/disabled?id=" . $value['user_id'] ?>
                                                        class="badge text-decoration-none text-white d-inline">
                                                        <i class="fa-solid fa-user-large text-success fs-4"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href=<?= "/shop_product/active?id=" . $value['user_id'] ?>
                                                        class="badge text-decoration-none text-white d-inline">
                                                        <i class="fa-solid fa-user-large-slash fs-4 text-danger"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                           
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </main>
            <?php include_once __DIR__."/../parties/_footerAdmine.php" ?>
        </div>
    </div>
    
</body>

</html>