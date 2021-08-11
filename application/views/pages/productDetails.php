
<section class="py-5">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
            <div class="carousel-inner ">
                <?php
                    $productImages = unserialize($product[0]->product_image);
                ?>
                <?php
                $count=0;
                while ($count<count($productImages)){
                    if($count===0){
                        ?>
                        <div class="carousel-item active">
                            <img src="<?php echo base_url().$productImages[$count]?>" alt="<?php echo base_url().$productImages[$count]?>" class="img-fluid d-block rounded " width="500px" height="500px">
                        </div>
                        <?php
                    }
                    else{
                    ?>
                        <div class="carousel-item">
                            <img src="<?php echo base_url().$productImages[$count]?>" alt="<?php echo base_url().$productImages[$count]?>" class=" media-object img-fluid d-block rounded "width="500px" height="500px">
                        </div>
                        <?php
                    }
                    $count++;
                }
                ?>
            </div>
        </div>
    <script>
        $('.carousel').carousel({
            interval: 1000
        })
    </script>
        <h4>
            <?php echo $product[0]->product_name?>
        </h4>
        <h6><?php echo $product[0]->product_price?></h6>
        <p>
            <?php echo $product[0]->product_info?>
        </p>
        <a href="<?php echo base_url()."cart/addtocart?product_id=".$product[0]->id?>">
            <button class="btn btn-primary"> Add to Cart </button>
        </a>
    </div>
</section>