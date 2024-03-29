<?php


session_start();

include 'server/connection.php';

//if user is not logged in
if(!isset($_SESSION['logged_in'])){

    header('location: login.php');
    exit();

}



//if user logged out
if(isset($_GET['logout'])){

    unset($_SESSION['logged_in']);
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    header('location: login.php');
    exit();
}



//if user wants to change password
if(isset($_POST['change_password'])){
    include 'server/connection.php';

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];


    // Check if passwords do not match
    if($password != $confirmPassword){
        header('location: account.php?error=passwords do not match');
    }


    // Check if password is less than 6 characters long
    else if(strlen($password) < 6){
        header('location: account.php?error=password must be at least 6 characters long');
    }


    // If there is no error
    else{
        $password = md5($password);
        $stmt = $conn->prepare("UPDATE users SET user_password = ? WHERE user_email = ?");
        $stmt->bind_param('si', $password, $user_email);

        if($stmt->execute()){
            header('location: account.php?message=password changed successfully');
        }else{
            header('location: account.php?error=error changing password');
        }
    }

}




//get orders

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=?");

$stmt->bind_param('i', $user_id);

$stmt->execute();

$orders = $stmt->get_result();






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
    <title>The North Face</title>
    <link rel="icon" href="/assets/imgs/logo2.png" type="image/x-icon">
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




    <!--Account-->
    <section class="my-5 py-5">
        <div class="row container mx-auto">
            <?php if(isset($_GET['register'])){?>
                <p class="text-center pt-3" style="color: green;"><?php echo $_GET['register']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['login'])){?>
                <p class="text-center pt-3" style="color: green;"><?php echo $_GET['login']; ?></p>
            <?php } ?>
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name : <span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?></span></p>
                    <p>Email : <span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}?></span></p>
                    <p><a href="#orders" id="orders-btn">Your orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>
            <div class="mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <form method="POST" action="account.php" id="account-form">
                <?php if(isset($_GET['error'])){?>
                    <p style="color: red;"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php if(isset($_GET['message'])){?>
                    <p style="color: green;"><?php echo $_GET['message']; ?></p>
                    <?php } ?>
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="account-password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" placeholder="Confirm Password" name="confirmPassword" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn" name="change_password" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
    </section>





    <!--Orders-->
    <section id="orders" class="orders container my-5 py-5" class="">
        <div class="container text-center">
            <h2 class="font-weight-bold">Your Orders</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5 text-center">
            <tr>
                <th>Order Id</th>
                <th>Order Cost</th>
                <th>Order Status</th>
                <th>Order Date</th>
                <th>Order Details</th>
            </tr>

            <?php while($row = $orders->fetch_assoc()){?>

            <tr>
                <td>
                    <div class="product-info">
                        <div>
                            <p class="mt-3 mx-auto"><?php echo $row['order_id'];?></p>
                        </div>
                    </div>
                </td>

                <td><span><?php echo $row['order_cost'];?></span></td>
                <td><span><?php echo $row['order_status'];?></span></td>
                <td><span><?php echo $row['order_date'];?></span></td>
                <td>
                    <form action="order_details.php" method="POST">
                    <input type="hidden" name="order_id" value="<?php echo $row['order_id'];?>">
                    <input type="hidden" name="order_status" value="<?php echo $row['order_status'];?>">
                        <input class="btn order-details-btn" type="submit" name="order_details_btn" value="details">
                    </form>
                <td>

            </tr>

            <?php } ?>

        </table>

    </section>





    <!--Footer-->
    <footer class="mt-5 pt-5">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>