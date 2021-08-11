<!-- Section-->
<section class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <ul>
                    <div class="form-check">
                        <li class="list-group-item"><strong class="text-uppercase">Products Categories</strong></li>
                    </div>
                    <?php
                    foreach ($categories as $category){
                        ?>
                        <div class="form-check">
                            <li class="list-group-item">
                                <a href='<?php echo base_url()."product?category_name=".$category->name ?>' class="text-decoration-none nav-link"><?php echo $category->name?></a>
                            </li>
                        </div>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="category">
                    <?php
                    foreach ($products as $product) {
                        ?>
                        <div class="my-4">
                            <h5>
                                <a class="text-decoration-none" href="<?php echo base_url()."productDetails?product_id=".$product->id?>">
                                    <?php echo $product->product_name;?>
                                    <span >(<?php echo $product->product_category?>)</span>
                                    <img class="float-end" src="<?php echo unserialize($product->product_image)[0]?>" alt=".." width="70px" height="70px">
                                </a>
                            </h5>
                            <p><?php echo $product->product_price?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</section>
