<?php include_once __DIR__ . "/../parties/_header.php"; ?>

<body>
    <?php include_once __DIR__ . "/../parties/_navbarAdmin.php" ?>
    <div class="addProduct_popup p-5 bg-secondary d-none" id="addProduct_popup">
        <div class="position-absolute bg-danger btn btn-danger rounded" style="top: -7px; right:-6px ; width: 2rem; height: 2rem; padding: 3px; padding-right: 1px;" onclick="togglePopup()"><i class="fa-solid fa-minus"></i></div>
        <form method="POST" action="/shop_product/addProduct" enctype="multipart/form-data" name="productForm">
            <!-- Ligne avec deux champs : Nom et Quantité -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nom" class="form-label text-white fw-bold">Nom</label>
                    <input type="text" class="form-control" name="nom" id="name" placeholder="Entrez le nom">
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
                    <input class="form-control" name="product_image" type="file" id="formFileMultiple" multiple>
                </div>
            </div>
            <!-- Bouton Envoyer -->
            <button type="submit" id="btn_submit" class="btn btn-danger mt-3 px-4">Ajouter</button>
            <button type="button" onclick="cancel_popup()" class="btn btn-light text-muted mt-3 px-4">Annuler</button>
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
                                            <img src=<?= $value['product_image'] ?>
                                                alt="" style="width: 45px; height: 45px" class="object-fit-cover" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1"><?= $value['product_name'] ?></p>
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
                                        <p class="text-muted mb-0"><?= $value['product_price'] ?> DH</p>

                                    </td>

                                    <td style="padding: 21px 0">
                                        <a onclick='editeProduct(<?= json_encode($value) ?>)'  class="fs-4 mx-2" style="cursor: pointer" >
                                            <i class="fa-solid fa-gear text-muted"></i>
                                        </a>
                                        <a  href=<?php echo "/shop_product/delete?id=" . $value['product_id'] ?> class="fs-4 mx-2  no-outline">
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
                <button class="btn btn-rounded bg-secondary" onclick="togglePopup()"><i
                        class="fa-solid fa-plus text-white"></i></button>
            </div>
            <?php include_once __DIR__ . "/../parties/_footerAdmine.php" ?>
        </div>
    </div>
</body>

</html>