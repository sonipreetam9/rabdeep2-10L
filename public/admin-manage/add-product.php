<?php

include 'header-top.php';

?>

<div class="main-content app-content">
    <div class="container-fluid">

        <!-- PAGE HEADER -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">Add Product</h1>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Main</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- ROW -->
        <div class="row">
            <div class="col-xl-12">

                <?php

                if (isset($_POST['submit'])) {

                    $category_id = mysqli_real_escape_string($link, trim($_POST['category_id']));
                    $product_name = mysqli_real_escape_string($link, trim($_POST['product_name']));
                    $engine = mysqli_real_escape_string($link, trim($_POST['engine']));
                    $tyre = mysqli_real_escape_string($link, trim($_POST['tyre']));
                    $paint = mysqli_real_escape_string($link, trim($_POST['paint']));
                    $gear = mysqli_real_escape_string($link, trim($_POST['gear']));
                    $fuel = mysqli_real_escape_string($link, trim($_POST['fuel']));
                    $product_price = mysqli_real_escape_string($link, trim($_POST['product_price']));
                    $product_short_description = mysqli_real_escape_string($link, trim($_POST['product_short_description']));
                    $product_long_description = mysqli_real_escape_string($link, trim($_POST['product_long_description']));

                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product_name), '-'));
                    $check = mysqli_query($link, "SELECT product_id FROM product WHERE product_name = '$product_name' LIMIT 1");

                    if (mysqli_num_rows($check) > 0) {
                        echo '<div class="alert alert-warning fade-in">This product already exists.</div>';
                    } else {
                        $upload_dir = __DIR__ . '/Uploads/';
                        if (!is_dir($upload_dir)) {
                            mkdir($upload_dir, 0755, true);
                        }
                        $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
                        function uploadProductImage(
                            $file,
                            $upload_dir,
                            $allowed_extensions
                        ) {
                            if (!isset($file) || $file['error'] === UPLOAD_ERR_NO_FILE) {
                                return null;
                            }

                            if ($file['error'] !== UPLOAD_ERR_OK) {
                                return false;
                            }
                            $original_name = $file['name'];
                            $extension = strtolower(
                                pathinfo($original_name, PATHINFO_EXTENSION)
                            );
                            $extension = preg_replace('/[^a-z0-9]/i', '', $extension);
                            if (
                                !in_array($extension, $allowed_extensions)
                            ) {
                                return false;
                            }

                            $new_name = time() . '_' . rand(1000, 9999) . '.' . $extension;
                            $source = $file['tmp_name'];

                            $target = $upload_dir . $new_name;

                            if (move_uploaded_file($source, $target)) {
                                return $new_name;
                            }
                            return false;
                        }

                        $new1 = uploadProductImage($_FILES['product_image1'] ?? null, $upload_dir, $allowed_extensions);
                        $new2 = uploadProductImage($_FILES['product_image2'] ?? null, $upload_dir, $allowed_extensions);
                        $new3 = uploadProductImage($_FILES['product_image3'] ?? null, $upload_dir, $allowed_extensions);
                        if ($new1 === false) {
                            echo '<div class="alert alert-danger fade-in"> Image 1 upload failed. Allowed formats: JPG, JPEG, PNG, WEBP. </div>';
                        } elseif ($new2 === false) {
                            echo '<div class="alert alert-danger fade-in">Image 2 upload failed. Allowed formats: JPG, JPEG, PNG, WEBP.</div>';
                        } elseif ($new3 === false) {
                            echo '<div class="alert alert-danger fade-in">Image 3 upload failed. Allowed formats: JPG, JPEG, PNG, WEBP.</div>';
                        } else {

                            $insert = "
                                INSERT INTO product
                                (category_id, product_name, engine, tyre, paint, gear, fuel, slug, product_short_description, product_long_description, product_price, product_status, product_image1, product_image2, product_image3)
                                VALUES
                                ('$category_id', '$product_name', '$engine', '$tyre', '$paint', '$gear', '$fuel', '$slug', '$product_short_description', '$product_long_description', '$product_price', '1', '$new1', '$new2', '$new3')";

                            if (mysqli_query($link, $insert)) {
                                echo '<div class="alert alert-success fade-in">Product Added Successfully.</div>';
                            } else {
                                if ($new1 && file_exists($upload_dir . $new1)) {
                                    unlink($upload_dir . $new1);
                                }
                                if ($new2 && file_exists($upload_dir . $new2)) {
                                    unlink($upload_dir . $new2);
                                }
                                if ($new3 && file_exists($upload_dir . $new3)) {
                                    unlink($upload_dir . $new3);
                                }
                                echo '<div class="alert alert-danger fade-in">Database Error:' . mysqli_error($link) . '</div>';
                            }
                        }
                    }
                }

                ?>


                <!-- =====================================================
                     PRODUCT FORM
                ====================================================== -->

                <div class="card custom-card">
                    <div class="p-3 border-bottom border-top border-block-end-dashed tab-content">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                                <div class="fw-semibold d-block fs-15">Add Product</div>
                            </div>

                            <div class="row gy-3">

                                <!-- CATEGORY -->
                                <div class="col-xl-3">
                                    <label class="form-label">Select Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        // Fetching categories that are active (status = 1)
                                        $category_query = "SELECT * FROM categories WHERE status = '1' ORDER BY name ASC";
                                        $category_result = mysqli_query($link, $category_query);

                                        if (mysqli_num_rows($category_result) > 0) {
                                            while ($row = mysqli_fetch_assoc($category_result)) {
                                                echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">No Categories Available</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- PRODUCT NAME -->
                                <div class="col-xl-9">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Product Name" required>
                                </div>

                                <!-- ENGINE -->
                                <div class="col-xl-6">
                                    <label class="form-label">Engine CC</label>
                                    <input type="text" class="form-control" name="engine" placeholder="Engine CC" required>
                                </div>

                                <!-- TYRE -->
                                <div class="col-xl-6">
                                    <label class="form-label">Tyre</label>
                                    <input type="text" class="form-control" name="tyre" placeholder="Tyre" required>
                                </div>

                                <!-- PAINT -->
                                <div class="col-xl-6">
                                    <label class="form-label">Paint Name</label>
                                    <input type="text" class="form-control" name="paint" placeholder="Paint Name" required>
                                </div>

                                <!-- GEAR -->
                                <div class="col-xl-6">
                                    <label class="form-label">Gear</label>
                                    <input type="text" class="form-control" name="gear" placeholder="Gear" required>
                                </div>

                                <!-- FUEL -->
                                <div class="col-xl-6">
                                    <label class="form-label">Fuel</label>
                                    <select name="fuel" class="form-control" required>
                                        <option value="">Select Fuel Type</option>
                                        <option value="Petrol">Petrol</option>
                                        <option value="Diesel">Diesel</option>
                                    </select>
                                </div>

                                <!-- PRICE -->
                                <div class="col-xl-6">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="product_price" placeholder="Product Price" required>
                                </div>

                                <!-- IMAGE 1 -->
                                <div class="col-xl-10">
                                    <label class="form-label">Image 1</label>
                                    <input type="file" class="form-control" name="product_image1"
                                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                        onchange="previewImage(this, 'preview1')" required>
                                </div>
                                <div class="col-xl-2">
                                    <label class="form-label">Preview</label>
                                    <img id="preview1" src="" width="100%" height="150"
                                        style="object-fit:contain; border:1px solid #ddd;" alt="Image Preview">
                                </div>

                                <!-- IMAGE 2 -->
                                <div class="col-xl-10">
                                    <label class="form-label">Image 2</label>
                                    <input type="file" class="form-control" name="product_image2"
                                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                        onchange="previewImage(this, 'preview2')" required>
                                </div>
                                <div class="col-xl-2">
                                    <label class="form-label">Preview</label>
                                    <img id="preview2" src="" width="100%" height="150"
                                        style="object-fit:contain; border:1px solid #ddd;" alt="Image Preview">
                                </div>

                                <!-- IMAGE 3 -->
                                <div class="col-xl-10">
                                    <label class="form-label">Image 3</label>
                                    <input type="file" class="form-control" name="product_image3"
                                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                        onchange="previewImage(this, 'preview3')" required>
                                </div>
                                <div class="col-xl-2">
                                    <label class="form-label">Preview</label>
                                    <img id="preview3" src="" width="100%" height="150"
                                        style="object-fit:contain; border:1px solid #ddd;" alt="Image Preview">
                                </div>

                                <!-- SHORT DESCRIPTION -->
                                <div class="col-xl-12">
                                    <label class="form-label">Short Description</label>
                                    <textarea class="form-control" name="product_short_description" rows="5" required></textarea>
                                </div>

                                <!-- LONG DESCRIPTION -->
                                <div class="col-xl-12">
                                    <label class="form-label">Long Description</label>
                                    <textarea class="form-control" id="summernote" name="product_long_description" required></textarea>
                                </div>

                                <!-- SUBMIT -->
                                <div class="card-footer border-top-0">
                                    <button type="submit" name="submit" class="btn btn-primary">Save Product</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- IMAGE PREVIEW -->
<script>
    function previewImage(input, imgPreviewId) {
        const file = input.files[0];
        const preview = document.getElementById(imgPreviewId);
        if (file) {
            preview.src = URL.createObjectURL(file);
        } else {
            preview.src = '';
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php

include 'footer.php';

?>
