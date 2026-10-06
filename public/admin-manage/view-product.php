<?php

include 'header-top.php';

// Product ID check
if (!isset($_GET['product_id']) || empty($_GET['product_id'])) {
    header("Location: all-product.php");
    exit;
}
$product_id = (int) $_GET['product_id'];
// Get product
$query = mysqli_query($link, "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1");

if (!$query || mysqli_num_rows($query) == 0) {
    echo '<div class="main-content app-content">
            <div class="container-fluid">
                <div class="alert alert-danger mt-4">
                    Product not found.
                </div>
            </div>
          </div>';

    include 'footer.php';
    exit;
}
$dataq = mysqli_fetch_assoc($query);
?>

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">

            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">
                    Product Details
                </h1>

                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Main</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="all-product.php">Product</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Product Details
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="btn-list">

                <a href="all-product.php" class="btn btn-primary-light btn-wave me-2">
                    <i class="ri-arrow-left-line align-middle"></i>
                    All Product
                </a>

                <a href="update-product.php?product_id=<?= $dataq['product_id']; ?>" class="btn btn-primary">
                    <i class="ri-edit-line align-middle"></i>
                    Edit Product
                </a>

            </div>

        </div>
        <!-- Page Header Close -->


        <!-- ============================= -->
        <!-- Product Images -->
        <!-- ============================= -->

        <div class="row">

            <!-- Image 1 -->
            <div class="col-xl-4 col-lg-4 col-md-6 mb-4">

                <div class="card custom-card h-100">

                    <div class="card-header">
                        <div class="card-title">
                            Product Image 1
                        </div>
                    </div>

                    <div class="card-body text-center">

                        <?php if (!empty($dataq['product_image1'])) { ?>

                            <img src="Uploads/<?= htmlspecialchars($dataq['product_image1']); ?>"
                                alt="<?= htmlspecialchars($dataq['product_name']); ?>" class="img-fluid" style="
                                    width:100%;
                                    height:300px;
                                    object-fit:contain;
                                    background:#f8f9fa;
                                ">

                        <?php } else { ?>

                            <div class="text-muted py-5">
                                No Image Available
                            </div>

                        <?php } ?>

                    </div>

                </div>

            </div>


            <!-- Image 2 -->
            <div class="col-xl-4 col-lg-4 col-md-6 mb-4">

                <div class="card custom-card h-100">

                    <div class="card-header">
                        <div class="card-title">
                            Product Image 2
                        </div>
                    </div>

                    <div class="card-body text-center">

                        <?php if (!empty($dataq['product_image2'])) { ?>

                            <img src="Uploads/<?= htmlspecialchars($dataq['product_image2']); ?>"
                                alt="<?= htmlspecialchars($dataq['product_name']); ?>" class="img-fluid" style="
                                    width:100%;
                                    height:300px;
                                    object-fit:contain;
                                    background:#f8f9fa;
                                ">

                        <?php } else { ?>

                            <div class="text-muted py-5">
                                No Image Available
                            </div>

                        <?php } ?>

                    </div>

                </div>

            </div>


            <!-- Image 3 -->
            <div class="col-xl-4 col-lg-4 col-md-6 mb-4">

                <div class="card custom-card h-100">

                    <div class="card-header">
                        <div class="card-title">
                            Product Image 3
                        </div>
                    </div>

                    <div class="card-body text-center">

                        <?php if (!empty($dataq['product_image3'])) { ?>

                            <img src="Uploads/<?= htmlspecialchars($dataq['product_image3']); ?>"
                                alt="<?= htmlspecialchars($dataq['product_name']); ?>" class="img-fluid" style="
                                    width:100%;
                                    height:300px;
                                    object-fit:contain;
                                    background:#f8f9fa;
                                ">

                        <?php } else { ?>

                            <div class="text-muted py-5">
                                No Image Available
                            </div>

                        <?php } ?>

                    </div>

                </div>

            </div>

        </div>


        <!-- ============================= -->
        <!-- Product Details -->
        <!-- ============================= -->

        <div class="row">

            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="card-header">

                        <div class="card-title">
                            Product Details
                        </div>

                    </div>


                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped align-middle mb-0">

                                <tbody>

                                    <!-- Product Name -->
                                    <tr>

                                        <th width="30%">
                                            Product Name
                                        </th>

                                        <td>
                                            <?= htmlspecialchars($dataq['product_name']); ?>
                                        </td>

                                    </tr>


                                    <!-- Engine -->
                                    <tr>

                                        <th>
                                            Engine CC
                                        </th>

                                        <td>
                                            <?= htmlspecialchars($dataq['engine']); ?>
                                        </td>

                                    </tr>


                                    <!-- Tyre -->
                                    <tr>

                                        <th>
                                            Tyre
                                        </th>

                                        <td>
                                            <?= htmlspecialchars($dataq['tyre']); ?>
                                        </td>

                                    </tr>


                                    <!-- Paint -->
                                    <tr>

                                        <th>
                                            Paint Name
                                        </th>

                                        <td>
                                            <?= htmlspecialchars($dataq['paint']); ?>
                                        </td>

                                    </tr>


                                    <!-- Gear -->
                                    <tr>

                                        <th>
                                            Gear
                                        </th>

                                        <td>
                                            <?= htmlspecialchars($dataq['gear']); ?>
                                        </td>

                                    </tr>


                                    <!-- Fuel -->
                                    <tr>

                                        <th>
                                            Fuel Type
                                        </th>

                                        <td>
                                            <?= htmlspecialchars($dataq['fuel']); ?>
                                        </td>

                                    </tr>


                                    <!-- Price -->
                                    <tr>

                                        <th>
                                            Product Price
                                        </th>

                                        <td>
                                            <strong>
                                                <?= htmlspecialchars($dataq['product_price']); ?>
                                            </strong>
                                        </td>

                                    </tr>


                                    <!-- Slug -->
                                    <tr>

                                        <th>
                                            Slug
                                        </th>

                                        <td>
                                            <?= htmlspecialchars($dataq['slug']); ?>
                                        </td>

                                    </tr>


                                    <!-- Short Description -->
                                    <tr>

                                        <th>
                                            Short Description
                                        </th>

                                        <td>
                                            <?= nl2br(htmlspecialchars($dataq['product_short_description'])); ?>
                                        </td>

                                    </tr>


                                    <!-- Long Description -->
                                    <tr>

                                        <th>
                                            Long Description
                                        </th>

                                        <td>

                                            <div class="product-description">

                                                <?= $dataq['product_long_description']; ?>

                                            </div>

                                        </td>

                                    </tr>


                                    <!-- Product Status -->
                                    <tr>

                                        <th>
                                            Product Status
                                        </th>

                                        <td>

                                            <?php

                                            if ($dataq['product_status'] == 1) {

                                                echo '<span class="badge bg-success">
                                                        Published
                                                      </span>';

                                            } else {

                                                echo '<span class="badge bg-danger">
                                                        Draft
                                                      </span>';

                                            }

                                            ?>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ============================= -->
        <!-- Description Preview -->
        <!-- ============================= -->

        <div class="row mt-4">

            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="card-header">

                        <div class="card-title">
                            Long Description Preview
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="product-long-description">

                            <?= $dataq['product_long_description']; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>
</div>
<!-- End::app-content -->


<style>
    .product-description,
    .product-long-description {
        line-height: 1.7;
        word-wrap: break-word;
    }

    .product-description img,
    .product-long-description img {
        max-width: 100%;
        height: auto;
    }

    .product-description table,
    .product-long-description table {
        max-width: 100%;
    }
</style>


<?php

include 'footer.php';

?>