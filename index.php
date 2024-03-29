
<?php include('layouts/header.php'); ?>

    <!--Home-->
        <section id="home">
            <div class="container">
                <h5>NEW ARRIVALS</h5>
                <h1><span>Best Prices</span>This Season</h1>
                <p>Eshop offers the best products for the most affordable prices</p>
                <button>SHOP NOW</button>
            </div>
        </section>


    <!--Brand-->
    <section id="brand" class="container">
        <div class="row">
            <img class="img-fluid col-lg-3 cold-md-6 col-sm-12" src="/assets/imgs/brand1.jpg">
            <img class="img-fluid col-lg-3 cold-md-6 col-sm-12" src="/assets/imgs/brand2.jpg">
            <img class="img-fluid col-lg-3 cold-md-6 col-sm-12" src="/assets/imgs/brand3.jpg">
            <img class="img-fluid col-lg-3 cold-md-6 col-sm-12" src="/assets/imgs/brand4.jpg">
        </div>
    </section>


    <!--New-->
    <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!--One-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img src="assets/imgs/1.jpg" alt="" class="img-fluid">
                <div class="details">
                    <h2>Extremely Awesome Shoes</h2>
                    <button>SHOP NOW</button>
                </div>
            </div>
            <!--Two-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img src="assets/imgs/2.jpg" alt="" class="img-fluid">
                <div class="details">
                    <h2>Awesome Jacket</h2>
                    <button>SHOP NOW</button>
                </div>
            </div>
            <!--Three-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img src="assets/imgs/3.jpg" alt="" class="img-fluid">
                <div class="details">
                    <h2>50% OFF Watches</h2>
                    <button>SHOP NOW</button>
                </div>
            </div>
        </div>
    </section>

    <!--Featured-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr class="mx-auto">
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php  include('server/get_featured_products.php');  ?>

        <?php  while($row=$featured_products->fetch_assoc()){  ?>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
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

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
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

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
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
    <section id="watches" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Watches</h3>
            <hr class="mx-auto">
            <p>Check out our unique watches</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/watch1.png" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name">Sports Shoes</h5>
                <h4 class ="p-price">$199.9</h4>
                <button class="buy-btn">BUY NOW</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/watch2.png" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name">Sports Shoes</h5>
                <h4 class ="p-price">$199.9</h4>
                <button class="buy-btn">BUY NOW</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/watch3.png" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name">Sports Shoes</h5>
                <h4 class ="p-price">$199.9</h4>
                <button class="buy-btn">BUY NOW</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/watch4.png" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name">Sports Shoes</h5>
                <h4 class ="p-price">$199.9</h4>
                <button class="buy-btn">BUY NOW</button>
            </div>
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
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/shoes1.png" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name">Sports Shoes</h5>
                <h4 class ="p-price">$199.9</h4>
                <button class="buy-btn">BUY NOW</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/shoes2.png" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name">Sports Shoes</h5>
                <h4 class ="p-price">$199.9</h4>
                <button class="buy-btn">BUY NOW</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/shoes3.png" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name">Sports Shoes</h5>
                <h4 class ="p-price">$199.9</h4>
                <button class="buy-btn">BUY NOW</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/shoes4.png" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name">Sports Shoes</h5>
                <h4 class ="p-price">$199.9</h4>
                <button class="buy-btn">BUY NOW</button>
            </div>
        </div>
    </section>



<?php include('layouts/footer.php'); ?>