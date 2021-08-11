



<!-- Section-->
<section class="py-5">
    <h2 class="text-center ">Trending</h2>
    <p class="text-center">Top views in this week</p>

    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            foreach ($products as $product){
                $productId = $product->id;
                $productName = $product->product_name;
                $productPrice = $product->product_price;
                $productImagePath = unserialize($product->product_image)[0];
                ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="<?php echo base_url()."productDetails?product_id=".$productId;?>" class="text-decoration-none text-dark">
                            <img class="card-img-top" src="<?php echo base_url().$productImagePath?>" alt="" width="200" height="200" />
                        </a>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <a href="<?php echo base_url()."productDetails?product_id=".$productId;?>" class="text-decoration-none text-dark">
                                    <h5 class="fw-bolder"><?php echo $productName?></h5>
                                    <p>
                                        <?php echo $productPrice;?>
                                    </p>
                                </a>

                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a href="<?php echo base_url()."cart/addtocart?product_id=".$productId;?>" class="text-decoration-none btn btn-outline-dark">
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<section class="py-5">
    <h2 class="text-center ">Flash Sale</h2>
    <p class="text-center">Top views in this week</p>

    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            foreach ($products as $product){
                $productId = $product->id;
                $productName = $product->product_name;
                $productPrice = $product->product_price;
                $productImagePath = unserialize($product->product_image)[0];
                ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="<?php echo base_url()."productDetails?id=".$productId;?>" class="text-decoration-none">
                            <img class="card-img-top" src="<?php echo base_url().$productImagePath?>" alt="" width="200" height="200" />
                        </a>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <a href="<?php echo base_url();?>" class="text-decoration-none text-dark">
                                    <h5 class="fw-bolder"><?php echo $productName?></h5>
                                    <p>
                                        <?php echo $productPrice;?>
                                    </p>
                                </a>

                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo base_url();?>">Add to Cart</a></div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<section class="py-5">
    <h2 class="text-center ">New Arrival</h2>
    <p class="text-center">Top views in this week</p>

    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            foreach ($products as $product){
                $productId = $product->id;
                $productName = $product->product_name;
                $productPrice = $product->product_price;
                $productImagePath = unserialize($product->product_image)[0];
                ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="<?php echo base_url()."productDetails?id=".$productId;?>" class="text-decoration-none">
                            <img class="card-img-top" src="<?php echo base_url().$productImagePath?>" alt="" width="200" height="200" />
                        </a>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <a href="<?php echo base_url();?>" class="text-decoration-none text-dark">
                                    <h5 class="fw-bolder"><?php echo $productName?></h5>
                                    <p>
                                        <?php echo $productPrice;?>
                                    </p>
                                </a>

                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo base_url();?>">Add to Cart</a></div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
