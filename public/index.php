<?php

include __DIR__ . "/../src/view/parties/_header.php";
require_once __DIR__ . "/../src/routes/routes.php";

session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") {
    header("Location: /shop_product/admin");
}

?>
<!-- navbar -->


<?php include_once __DIR__ . "/../src/view/parties/_navbar.php" ?>
<!-- Header-->
<header class="bg-dark py-5 background-home">
    <div class="my-5 px-4 px-lg-5 container ">
        <div class="text-right text-white">
            <h1 class="fw-bolder display-4">
                <?php
                if (isset($_SESSION['user_name']) && $_SESSION['user_role'] == 'client') { ?>
                    <?=
                        $_SESSION['user_name'] . " مرحبا بك" ?>
                <?php } else {
                    echo "مرحبا بكم";
                }
                ?>
            </h1>
            <p class="mb-0 fw-normal text-white-50 lead">لي ماشرا اتنززه</p>
        </div>
    </div>
</header>

<div class="containerPanier <?php 
if (isset($_SESSION['openPopup'])) {
    echo '' ;
    unset($_SESSION['openPopup']);
}else {
    echo 'd-none';
}
  ?> ">
    <?php
    $total = 0;
    $ids = [];
    $ids = isset($_SESSION['all_id']) ? $_SESSION['all_id'] : null;
    if ($ids != null) {
        $filteredProducts = array_filter($products, function ($product) use ($ids) {
            return in_array($product['product_id'], $ids);
        });
        foreach ($filteredProducts as $value) {
            $total += $value['product_price'];
        }
    }

    ?>
    <div class="row">
        
            <?php
            if (!empty($filteredProducts)) {
                $counteur = 0;
             foreach ($filteredProducts as $key => $value) { ?>
                    <div class="mb-5 col-md-4">
                        <div class="h-100 card">
                            <!-- Product image-->
                            <img class="card-img-top object-fit-contain" src=<?= $value['product_image'] ?> alt="..."
                                style="height: 9.5rem;" />
                            <!-- Product details-->
                            <div class="p-4 card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $value["product_name"] ?></h5>
                                    <!-- Product price-->
                                    <!-- <span class="text-muted text-decoration-line-through">20.00 DH</span> -->
                                    <div class="w-100 d-flex justify-content-between">
                                        <span class="mx-3"><?php echo $value["product_price"] ?> DH</span>
                                        <span class="mx-3" id="<?php echo $counteur ?>">1</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="bg-transparent p-4 pt-0 border-top-0 card-footer">
                                <div class="text-center">
                                    <a onclick=<?php echo "addQuantity(". $counteur .")"?> class="mt-auto btn btn-outline-dark"
                                    href="#"><i class="fa-solid fa-plus"></i></a>

                                        <a class="mt-auto btn btn-outline-dark" onclick=<?php echo "moinQuantity(". $counteur .")"?>
                                    href="#"><i class="fa-solid fa-minus"></i></a>

                                    <a class="mt-auto btn btn-outline-dark" href=<?php echo "/shop_product/deleteIntoCart?id=" . $value['product_id'] ?>
                                    href="#"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $counteur ++;
                } ?>
                    <div><button id="btn_order" class="w-100 btn btn-outline-danger" onclick="sendDataOrder()">Commander ( <?php echo $total ?> MAD )</button></div>
                    <?php }else{ ?>
                        <div class="text-center">
                            <h1 style="font-size: 4.5rem"><i class="fa-solid fs-lg fa-cart-shopping"></i></h1>
                            <h4>Votre panier est vide!</h4>
                            <p class="mb-4">Parcourez nos catégories et découvrez nos meilleures offres!</p>
                        </div>
                    <div><button onclick="togglePanier()" class="w-100 btn btn-outline-warning text-dark">Commencez vos achats</button></div>
                <?php } ?>
    </div>
</div>

<!-- Section-->
<section class="py-5">
    <div class="mt-5 px-4 px-lg-5 container">
        <div class="justify-content-center row-cols-2 row-cols-md-3 row-cols-xl-4 gx-4 gx-lg-5 row">
            <?php foreach ($products as $key => $value) { ?>
                <div class="mb-5 col">
                    <div class="h-100 card">
                        <!-- Product image-->
                        <img class="card-img-top object-fit-contain" src=<?= $value['product_image'] ?> alt="..."
                            style="height: 9.5rem;" />
                        <!-- Product details-->
                        <div class="p-4 card-body">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $value["product_name"] ?></h5>
                                <!-- Product price-->
                                <!-- <span class="text-muted text-decoration-line-through">20.00 DH</span> -->
                                <?php echo $value["product_price"] ?> DH
                            </div>
                        </div>
                        <!-- Product actions-->
                         <?php if (!empty($ids) && in_array($value['product_id'],  $ids)) {?>
                             <div class="bg-transparent p-4 pt-0 border-top-0 card-footer">
                                 <div class="text-center"><button class="mt-auto btn btn-outline-success" 
                                         >Dégà choisis</button></div>
                             </div>
                        <?php }else {?>
                            <div class="bg-transparent p-4 pt-0 border-top-0 card-footer">
                                 <div class="text-center"><a class="mt-auto btn btn-outline-dark" href=<?php echo "/shop_product/addToCart?id=" . $value['product_id'] ?>
                                         href="#">Add to cart</a></div>
                             </div>
                        <?php }?>
                    </div>
                </div>
            <?php } ?>


            <div class="mb-5 col">
                <div class="h-100 card">
                    <!-- Sale badge-->
                    <div class="position-absolute bg-dark text-white badge" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="p-4 card-body">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Special Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center mb-2 text-warning small">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$20.00</span>
                            $18.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="bg-transparent p-4 pt-0 border-top-0 card-footer">
                        <div class="text-center"><a class="mt-auto btn btn-outline-dark" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="mb-5 col">
                <div class="h-100 card">
                    <!-- Sale badge-->
                    <div class="position-absolute bg-dark text-white badge" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="p-4 card-body">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Sale Item</h5>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$50.00</span>
                            $25.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="bg-transparent p-4 pt-0 border-top-0 card-footer">
                        <div class="text-center"><a class="mt-auto btn btn-outline-dark">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="mb-5 col">
                <div class="h-100 card">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="p-4 card-body">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Popular Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center mb-2 text-warning small">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            $40.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="bg-transparent p-4 pt-0 border-top-0 card-footer">
                        <div class="text-center"><a class="mt-auto btn btn-outline-dark" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="mb-5 col">
                <div class="h-100 card">
                    <!-- Sale badge-->
                    <div class="position-absolute bg-dark text-white badge" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="p-4 card-body">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Sale Item</h5>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$50.00</span>
                            $25.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="bg-transparent p-4 pt-0 border-top-0 card-footer">
                        <div class="text-center"><a class="mt-auto btn btn-outline-dark" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="mb-5 col">
                <div class="h-100 card">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="p-4 card-body">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Fancy Product</h5>
                            <!-- Product price-->
                            $120.00 - $280.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="bg-transparent p-4 pt-0 border-top-0 card-footer">
                        <div class="text-center"><a class="mt-auto btn btn-outline-dark" href="#">View options</a></div>
                    </div>
                </div>
            </div>
            <div class="mb-5 col">
                <div class="h-100 card">
                    <!-- Sale badge-->
                    <div class="position-absolute bg-dark text-white badge" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="p-4 card-body">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Special Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center mb-2 text-warning small">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$20.00</span>
                            $18.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="bg-transparent p-4 pt-0 border-top-0 card-footer">
                        <div class="text-center"><a class="mt-auto btn btn-outline-dark" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="mb-5 col">
                <div class="h-100 card">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="p-4 card-body">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Popular Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center mb-2 text-warning small">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            $40.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="bg-transparent p-4 pt-0 border-top-0 card-footer">
                        <div class="text-center"><a class="mt-auto btn btn-outline-dark" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const dataCart = <?php echo json_encode($filteredProducts) ?>;
    const ids = <?php echo json_encode($ids) ?>;
    const user_id = <?php echo $_SESSION['user_id'] ?>;
</script>
<!-- <script src=<?php echo __DIR__ . "../assets/js/main.js" ?>></script> -->
<?php include_once __DIR__ . "/../src/view/parties/_footer.php" ?>