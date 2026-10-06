<?php

include 'header-top.php';

?>

<!-- END SIDEBAR -->


<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start::page-header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">
                    Accessories
                </h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="dashboard.php">Main</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Accessories
                    </li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <?php
                if (isset($_POST["submit"])) {

                    $category = mysqli_real_escape_string($link, $_POST['category']);
                    $title = mysqli_real_escape_string($link, $_POST['title']);
                    $price = mysqli_real_escape_string($link, $_POST['price']);
                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
                    $image_path = '';

                    // Upload new image
                    if (!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $imageno = $_FILES['image']['name'];
                        $extension = strtolower(pathinfo($imageno, PATHINFO_EXTENSION));

                        if (in_array($extension, $allowed_extensions)) {
                            $ran = rand(9999999, 99999999999);
                            $imagename = $ran . '.' . $extension;
                            $source = $_FILES['image']['tmp_name'];
                            // Uploads folder already exists
                            $target = "Uploads/" . $imagename;

                            if (move_uploaded_file($source, $target)) {
                                $image_path = $imagename;
                            } else {
                                echo '<div class="alert alert-danger fade-in" role="alert">Image upload failed. Please try again.</div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger fade-in" role="alert">Invalid image format. Allowed formats are JPG, JPEG, PNG and WEBP.</div>';
                        }
                    }

                    if (empty($error_message)) {
                        $query = "INSERT INTO accessories (category, title, price, image) VALUES ('$category', '$title', '$price', '$image_path')";
                        if (mysqli_query($link, $query)) {
                            echo '<div class="alert alert-success fade-in" role="alert">Accessories added successfully.</div>';
                        } else {
                            echo '<div class="alert alert-danger fade-in" role="alert">Database Error: ' . mysqli_error($link) . '</div>';
                        }
                    }
                }


                if (isset($_POST["UpdateAccessories"])) {

                    $id = intval($_POST['id']);
                    $category = mysqli_real_escape_string($link, $_POST['category']);
                    $title = mysqli_real_escape_string($link, $_POST['title']);
                    $price = mysqli_real_escape_string($link, $_POST['price']);
                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];

                    // Get old image
                    $old_query = "SELECT image FROM accessories WHERE id = '$id' LIMIT 1";
                    $old_result = mysqli_query($link, $old_query);
                    $old_row = mysqli_fetch_assoc($old_result);

                    $old_image = $old_row['image'] ?? '';

                    if (!empty($_FILES['edit_image']['tmp_name']) && is_uploaded_file($_FILES['edit_image']['tmp_name'])) {
                        $imageno = $_FILES['edit_image']['name'];
                        $extension = strtolower(pathinfo($imageno, PATHINFO_EXTENSION));

                        if (in_array($extension, $allowed_extensions)) {

                            $ran = rand(9999999, 99999999999);
                            $imagename = $ran . '.' . $extension;
                            $source = $_FILES['edit_image']['tmp_name'];
                            $target = "Uploads/" . $imagename;

                            if (move_uploaded_file($source, $target)) {
                                $image_path = $imagename;
                                // Delete old image
                                if (!empty($old_image)) {
                                    $old_file = "Uploads/" . $old_image;
                                    if (file_exists($old_file)) {
                                        unlink($old_file);
                                    }
                                }

                            } else {
                                echo '<div class="alert alert-danger fade-in" role="alert">New image upload failed.</div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger fade-in" role="alert">Invalid image format. Allowed formats are JPG, JPEG, PNG and WEBP.</div>';
                        }
                    } else {

                        // Keep old image if new image is not selected
                        $image_path = $old_image;
                    }

                    if (empty($error_message)) {

                        $update_query = "UPDATE accessories SET
                            category = '$category',
                            title = '$title',
                            price = '$price',
                            image = '$image_path'
                         WHERE id = '$id'";

                        if (mysqli_query($link, $update_query)) {

                            echo '<div class="alert alert-success fade-in" role="alert">Accessories updated successfully.</div>';

                        } else {

                            echo '<div class="alert alert-danger fade-in" role="alert">Database Error: ' . mysqli_error($link) . '</div>';
                        }
                    }
                }


                if (isset($_POST["DeleteAccessories"])) {

                    $id = $_POST["id"];
                    // Get image before deleting record
                    $image_query = "SELECT image FROM accessories WHERE id = '$id' LIMIT 1";
                    $image_result = mysqli_query($link, $image_query);
                    $image_row = mysqli_fetch_assoc($image_result);

                    $image = $image_row['image'] ?? '';

                    // Delete database record
                    $delete_query = "DELETE FROM accessories WHERE id = '$id'";

                    if (mysqli_query($link, $delete_query)) {

                        // Delete image from Uploads folder
                        if (!empty($image)) {

                            $image_file = "Uploads/" . $image;

                            if (file_exists($image_file)) {
                                unlink($image_file);
                            }
                        }

                    echo '<div class="alert alert-success fade-in" role="alert">Accessories deleted successfully.</div>';

                    } else {

                        echo '<div class="alert alert-danger fade-in" role="alert">Database Error: ' . mysqli_error($link) . '</div>';
                    }
                }

                ?>

                <!-- ADD ACCESSORIES -->
                <div class="card custom-card">

                    <div class="card-header">

                        <div class="card-title">
                            Add Accessories
                        </div>

                    </div>


                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="card-body">

                            <div class="row gy-3">

                                <!-- Category -->
                                <div class="col-xl-4">

                                    <label for="category" class="form-label">
                                        Category
                                    </label>

                                    <select name="category" class="form-control" id="category" required>

                                        <option value="">
                                            Select Category
                                        </option>

                                        <option value="Exterior">
                                            Exterior
                                        </option>

                                        <option value="Lighting">
                                            Lighting
                                        </option>

                                        <option value="Wheels">
                                            Wheels
                                        </option>

                                        <option value="Interior">
                                            Interior
                                        </option>


                                    </select>

                                </div>


                                <!-- Title -->
                                <div class="col-xl-5">

                                    <label for="title" class="form-label">
                                        Product Name
                                    </label>

                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Product Name" required>

                                </div>


                                <!-- Price -->
                                <div class="col-xl-3">

                                    <label for="price" class="form-label">
                                        Price
                                    </label>

                                    <input type="text" class="form-control" name="price" id="price" placeholder="Price"
                                        required>

                                </div>


                                <!-- Image -->
                                <div class="col-xl-12">

                                    <label class="form-label">
                                        Image
                                    </label>

                                    <input type="file" class="form-control" name="image"
                                        accept="image/jpeg,image/png,image/webp"
                                        onchange="previewImage(this, 'preview1')">

                                    <div class="mt-2">

                                        <img id="preview1" src="" style="max-height:100px; display:none;"
                                            alt="Image Preview">

                                    </div>

                                </div>


                            </div>

                        </div>


                        <div class="card-footer">

                            <div class="btn-list text-start">

                                <button type="submit" name="submit" class="btn btn-md btn-primary">

                                    Submit

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
        <!--End::row-1 -->


        <!-- ACCESSORIES LIST -->
        <div class="row">

            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="card-header">

                        <div class="card-title">
                            Accessories List
                        </div>

                    </div>


                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table display" id="myTable">

                                <thead>

                                    <tr>

                                        <th>Sr.</th>

                                        <th>Image</th>

                                        <th>Category</th>

                                        <th>Product Name</th>

                                        <th>Price</th>

                                        <th>Action</th>

                                    </tr>

                                </thead>


                                <tbody>

                                    <?php

                                    $query = "SELECT * FROM accessories ORDER BY id DESC";
                                    $result = mysqli_query($link, $query);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $i++;
                                        ?>

                                        <tr class="product-list">


                                            <!-- SR -->
                                            <td>
                                                <?= $i; ?>
                                            </td>

                                            <!-- IMAGE -->
                                            <td>

                                                <?php if (!empty($row['image'])) { ?>
                                                    <img src="Uploads/<?= $row['image']; ?>"
                                                        style="height:70px;width:90px;object-fit:cover;border-radius:5px;"
                                                        alt="Accessories Image">
                                                <?php } else { ?>
                                                    <span class="text-muted">
                                                        No Image
                                                    </span>
                                                <?php } ?>
                                            </td>

                                            <!-- CATEGORY -->
                                            <td>
                                                <span class="badge bg-primary">
                                                    <?= $row['category']; ?>
                                                </span>
                                            </td>


                                            <!-- TITLE -->
                                            <td>
                                                <p class="fw-semibold mb-0">
                                                    <?= $row['title']; ?>
                                                </p>

                                            </td>


                                            <!-- PRICE -->
                                            <td>

                                                <strong>
                                                    ₹<?= $row['price']; ?>
                                                </strong>

                                            </td>


                                            <!-- ACTION -->
                                            <td>

                                                <div class="hstack gap-2 fs-15">


                                                    <!-- EDIT BUTTON -->
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#formmodal<?= $row['id']; ?>">

                                                        <i class="ri-edit-line"></i>

                                                    </button>


                                                    <!-- DELETE BUTTON -->
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $row['id']; ?>">

                                                        <i class="ri-delete-bin-line"></i>

                                                    </button>


                                                </div>


                                                <!-- =====================================================
                                                     EDIT MODAL
                                                ====================================================== -->

                                                <div class="modal fade" id="formmodal<?= $row['id']; ?>" tabindex="-1"
                                                    aria-hidden="true">

                                                    <div class="modal-dialog modal-lg">

                                                        <div class="modal-content">


                                                            <div class="modal-header">

                                                                <h6 class="modal-title">
                                                                    Edit Accessories
                                                                </h6>

                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>

                                                            </div>


                                                            <form enctype="multipart/form-data" action="" method="POST">


                                                                <div class="modal-body">


                                                                    <input type="hidden" name="id"
                                                                        value="<?= $row['id']; ?>">


                                                                    <!-- CATEGORY -->
                                                                    <div class="mb-3">

                                                                        <label class="form-label">
                                                                            Category
                                                                        </label>

                                                                        <select name="category" class="form-control"
                                                                            required>

                                                                            <option value="Exterior"
                                                                                <?= ($row['category'] == 'Exterior') ? 'selected' : ''; ?>>
                                                                                Exterior
                                                                            </option>

                                                                            <option value="Lighting"
                                                                                <?= ($row['category'] == 'Lighting') ? 'selected' : ''; ?>>
                                                                                Lighting
                                                                            </option>

                                                                            <option value="Wheels"
                                                                                <?= ($row['category'] == 'Wheels') ? 'selected' : ''; ?>>
                                                                                Wheels
                                                                            </option>

                                                                            <option value="Interior"
                                                                                <?= ($row['category'] == 'Interior') ? 'selected' : ''; ?>>
                                                                                Interior
                                                                            </option>

                                                                            <option value="Off Road"
                                                                                <?= ($row['category'] == 'Off Road') ? 'selected' : ''; ?>>
                                                                                Off Road
                                                                            </option>

                                                                        </select>

                                                                    </div>


                                                                    <!-- TITLE -->
                                                                    <div class="mb-3">

                                                                        <label class="form-label">
                                                                            Product Name
                                                                        </label>

                                                                        <input type="text" name="title" class="form-control"
                                                                            value="<?= $row['title']; ?>"
                                                                            required>

                                                                    </div>


                                                                    <!-- PRICE -->
                                                                    <div class="mb-3">

                                                                        <label class="form-label">
                                                                            Price
                                                                        </label>

                                                                        <input type="text" name="price" class="form-control"
                                                                            value="<?= $row['price']; ?>"
                                                                            required>

                                                                    </div>


                                                                    <!-- OLD IMAGE -->
                                                                    <?php if (!empty($row['image'])) { ?>

                                                                        <div class="mb-3">
                                                                            <label class="form-label">
                                                                                Current Image
                                                                            </label>
                                                                            <div>
                                                                                <img src="Uploads/<?= $row['image']; ?>"
                                                                                    style="width:120px;height:90px;object-fit:cover;border-radius:5px;"
                                                                                    alt="Current Image">

                                                                            </div>
                                                                        </div>

                                                                    <?php } ?>


                                                                    <!-- NEW IMAGE -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label">
                                                                            Change Image
                                                                        </label>
                                                                        <input type="file" name="edit_image"
                                                                            class="form-control"
                                                                            accept="image/jpeg,image/png,image/webp">
                                                                        <small class="text-muted">
                                                                            Leave empty if you don't want to change the
                                                                            current image.
                                                                        </small>
                                                                    </div>
                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close
                                                                    </button>

                                                                    <button type="submit" name="UpdateAccessories" class="btn btn-primary">
                                                                        Update
                                                                    </button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- =====================================================
                                                     DELETE MODAL
                                                ===================================================== -->
                                                <div class="modal fade" id="deleteModal<?= $row['id']; ?>" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">
                                                                    Delete Accessories
                                                                </h6>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>
                                                            </div>


                                                            <form action="" method="POST">
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Are you sure you want to delete
                                                                        <strong>
                                                                            <?= $row['title']; ?>
                                                                        </strong>?
                                                                    </p>

                                                                    <input type="hidden" name="id"
                                                                        value="<?= $row['id']; ?>">

                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Cancel
                                                                    </button>

                                                                    <button type="submit" name="DeleteAccessories"
                                                                        class="btn btn-danger">
                                                                        Delete
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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

<!-- END MAIN-CONTENT -->
<!-- FOOTER -->

<?php

include 'footer.php';

?>


<script>
    function previewImage(input, imgPreviewId) {

        const file = input.files[0];
        const preview = document.getElementById(imgPreviewId);
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>