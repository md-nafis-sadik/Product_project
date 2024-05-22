<?php
    require "../header.php";
    require_once "../connection.php";
?>

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

    <section id="addProduct">
        <div class="text-center text-2xl bg-amber-200 font-bold py-2">
            View Product
        </div>
        <div class="w-full lg:w-3/4 mx-auto py-10">
            <table class="w-full ">
                <tr>
                    <th class="border py-2">sl.</th>
                    <th class="border py-2">Image</th>
                    <th class="border py-2">Product Name</th>
                    <th class="border py-2">Product Price</th>
                    <th class="border py-2">Action</th>
                </tr>

                <?php

                $sqlQuery ="SELECT * from `productinfo`";
                $result = mysqli_query($conn, $sqlQuery);
                $counter = 0;
                while($row = mysqli_fetch_assoc($result)){
                
                    $counter++;
                ?>
               

                <tr>
                    <td class="border text-center px-2 py-2"><?php echo $row["id"];  ?></td>
                    <td class="border text-center px-2 py-2"><img src="../productImage/<?php echo $row["productImage"]; ?>" class="w-72" style="width:100px; height:100px; margin:0 auto;"/></td>
                    <td class="border px-2 py-2"><?php echo $row["productName"]; ?></td>
                    <td class="border text-center px-2 py-2"><?php echo $row["productPrice"]; ?></td>
                    <td class="border text-center px-2 py-2">
                        <a href="">Edit</a>
                        /
                        <a href="./deleteProduct.php?id=<?php echo $row["id"];?>">Delete</a>
                    </td>
                </tr>
                <?php
            }

        ?>
            </table>
        </div>


    </section>
    <script src="/Product_project/src/assets/main.js"></script>
</body>

</html>