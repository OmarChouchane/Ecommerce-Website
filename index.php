
<?php include('layouts/header.php'); ?>



<div id="banner-bg" class="container-fluid">

    <!--Home-->
    <section id="home">
            <div class="container">
                <h5>NEW ARRIVALS</h5>
                <h1><span>Best Prices</span>This Season</h1>
                <p>Eshop offers the best products for the most affordable prices</p>
                <button>SHOP NOW</button>
            </div>
    </section>



    <!--Upper-->
    <section id="upper" class=" py-5">

        <div class="container my-5 pb-3 custom-container">
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="custom-box">
                        <img src="assets/imgs/featured1.png" alt="Image 1" class="img-fluid">
                        <h4 class="mt-3">title</h4>
                        <p class="mt-3">Short Description Lorem ipsum<br> Quo earum repudiandae <br>end of desc</p>
                        <button class="btn btn-primary mt-3 mb-4">See More</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-box">
                        <img src="assets/imgs/featured1.png" alt="Image 1" class="img-fluid">
                        <h4 class="mt-3">title</h4>
                        <p class="mt-3">Short Description Lorem ipsum<br> Quo earum repudiandae <br>end of desc</p>
                        <button class="btn btn-primary mt-3 mb-4">See More</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-box">
                        <img src="assets/imgs/featured1.png" alt="Image 1" class="img-fluid">
                        <h4 class="mt-3">title</h4>
                        <p class="mt-3">Short Description Lorem ipsum<br> Quo earum repudiandae <br>end of desc</p>
                        <button class="btn btn-primary mt-3 mb-4">See More</button>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="custom-box">
                        <img src="assets/imgs/featured1.png" alt="Image 3" class="img-fluid">
                        <h4 class="mt-3">title</h4>
                        <p class="mt-3">Short Description Lorem ipsum<br> Quo earum repudiandae <br>end of desc</p>
                        <button class="btn btn-primary mt-3 mb-4">See More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!--Featured-->
    <section id="featured" class="mt-5 mb-5 pb-5">
        <div class="container text-center mt-5">
            <h3>The Most Popular</h3>
            <hr class="mx-auto">
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php  include('server/get_featured_products.php');  ?>

        <?php  while($row=$featured_products->fetch_assoc()){  ?>

            <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];?>'" class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class ="p-price">$<?php echo $row['product_price']; ?></h4>
                <a href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">BUY NOW</button></a>
            </div>

            
        <?php } ?>


        </div>
    </section>




    <!--Banner-->
    <section id="banner" class="my-5 py-5">
        <div class="container">
            <h4>MID SEASON'S SALE</h4>
            <h1>Autumn Collection <br> UP to 30% OFF</h1>
            <button>SHOP NOW</button>
        </div>
    </section>
    

    <!--Clothes-->
    <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Dresses & Coats</h3>
            <hr class="mx-auto">
            <p>Here you can check out our amazing clothes</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php  include('server/get_coats.php');  ?>

        <?php  while($row=$coats_products->fetch_assoc()){  ?>

            <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];?>'"  class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class ="p-price">$<?php echo $row['product_price']; ?></h4>
                <button class="buy-btn">BUY NOW</button>
            </div>
        
        <?php }  ?>
        
        
        <?php  include('server/get_dresses.php');  ?>

        <?php  while($row=$dresses_products->fetch_assoc()){  ?>

            <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];?>'"  class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class ="p-price">$<?php echo $row['product_price']; ?></h4>
                <button class="buy-btn">BUY NOW</button>
            </div>
        
        <?php }  ?> 

        </div>
    </section>


    <!--Watches-->
    <section  id="watches" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Watches</h3>
            <hr class="mx-auto">
            <p>Check out our unique watches</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php  include('server/get_watches.php');  ?>

        <?php  while($row=$watches->fetch_assoc()){  ?>

            <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];?>'"  class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class ="p-price">$<?php echo $row['product_price']; ?></h4>
                <a href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">BUY NOW</button></a>
            </div>

            
        <?php } ?>

        </div>
    </section>


    

    <!--Shoes-->
    <section id="shoes" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Shoes</h3>
            <hr class="mx-auto">
            <p>Here you can check out our amazing shoes</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php  include('server/get_shoes.php');  ?>

        <?php  while($row=$shoes->fetch_assoc()){  ?>

            <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];?>'"  class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class ="p-price">$<?php echo $row['product_price']; ?></h4>
                <a href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">BUY NOW</button></a>
            </div>

            
        <?php } ?>

        </div>
    </section>


</div>



<?php include('layouts/footer.php'); ?>