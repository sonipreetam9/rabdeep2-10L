<?php

include 'header-top.php';

if (isset($_POST['delete'])) {
    $product_id = $_POST['product_id'];
    $get_product = mysqli_query($link, "SELECT product_image1, product_image2, product_image3 FROM product WHERE product_id = '$product_id' LIMIT 1");
    $product_data = mysqli_fetch_assoc($get_product);

    /* Delete product */
    $query = "DELETE FROM product WHERE product_id = '$product_id'";
    if (mysqli_query($link, $query)) {
        $images = [
            $product_data['product_image1'] ?? '',
            $product_data['product_image2'] ?? '',
            $product_data['product_image3'] ?? ''
        ];
        foreach ($images as $image) {
            if (!empty($image)) {
                $image_path = __DIR__ . '/Uploads/' . $image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }
        $message = "Product Deleted Successfully.";
    } else {
        $message = "Something went wrong. Please try again!";
    }
}

?>

<div class="main-content app-content">

    <div class="container-fluid">

        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">

            <div>

                <h1 class="page-title fw-medium fs-18 mb-2">
                    Product List
                </h1>

                <nav>

                    <ol class="breadcrumb mb-0">

                        <li class="breadcrumb-item">
                            <a href="dashboard.php">
                                Main
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Product List
                        </li>

                    </ol>

                </nav>

            </div>


            <div class="btn-list">

                <a href="add-product.php" class="btn btn-primary-light btn-wave me-2">

                    <i class="ri-add-line align-middle"></i>

                    Add Product

                </a>

            </div>


            <?php if (!empty($message)) { ?>
                <div class="alert alert-success fade-in text-start w-100 mt-3">
                    <?= $message ?>
                </div>
            <?php } ?>

        </div>


        <!-- =====================================================
             PRODUCT TABLE
        ====================================================== -->

        <div class="row">

            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover align-middle" id="myTable">

                                <thead>

                                    <tr>

                                        <th>
                                            Sr.
                                        </th>

                                        <th>
                                            Image
                                        </th>

                                        <th>
                                            Product Name
                                        </th>

                                        <th>
                                            Engine
                                        </th>

                                        <th>
                                            Tyre
                                        </th>

                                        <th>
                                            Paint
                                        </th>

                                        <th>
                                            Gear
                                        </th>

                                        <th>
                                            Fuel
                                        </th>

                                        <th>
                                            Price
                                        </th>

                                        <th>
                                            Status
                                        </th>

                                        <th>
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>


                                    <?php

                                    $query = "SELECT * FROM product ORDER BY product_id DESC";
                                    $result = mysqli_query($link, $query);
                                    $i = 0;
                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $i++;
                                            /* Image */
                                            $image = !empty($row['product_image1']) ? 'Uploads/' . $row['product_image1'] : 'assets/images/no-image.jpg';
                                            ?>


                                            <tr>


                                                <!-- SR -->

                                                <td>

                                                    <?= $i ?>

                                                </td>


                                                <!-- IMAGE -->

                                                <td>

                                                    <img src="<?= $image ?>" alt="<?= $row['product_name'] ?>" style="
                                                            width:100px;
                                                            height:70px;
                                                            object-fit:contain;
                                                            border-radius:6px;
                                                            border:1px solid #eee;
                                                            background:#fff;
                                                        ">

                                                </td>


                                                <!-- PRODUCT NAME -->

                                                <td>

                                                    <strong>
                                                        <?= $row['product_name']?>
                                                    </strong>

                                                </td>

                                                <!-- ENGINE -->
                                                <td>
                                                    <?= $row['engine'] ?>
                                                </td>

                                                <!-- TYRE -->
                                                <td>
                                                    <?= $row['tyre'] ?>
                                                </td>

                                                <!-- PAINT -->
                                                <td>
                                                    <?= $row['paint'] ?>
                                                </td>

                                                <!-- GEAR -->
                                                <td>
                                                    <?= $row['gear']?>
                                                </td>

                                                <!-- FUEL -->
                                                <td>

                                                    <?php if (!empty($row['fuel'])) { ?>
                                                        <span class="badge bg-light text-dark">
                                                            <?= $row['fuel']
                                                                ?>
                                                        </span>
                                                    <?php } else { ?>
                                                        -
                                                    <?php } ?>
                                                </td>


                                                <!-- PRICE -->

                                                <td>
                                                    <strong>
                                                        ₹<?= $row['product_price'] ?>
                                                    </strong>
                                                </td>

                                                <!-- STATUS -->
                                                <td>

                                                    <?php

                                                    if ($row['product_status'] == 1 ) {
                                                        echo '<span class="badge bg-success">Active
                                                        </span>';
                                                    } else {
                                                        echo '
                                                        <span class="badge bg-danger">
                                                            Inactive
                                                        </span>
                                                        ';
                                                    }

                                                    ?>
                                                </td>


                                                <!-- ACTION -->
                                                <td>

                                                    <div class="hstack gap-2 fs-15">

                                                        <!-- VIEW -->
                                                        <a href="view-product.php?product_id=<?= $row['product_id'] ?>"
                                                            class="btn btn-icon btn-sm btn-warning-light" title="View Product">
                                                            <i class="ri-eye-line"></i>
                                                        </a>


                                                        <!-- EDIT -->
                                                        <a href="update-product.php?product_id=<?= $row['product_id'] ?>"
                                                            class="btn btn-icon btn-sm btn-primary-light" title="Edit Product">
                                                            <i class="ri-edit-line"></i>
                                                        </a>


                                                        <!-- DELETE -->
                                                        <button type="button" class="btn btn-icon btn-sm btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal<?= $row['product_id'] ?>"
                                                            title="Delete Product">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>


                                                        <!-- DELETE MODAL -->
                                                        <div class="modal fade" id="deleteModal<?= $row['product_id'] ?>"
                                                            tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                   <div class="modal-header">
                                                                        <h6 class="modal-title">
                                                                            Delete Product
                                                                        </h6>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>


                                                                    <form action="" method="POST">
                                                                        <div class="modal-body">
                                                                            <p class="mb-0">
                                                                                Are you sure you want to delete
                                                                                <strong>
                                                                                    <?= $row['product_name'] ?>
                                                                                </strong>
                                                                                permanently?
                                                                            </p>

                                                                            <input type="hidden" name="product_id"
                                                                                value="<?= $row['product_id'] ?>">
                                                                        </div>


                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light"
                                                                                data-bs-dismiss="modal">
                                                                                Cancel
                                                                            </button>

                                                                            <button type="submit" name="delete"
                                                                                class="btn btn-danger">
                                                                                Delete
                                                                            </button>

                                                                        </div>

                                                                    </form>

                                                                </div>

                                                            </div>

                                                        </div>


                                                    </div>

                                                </td>


                                            </tr>


                                            <?php

                                        }

                                    } else {

                                        ?>

                                        <tr>

                                            <td colspan="11" class="text-center py-5">

                                                No Products Found.

                                            </td>

                                        </tr>

                                        <?php

                                    }

                                    ?>


                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>

</div>


<!-- JQUERY -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php

include 'footer.php';

?>