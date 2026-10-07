<?php

include 'header-top.php';


if (!isset($_GET['product_id']) || empty($_GET['product_id'])) {
    echo '<div class="alert alert-danger m-3">Invalid Product ID.</div>';
    include 'footer.php';
    exit;
}

$product_id = $_GET['product_id'];

?>


<div class="main-content app-content">
    <div class="container-fluid">

        <!-- PAGE HEADER -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">
                    Update Product
                </h1>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">
                                Main
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Update Product
                        </li>
                    </ol>
                </nav>
            </div>
        </div>


        <!-- FORM -->
        <div class="row">
            <div class="col-xl-12">

                <?php

                if (isset($_POST['update'])) {

                    $product_id = $_POST['product_id'];
                    $category_id = mysqli_real_escape_string($link, trim($_POST['category_id'])); // Added category_id
                    $product_name = mysqli_real_escape_string($link, trim($_POST['product_name']));
                    $engine = mysqli_real_escape_string($link, trim($_POST['engine']));
                    $tyre = mysqli_real_escape_string($link, trim($_POST['tyre']));
                    $paint = mysqli_real_escape_string($link, trim($_POST['paint']));
                    $gear = mysqli_real_escape_string($link, trim($_POST['gear']));
                    $fuel = mysqli_real_escape_string($link, trim($_POST['fuel']));
                    $product_price = mysqli_real_escape_string($link, trim($_POST['product_price']));
                    $product_short_description = mysqli_real_escape_string($link, trim($_POST['product_short_description']));
                    $product_long_description = mysqli_real_escape_string($link, trim($_POST['product_long_description']));
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product_name),'-'));

                    /* =========================================================
                       GET OLD PRODUCT DATA
                    ========================================================= */

                    $old_query = mysqli_query($link, "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1");
                    if (!$old_query || mysqli_num_rows($old_query) == 0) {
                        echo '<div class="alert alert-danger fade-in">Product not found.</div>';
                    } else {

                        $old_product = mysqli_fetch_assoc($old_query);

                        $old_image1 = $old_product['product_image1'];
                        $old_image2 = $old_product['product_image2'];
                        $old_image3 = $old_product['product_image3'];

                        /* =====================================================
                           EXISTING UPLOAD FOLDER
                        ====================================================== */

                        $upload_dir = __DIR__ . '/Uploads/';

                        if (!is_dir($upload_dir)) {
                            echo '<div class="alert alert-danger fade-in">Uploads folder does not exist.</div>';
                        } else {

                            /* =================================================
                               ALLOWED EXTENSIONS
                            ================================================== */
                            $allowed_extensions = ['jpg','jpeg','png','webp'];

                            /* =================================================
                               IMAGE 1
                            ================================================== */

                            $new_image1 = $old_image1;
                            if (isset($_FILES['product_image1']) &&
                                $_FILES['product_image1']['error'] !== UPLOAD_ERR_NO_FILE
                            ) {

                                if ($_FILES['product_image1']['error'] === UPLOAD_ERR_OK) {
                                    $extension1 = strtolower(pathinfo($_FILES['product_image1']['name'],PATHINFO_EXTENSION));
                                    if (in_array($extension1, $allowed_extensions)) {
                                        $new_image1 = time() . '_' . rand(1000, 9999) . '_1.' . $extension1;
                                        $target1 = $upload_dir . $new_image1;
                                        if (move_uploaded_file($_FILES['product_image1']['tmp_name'], $target1)
                                        ) {
                                            if (!empty($old_image1) &&
                                                file_exists($upload_dir . $old_image1)
                                            ) {
                                                unlink($upload_dir . $old_image1);
                                            }
                                        } else {
                                            $new_image1 = $old_image1;
                                            echo '<div class="alert alert-danger fade-in">Image 1 upload failed.</div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-warning fade-in">Image 1 invalid format. Allowed: JPG, JPEG, PNG, WEBP.</div>';
                                        $new_image1 = $old_image1;
                                    }
                                } else {
                                    echo '<div class="alert alert-danger fade-in">Image 1 upload error.</div>';
                                    $new_image1 = $old_image1;
                                }
                            }

                            /* =================================================
                               IMAGE 2
                            ================================================== */

                            $new_image2 = $old_image2;
                            if (isset($_FILES['product_image2']) && $_FILES['product_image2']['error'] !== UPLOAD_ERR_NO_FILE) {
                                if ($_FILES['product_image2']['error'] === UPLOAD_ERR_OK) {
                                    $extension2 = strtolower(
                                        pathinfo($_FILES['product_image2']['name'], PATHINFO_EXTENSION)
                                    );
                                    if (in_array($extension2, $allowed_extensions)) {
                                        $new_image2 = time() . '_' . rand(1000, 9999) . '_2.' . $extension2;
                                        $target2 = $upload_dir . $new_image2;
                                        if (move_uploaded_file($_FILES['product_image2']['tmp_name'], $target2)
                                        ) {
                                            if (!empty($old_image2) && file_exists($upload_dir . $old_image2)
                                            ) {
                                                unlink($upload_dir . $old_image2);
                                            }
                                        } else {
                                            $new_image2 = $old_image2;
                                            echo '<div class="alert alert-danger fade-in">Image 2 upload failed.</div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-warning fade-in">Image 2 invalid format. Allowed: JPG, JPEG, PNG, WEBP.</div>';
                                        $new_image2 = $old_image2;
                                    }
                                } else {
                                    echo '<div class="alert alert-danger fade-in">Image 2 upload error.</div>';
                                    $new_image2 = $old_image2;
                                }
                            }

                            /* =================================================
                               IMAGE 3
                            ================================================== */

                            $new_image3 = $old_image3;

                            if (isset($_FILES['product_image3']) &&
                                $_FILES['product_image3']['error'] !== UPLOAD_ERR_NO_FILE
                            ) {
                                if ($_FILES['product_image3']['error'] === UPLOAD_ERR_OK) {
                                    $extension3 = strtolower(
                                        pathinfo($_FILES['product_image3']['name'], PATHINFO_EXTENSION)
                                    );
                                    if (in_array($extension3, $allowed_extensions)) {
                                        $new_image3 = time() . '_' . rand(1000, 9999) . '_3.' .
                                            $extension3;
                                        $target3 = $upload_dir . $new_image3;
                                        if (move_uploaded_file($_FILES['product_image3']['tmp_name'], $target3)
                                        ) {
                                            if (!empty($old_image3) &&
                                                file_exists($upload_dir . $old_image3)
                                            ) {
                                                unlink($upload_dir . $old_image3);
                                            }
                                        } else {
                                            $new_image3 = $old_image3;
                                            echo '<div class="alert alert-danger fade-in">Image 3 upload failed.</div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-warning fade-in">Image 3 invalid format. Allowed: JPG, JPEG, PNG, WEBP.</div>';
                                        $new_image3 = $old_image3;
                                    }
                                } else {
                                    echo '<div class="alert alert-danger fade-in"> Image 3 upload error. </div>';
                                    $new_image3 = $old_image3;
                                }
                            }

                            /* =================================================
                               UPDATE QUERY
                            ================================================== */

                            $update = "UPDATE product SET category_id = '$category_id', product_name = '$product_name', engine = '$engine', tyre = '$tyre', paint = '$paint', gear = '$gear', fuel = '$fuel', slug = '$slug',
                            product_short_description = '$product_short_description', product_long_description = '$product_long_description',product_price = '$product_price', product_status = '1', product_image1 = '$new_image1', product_image2 = '$new_image2', product_image3 = '$new_image3' WHERE product_id = '$product_id'";

                            /* =================================================
                               RUN UPDATE
                            ================================================== */
                            if (mysqli_query($link, $update)) {
                                echo '<div class="alert alert-success fade-in">Product Updated Successfully.</div>';
                            } else {
                                echo '<div class="alert alert-danger fade-in">Database Error:' . mysqli_error($link) . '</div>';
                            }
                        }
                    }
                }


                /* =========================================================
                   GET UPDATED PRODUCT DATA
                ========================================================= */

                $query = mysqli_query($link, "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1");
                $dataq = mysqli_fetch_assoc($query);
                if (!$dataq) {
                    echo '<div class="alert alert-danger m-3">Product not found.</div>';
                    include 'footer.php';
                    exit;
                }
                ?>

                <div class="card custom-card">

                    <div class="p-3 border-bottom border-top border-block-end-dashed tab-content">

                        <form action="update-product.php?product_id=<?= $dataq['product_id'] ?>" method="POST"
                            enctype="multipart/form-data">

                            <input type="hidden" name="product_id" value="<?= $dataq['product_id'] ?>">


                            <div class="d-flex justify-content-between align-items-center mb-4 mt-4">

                                <div class="fw-semibold d-block fs-15">
                                    Update Product
                                </div>

                            </div>


                            <div class="row gy-3">

                                <!-- CATEGORY -->
                                <div class="col-xl-3">
                                    <label class="form-label">
                                        Select Category
                                    </label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        // Fetching categories that are active
                                        $category_query = "SELECT * FROM categories WHERE status = '1' ORDER BY name ASC";
                                        $category_result = mysqli_query($link, $category_query);

                                        if (mysqli_num_rows($category_result) > 0) {
                                            while ($row = mysqli_fetch_assoc($category_result)) {
                                                // Check if the current option is the product's saved category
                                                $selected = ($dataq['category_id'] == $row['id']) ? 'selected' : '';
                                                echo '<option value="' . $row['id'] . '" ' . $selected . '>' . htmlspecialchars($row['name']) . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">No Categories Available</option>';
                                        }
                                        ?>
                                    </select>
                                </div>


                                <!-- PRODUCT NAME -->
                                <div class="col-xl-9">
                                    <label class="form-label">
                                        Product Name
                                    </label>
                                    <input type="text" class="form-control" name="product_name"
                                        value="<?= htmlspecialchars($dataq['product_name']) ?>" required>
                                </div>


                                <!-- ENGINE -->
                                <div class="col-xl-6">
                                    <label class="form-label">
                                        Engine CC
                                    </label>
                                    <input type="text" class="form-control" name="engine"
                                        value="<?= htmlspecialchars($dataq['engine']) ?>" required>
                                </div>


                                <!-- TYRE -->
                                <div class="col-xl-6">
                                    <label class="form-label">
                                        Tyre
                                    </label>
                                    <input type="text" class="form-control" name="tyre"
                                        value="<?= htmlspecialchars($dataq['tyre']) ?>" required>
                                </div>


                                <!-- PAINT -->
                                <div class="col-xl-6">
                                    <label class="form-label">
                                        Paint Name
                                    </label>
                                    <input type="text" class="form-control" name="paint"
                                        value="<?= htmlspecialchars($dataq['paint']) ?>" required>
                                </div>


                                <!-- GEAR -->
                                <div class="col-xl-6">
                                    <label class="form-label">
                                        Gear
                                    </label>
                                    <input type="text" class="form-control" name="gear"
                                        value="<?= htmlspecialchars($dataq['gear']) ?>" required>
                                </div>


                                <!-- FUEL -->
                                <div class="col-xl-6">
                                    <label class="form-label">
                                        Fuel
                                    </label>
                                    <select name="fuel" class="form-control" required>
                                        <option value="">
                                            Select Fuel Type
                                        </option>
                                        <option value="Petrol" <?= ($dataq['fuel'] == 'Petrol') ? 'selected' : '' ?>>
                                            Petrol
                                        </option>
                                        <option value="Diesel" <?= ($dataq['fuel'] == 'Diesel') ? 'selected' : '' ?>>
                                            Diesel
                                        </option>
                                    </select>
                                </div>


                                <!-- PRICE -->
                                <div class="col-xl-6">
                                    <label class="form-label">
                                        Price
                                    </label>
                                    <input type="text" class="form-control" name="product_price"
                                        value="<?= htmlspecialchars($dataq['product_price']) ?>" required>
                                </div>


                                <!-- IMAGE 1 -->
                                <div class="col-xl-10">
                                    <label class="form-label">
                                        Image 1
                                    </label>
                                    <input type="file" class="form-control" name="product_image1"
                                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                        onchange="previewImage(this,'preview1')">
                                </div>
                                <div class="col-xl-2">
                                    <label class="form-label">
                                        Current Image
                                    </label>
                                    <img id="preview1" src="Uploads/<?= $dataq['product_image1'] ?>"
                                        width="100%" height="150" style="object-fit:contain;border:1px solid #ddd;"
                                        alt="Image 1">
                                </div>


                                <!-- IMAGE 2 -->
                                <div class="col-xl-10">
                                    <label class="form-label">
                                        Image 2
                                    </label>
                                    <input type="file" class="form-control" name="product_image2"
                                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                        onchange="previewImage(this,'preview2')">
                                </div>
                                <div class="col-xl-2">
                                    <label class="form-label">
                                        Current Image
                                    </label>
                                    <img id="preview2" src="Uploads/<?= $dataq['product_image2'] ?>"
                                        width="100%" height="150" style="object-fit:contain;border:1px solid #ddd;"
                                        alt="Image 2">
                                </div>


                                <!-- IMAGE 3 -->
                                <div class="col-xl-10">
                                    <label class="form-label">
                                        Image 3
                                    </label>
                                    <input type="file" class="form-control" name="product_image3"
                                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                        onchange="previewImage(this,'preview3')">
                                </div>
                                <div class="col-xl-2">
                                    <label class="form-label">
                                        Current Image
                                    </label>
                                    <img id="preview3" src="Uploads/<?= $dataq['product_image3'] ?>"
                                        width="100%" height="150" style="object-fit:contain;border:1px solid #ddd;"
                                        alt="Image 3">
                                </div>


                                <!-- SHORT DESCRIPTION -->
                                <div class="col-xl-12">
                                    <label class="form-label">
                                        Short Description
                                    </label>
                                    <textarea class="form-control" name="product_short_description" rows="5"
                                        required><?= htmlspecialchars($dataq['product_short_description']) ?></textarea>
                                </div>


                                <!-- LONG DESCRIPTION -->
                                <div class="col-xl-12">
                                    <label class="form-label">
                                        Long Description
                                    </label>
                                    <textarea class="form-control" id="summernote" name="product_long_description"
                                        required><?= htmlspecialchars($dataq['product_long_description']) ?></textarea>
                                </div>


                                <!-- BUTTON -->
                                <div class="card-footer border-top-0">
                                    <button type="submit" name="update" class="btn btn-primary">
                                        Update Product
                                    </button>
                                    <a href="all-product.php" class="btn btn-secondary ms-2">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input, imgPreviewId) {
    const file = input.files[0];
    const preview = document.getElementById(imgPreviewId);

    if (file) {
        preview.src = URL.createObjectURL(file);
    }
}
</script>

<?php

include 'footer.php';

?>
