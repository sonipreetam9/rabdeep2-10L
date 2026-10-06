<?php
include 'config.php';

include 'header-top.php';

$message = '';
if (!empty($_GET['message'])) {
    $message = $_GET['message'];
}


// Update Category query
if (isset($_POST['update_category'])) {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $category_name)));

    $category_image = $_FILES['category_image']['name'];
    $tmp_name = $_FILES['category_image']['tmp_name'];

    // If new image uploaded
    if (!empty($category_image)) {
        $ext = strtolower(pathinfo($category_image, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $allowed)) {
            $new_name = rand(1000, 9999) . '_' . $category_image;
            move_uploaded_file($tmp_name, "Category-Upload/" . $new_name);

            $update = "UPDATE categories SET 
                category_name='$category_name',
                category_image='$new_name',
                slug='$slug'
                WHERE category_id='$category_id'";
        } else {
            echo "<div class='alert alert-danger text-center'>Invalid image type.</div>";
            exit;
        }
    } else {
        // Only name updated
        $update = "UPDATE categories SET 
            category_name='$category_name',
            slug='$slug'
            WHERE category_id='$category_id'";
    }

    if (mysqli_query($link, $update)) {
        $message = "Category updated successfully!";
    } else {
        $message = "Failed to update category.";
    }
} else {
    $message = "Invalid request.";
}

// Delete category query
if (isset($_POST['delete_category'])) {
    $id = $_POST['category_id'];
    $sql = "DELETE FROM categories WHERE category_id = $id";

    if (mysqli_query($link, $sql)) {
        $message = "Category deleted successfully!";
    } else {
        $message = "Failed to delete category.";
    }

}

?>
<!-- END SIDEBAR -->

<link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">Category List</h1>
            </div>

            <div class="btn-list">
                <a href="add-category.php" class="btn btn-primary-light btn-wave me-2">
                    <i class="ri-upload-cloud-line align-middle"></i> Add Category
                </a>
            </div>

            <?php if (!empty($message)) { ?>
                <div class="alert alert-success fade-in text-start w-100 mt-3">
                    <?= $message ?>
                </div>
            <?php } ?>

        </div>
        <!-- Page Header Close -->


        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM categories ORDER BY category_id DESC";
                                    $result = mysqli_query($link, $query);
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $i++;
                                        ?>
                                        <tr class="product-list">
                                            <td>
                                                <div class="d-flex">
                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <?= $i; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <?= $row['category_name']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <span class="avatar avatar-xl me-2">
                                                        <img src="Category-Upload/<?= $row['category_image']; ?>"
                                                            alt="<?= $row['category_name']; ?>">
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button type="button"
                                                        class="btn btn-icon btn-sm btn-primary-light editBtn"
                                                        data-id="<?= $row['category_id'] ?>" data-bs-toggle="modal"
                                                        data-bs-target="#formmodal<?= $row['category_id'] ?>">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <!-- Delete Button -->
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $row['category_id'] ?>">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                    <!-- <a href="javascript:void(0);"
                                                        class="btn btn-icon btn-sm btn-danger-light product-btn"><i
                                                            class="ri-delete-bin-line"></i></a> -->


                                                    <!-- Edit Category Modal -->
                                                    <div class="modal fade" id="formmodal<?= $row['category_id'] ?>"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Edit Category</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form enctype="multipart/form-data" action=""
                                                                        method="post">
                                                                        <input type="hidden" name="category_id"
                                                                            value="<?= $row['category_id'] ?>">

                                                                        <div class="mb-3">
                                                                            <label class="col-form-label">Category
                                                                                Name:</label>
                                                                            <input type="text" name="category_name"
                                                                                class="form-control"
                                                                                value="<?= $row['category_name']; ?>">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="col-form-label">Category
                                                                                Image:</label>
                                                                            <input type="file" name="category_image"
                                                                                class="form-control">
                                                                            <img src="Category-Upload/<?= $row['category_image']; ?>"
                                                                                class="mt-2" width="100">
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="update_category"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Delete Category Modal -->
                                                    <div class="modal fade" id="deleteModal<?= $row['category_id'] ?>"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Delete Category</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <form action="" method="POST">
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this category?
                                                                        </p>
                                                                        <input type="hidden" name="category_id"
                                                                            value="<?= $row['category_id'] ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            name="delete_category">Delete</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- END MAIN-CONTENT -->

<?php

include 'footer.php';

?>