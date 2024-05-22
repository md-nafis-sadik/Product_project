<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="/Product_project/src/output.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>



    <?php
        require "../header.php";
        require_once "../connection.php";
        if (isset($_REQUEST["submit"])) {

            $productName = $_REQUEST["prodName"];
            $productPrice = $_REQUEST["prodPrice"];

            $imageDir = "../productImage/";

            date_default_timezone_set("Asia/Dhaka");
            $ImageName = date("Y_m_d_H_i_s") . "." . pathinfo($_FILES["prodImage"]["name"], PATHINFO_EXTENSION);
            $ImageFullPath = $imageDir . $ImageName;
            move_uploaded_file($_FILES["prodImage"]["tmp_name"], $ImageFullPath);
            $query = "INSERT INTO productinfo(productName, productPrice, productImage) VALUES ('$productName','$productPrice','$ImageName')";
            mysqli_query($conn,$query);
            header("location: ../view/viewProduct.php");
            exit();
        }
    ?>



    <section id="addProduct">
        <div class="text-center text-2xl bg-amber-200 font-bold py-2">
            Add Product
        </div>
        <div class="w-full lg:w-3/4 mx-auto py-10">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="flex flex-wrap items-center my-1">
                    <label for="prodImage" class="w-1/3 text-right pr-10"> Product Image</label>
                    <input type="file" name="prodImage" id="prodImage" placeholder="Image"
                        class="w-2/3 px-3 py-1 text-md border" />
                </div>
                <div class="flex flex-wrap items-center my-1">
                    <label for="prodName" class="w-1/3 text-right pr-10"> Product Name</label>
                    <input type="text" name="prodName" id="prodName" placeholder="Enter Product Name"
                        class="w-2/3 px-3 py-1 text-md border" />
                </div>
                <div class="flex flex-wrap items-center my-1">
                    <label for="prodPrice" class="w-1/3 text-right pr-10"> Product Price</label>
                    <input type="text" name="prodPrice" id="prodPrice" placeholder="Product Price"
                        class="w-2/3 px-3 py-1 text-md border" />
                </div>
                <div class="text-center my-4">
                    <button type="submit" name="submit"
                        class="border-2 bg-green-400 hover:bg-green-700 text-gray-800 hover:text-red-100 duration-300 font-semibold rounded-2xl px-3 py-2">Add
                        Product</button>
                </div>
            </form>
        </div>

    </section>
    <script src="/Product_project/src/assets/js/main.js"></script>
</body>

</html>