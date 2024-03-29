<?php 

include "server/connection.php";




// Check if the search button is clicked
if(isset($_GET['search'])){

    $category = $_GET['category'];
    $price = $_GET['price'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_category = ? AND product_price <= ?");

    $stmt->bind_param("si", $category, $price);

    $stmt->execute();

    $products = $stmt->get_result();



// Check if the search button is not clicked
}else{
    $stmt = $conn->prepare("SELECT * FROM products");

    $stmt->execute();

    $products = $stmt->get_result();
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>Shop</title>
    <link rel="icon" href="/assets/imgs/logo2.png" type="image/x-icon">

    <style>


        .container1 {
            margin: auto;
            overflow: hidden;
            position: relative; /* Added position relative */
        }

        /* Search section styles */
        #search {
            padding: 20px;
            width: 250px; /* Adjust width as needed */
            position: fixed;
            overflow-y: hidden;
        }

        /* Shop section styles */
        #shop {
            padding: 20px;
            width: calc(100% - 250px); /* Adjust width to take the remaining space */
            margin-left: 250px; /* Adjust margin to make space for the fixed search */
        }

        /* Larger devices (width > 768px) */
        @media screen and (min-width: 768px) {
            #search {
                width: 250px; /* Adjust width as needed */
            }
        
            #shop {
                width: calc(100% - 250px); /* Adjust width to take the remaining space */
                margin-left: 250px; /* Adjust margin to make space for the fixed search */
            }
        }

        /* Smaller devices (width <= 768px) */
        @media screen and (max-width: 768px) {
            #search {
                position: relative !important; /* Not fixed */
                width: 100%; /* Full width */
            }
        
            #shop {
                margin-left: 0; /* Remove margin */
                width: 100%; /* Full width */
                padding-top: 0 !important;
            }

        }


        /* Range input styles */
        #customRange {
            width: 100%;
        }

        /* Range labels styles */
        .range-labels {
            display: flex;
            justify-content: space-between; /* Distribute items evenly */
        }





        hr{
            width: 50px;
            border: 2px solid #fbb710;
            margin: 17px 0;
        }

        .product img{
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }

        .pagination a{
            color: coral;
        }

        .pagination li:hover a{
            color: white;
            background-color: coral;
        }
    </style>

</head>
<body>


    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
            <img class="logo" src="assets/imgs/logo1.png">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            <li class="nav-item "> 
                <a href="cart.html"><i class="fa fa-shopping-cart"></i></a>            
                <a href="account.html"><i class="fa fa-user"></i></a>
            </li>
            </ul>
        </div>
        </div>
    </nav>


    <div class="container1">


    <!--Search-->
    <section id="search" class="my-5 py-4 ms-2">
        <div class="container mt-5 pt-5">
            <p>Search Products</p>
            <hr>
        </div>

        <form action="shop.php" method="GET">

            <div class="row mx-auto container">
                <div class="col-12">
                    <p>Category</p>
                    <div class="form-check">
                        <input class="form-check-input" value="shoes" type="radio" name="category" id="category_one" <?php if(isset($_GET['category']) && $category == 'shoes') echo 'checked'; ?>>
                        <label class="form-check-label" for="flexRadioDefault1">Shoes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="coats"  type="radio" name="category" id="category_two" <?php if(isset($_GET['category']) && $_GET['category'] == 'coats') echo 'checked'; ?>>
                        <label class="form-check-label" for="flexRadioDefault2">Coats</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="watches"  type="radio" name="category" id="category_three" <?php if(isset($_GET['category']) && $_GET['category'] == 'watches') echo 'checked'; ?>>
                        <label class="form-check-label" for="flexRadioDefault3">Watches</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="bags"  type="radio" name="category" id="category_four" <?php if(isset($_GET['category']) && $_GET['category'] == 'bags') echo 'checked'; ?>>
                        <label class="form-check-label" for="flexRadioDefault4">Bags</label>
                    </div>
                </div>
            </div>

            <div class="row mx-auto container mt-5">
                <div class="col-12">
                    <div class="form-group">
                        <label for="customRange">Price</label>
                        <input type="range" class="form-range" min="1" max="1000" id="customRange" value="<?php if(isset($_GET['search'])){ echo $price;}else{ echo '500';}?>" name="price">
                        <div class="range-labels">
                            <span>1</span>
                            <span>1000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group m-3">
                <input type="submit" name="search" value="Search" class="btn btn-primary">
            </div>
        </form>
    </section>



    <!--Shop-->
    <section id="shop" class="my-5 py-4">
        <div class="container mt-5 py-5">
            <h3>Our Products</h3>
            <hr>
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container">

        <?php if($products->num_rows == 0){?>
            <div class="text-center">
                <h3>No products found</h3>
            </div>
        <?php }?>

        <?php while($row = $products->fetch_assoc()) {?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];?>'" src="assets/imgs/<?php echo $row['product_image'];?>" class="img-fluid mb-3">
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class ="p-name"><?php echo $row['product_name'];?></h5>
                <h4 class ="p-price">$<?php echo $row['product_price'];?></h4>
                <button class="buy-btn" onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];?>'" >BUY NOW</button>
            </div>

        <?php } ?>
        
            <nav aria-label="page navigation">
                <ul class="pagination justify-content-center mt-5">
                  <li class="page-item">
                    <a class="page-link" href="#">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item" aria-current="page">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>

        </div>
    </section>

    </div>


    <!--Footer-->
    <footer id="footer" class="mt-5 pt-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img src="assets/imgs/logo2.png" class="logo2" alt="">
                <p class="pt-3">We provide the best products the  most affordable prices</p>
                <img class="logo3" src="/assets/imgs/logo3.png">
            <img class="logo3" src="/assets/imgs/logo4.png">
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Featured</h5>
                <ul>
                    <li><a href="#">men</a></li>
                    <li><a href="#">women</a></li>
                    <li><a href="#">boys</a></li>
                    <li><a href="#">girls</a></li>
                    <li><a href="#">new arrivals</a></li>
                    <li><a href="#">clothes</a></li>
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6>Address</h6>
                    <p>1234 Street Name, City</p>
                </div>
                <div>
                    <h6>Phone</h6>
                    <p>12 345 678</p>
                </div>
                <div>
                    <h6>Email</h6>
                    <p>contact@gmail.com</p>
                </div>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Products</h5>
                <div class="row">
                    <ul>
                        <li><a href="#">shoes</a></li>
                        <li><a href="#">watches</a></li>
                        <li><a href="#">coats</a></li>
                        <li><a href="#">dresses</a></li>
                        <li><a href="#">bags</a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="copyright mt-5">
            <div class="row container mx-auto text-center">
                    <p>eCommerce @ 2025 All Rights Reserves</p>
            </div>
        </div>
    </footer>
    


    <script>

        window.addEventListener('scroll', function() {
            if (window.innerWidth > 576) {
                var search = document.getElementById('search');
                var footer = document.querySelector('footer');
                var container = document.querySelector('.container1');
                var footerOffset = footer.offsetTop;
                var containerOffset = container.offsetTop;
                var containerHeight = container.offsetHeight;
                var windowHeight = window.innerHeight;
                var scrollPosition = window.scrollY;
                
                if (scrollPosition >= footerOffset - windowHeight + 80) {
                    search.style.position = 'absolute';
                    search.style.top = containerHeight - search.offsetHeight - 8 + 'px';
                } else {
                    search.style.position = 'fixed';
                    search.style.top = '0';
                }
            }
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html> 