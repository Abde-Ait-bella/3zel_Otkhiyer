<?php include_once __DIR__ . "/../parties/_header.php"; ?>

<body>
    <?php include_once __DIR__ . "/../parties/_navbarAdmin.php" ?>
    <div class="addProduct_popup p-5 bg-secondary" id="addProduct_popup">
        <form method="POST" action="/addProduct">
            <!-- Ligne avec deux champs : Nom et Quantité -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nom" class="form-label text-white fw-bold">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrez le nom">
                </div>

                <div class="col-md-6">
                    <label for="quantite" class="form-label text-white fw-bold">Quantité</label>
                    <input type="number" class="form-control" name="quantite" id="quantite" placeholder="Entrez la quantité">
                </div>
            </div>
            <!-- Ligne pour le champ Description -->
            <div class="mb-3">
                <label for="description" class="form-label text-white fw-bold">Description</label>
                <textarea class="form-control" name="description" id="description" rows="2"
                    placeholder="Entrez une description"></textarea>
            </div>
            <!-- Ligne pour le champ Prix -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="prix" class="form-label text-white fw-bold">Prix</label>
                    <input type="number" step="0.01" class="form-control" name="prix" id="prix" placeholder="Entrez le prix">
                </div>
                <div class="col-md-6">
                    <label for="formFileMultiple" class="form-label text-white fw-bold">Photo</label>
                    <input class="form-control" name="photo" type="file" id="formFileMultiple" multiple>
                </div>
            </div>
            <!-- Bouton Envoyer -->
            <button type="submit" class="btn btn-danger mt-3">Ajouter</button>
        </form>
    </div>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include_once __DIR__ . "/../parties/_sidebar.php" ?>
        </div>
        <div id="layoutSidenav_content">
            <div class="mb-4 card">
                <div class="card-header">
                    <i class="fa-table fas me-1"></i>
                    La liste des Produits
                </div>
                <div class="card-body">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>Quantitie</th>
                                <th>Prix</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $value) { ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://www.hp.com/fr-fr/shop/Html/Merch/Images/7K728EA-ABF_1750x1285.jpg"
                                                alt="" style="width: 45px; height: 45px" class="" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1"><?= $value['product_name'] ?></p>
                                                <p class="fw-normal mb-1 text-muted">
                                                    <?php
                                                    $now = new DateTime();
                                                    $givenDate = new DateTime($value['created_at']);
                                                    $interval = $now->diff($givenDate);
                                                    if ($interval->y > 0) {
                                                        echo 'Il y a ' . $interval->y . ' year' . ($interval->y > 1 ? 's' : '');
                                                    } elseif ($interval->m > 0) {
                                                        echo 'Il y a ' . $interval->m . ' month' . ($interval->m > 1 ? 's' : '');
                                                    } elseif ($interval->d > 0) {
                                                        echo 'Il y a ' . $interval->d . ' day' . ($interval->d > 1 ? 's' : '');
                                                    } elseif ($interval->h > 0) {
                                                        echo 'Il y a ' . $interval->h . ' hour' . ($interval->h > 1 ? 's' : '');
                                                    } elseif ($interval->i > 0) {
                                                        echo 'Il y a ' . $interval->i . ' minute' . ($interval->i > 1 ? 's' : '');
                                                    } else {
                                                        echo 'just now';
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding: 21px 0">
                                        <p class="text-muted mb-0"><?= $value['product_quantity'] ?></p>

                                    </td>

                                    <td style="padding: 21px 0">
                                        <p class="text-muted mb-0"><?= $value['price'] ?> DH</p>

                                    </td>

                                    <td>
                                        <a type="button" class="btn btn-lg btn-rounded">
                                            <i class="fa-solid fa-gear text-muted"></i>
                                        </a>
                                        <a type="button" href=<?php echo "/shop_product/delete?id=" . $value['product_id'] ?> class="btn btn-lg btn-rounded">
                                            <i class="fa-solid fa-trash-arrow-up text-muted"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="d-flex justify-content-end position-fixed" style="top: 4.5rem; right:1rem ; z-index: 99">
                <button class="btn btn-rounded bg-secondary" onclick="openPopup()"><i
                        class="fa-solid fa-plus text-white"></i></button>
            </div>
            <?php include_once __DIR__ . "/../parties/_footerAdmine.php" ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../..js/scripts.js"></script>
</body>

</html>