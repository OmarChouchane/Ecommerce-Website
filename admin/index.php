<?php


//if user is not logged in
if(!isset($_SESSION['admin_logged_in'])){

    header('location: login.php');
    exit();

}

//get orders

include '../server/connection.php';

$stmt = $conn->prepare("SELECT * FROM orders");

$stmt->execute();

$orders = $stmt->get_result();



?>




<?php include 'header.php'; ?>  

<?php include 'sidemenu.php'; ?>  



    









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

    <script src="script.js"></script>

</body>
</html>