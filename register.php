<?php


session_start();



include 'server/connection.php';


//if user is already logged in
if(isset($_SESSION['logged_in'])){

    header('location: account.php');
    exit();

}


//if user is not logged in
if(isset($_POST['register'])){


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];


    // Check if passwords do not match
    if($password != $confirmPassword){ 
        header('location: register.php?error=passwords do not match');
    }


    // Check if password is less than 6 characters long
    else if(strlen($password) < 6){  
        header('location: register.php?error=password must be at least 6 characters long');
    }


    // If there is no error
    else{


        // Check if the email already exists in the database
        $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email = ?"); 
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();



        // If the email already exists
        if($num_rows > 0){
            header('location: register.php?error=user with this email already exists');
        }



        // Insert user info into the users table
        else{
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?,?,?)");
            $stmt->bind_param('sss', $name, $email, md5($password)); 


            // If the query is successful
            if($stmt->execute()){ 
                $user_id = $stmt->user_id; // Get the auto-generated order ID
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('location: account.php?register=You registered successfully');
            }else{
                header('location: register.php?error=could not create account at the moment, try again later');
            }
        }
    }


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
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <i class="fa fa-shopping-cart"></i>                
                    <i class="fa fa-user"></i>
                </li>
                </ul>
            </div>
            </div>
    </nav>



    <!--Register-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">
                <?php if(isset($_GET['error'])){?>
                    <p style="color: red;"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="register-email" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="register-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn" id="register-btn" value="Register">
                </div>
                <div class="form-group">
                    <a id="login-url" class="btn" href="login.php">Do you have an account ? Login</a>
                </div>
            </form>
        </div>
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