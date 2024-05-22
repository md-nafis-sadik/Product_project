<?php
    require "../header.php";
    require_once "../connection.php";
    if (!isset($_REQUEST["id"]) || $_REQUEST["id"] == ""){

        header("location: ../");
        exit();
    }

    $deleteId =$_REQUEST['id'];
?>

<section id="deleteProduct">
    <div class="text-center text-2xl">Delete Product</div>
    <div>
        <?php
            $sqlQuery ="DELETE from `productinfo` where `id`=\"$deleteId\"";
            mysqli_query($conn, $sqlQuery);

            echo "<script>alert('Product Id: $deleteId Deleted.')</script>";
            header("location: ./viewProduct.php");
            exit();
        ?>
    </div>
</section>

<script src="/Product_project/src/assets/main.js"></script>
</body>
</html>