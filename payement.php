<?php

session_start();

?>





<?php include('layouts/header.php'); ?>





    <!--Payement-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weihggt-bold">Payement</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">
            <p><?php if(isset($_GET['order_status'])) echo $_GET['order_status']; ?></p>
            <p>Total payement : <?php if(isset($_SESSION['total'])) echo $_SESSION['total']; ?></p>
            <?php if($_GET['order_status'] == "not paid" && isset($_SESSION['total'])){?>
            <input class="btn btn-primary" type="submit" value="Pay Now">
            <?php } ?>
        </div>
    </section>






<?php include('layouts/footer.php'); ?>
