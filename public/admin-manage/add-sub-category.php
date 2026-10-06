<?php
include 'config.php';
include 'header-top.php';

$message = '';
if (!empty($_GET['message'])) {
    $message = $_GET['message'];
}

?>
<!-- END SIDEBAR -->

<link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">Sub Category List</h1>
            </div>

            <!-- <div class="btn-list">
                <a href="add-sub-category.php" class="btn btn-primary-light btn-wave me-2">
                    <i class="ri-upload-cloud-line align-middle"></i> Add Sub Category
                </a>
            </div> -->

            <?php if (!empty($message)) { ?>
                <div class="alert alert-success fade-in text-start w-100 mt-3">
                    <?= $message ?>
                </div>
            <?php } ?>

        </div>
        <!-- Page Header Close -->

        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <?php
                // Add New Sub Category Code
                if (isset($_POST['submit'])) {

                    $category_id = mysqli_real_escape_string($link, $_POST['category_id']);
                    $sub_cat_name = mysqli_real_escape_string($link, $_POST['sub_cat_name']);
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $sub_cat_name)));

                    // Check if sub category already exists
                    $check_query = "SELECT * FROM sub_categories WHERE sub_cat_name = '$sub_cat_name'";
                    $check_result = mysqli_query($link, $check_query);

                    if (mysqli_num_rows($check_result) > 0) {

                        echo "<div class='alert alert-warning fade-in'>Sub Category already exists.</div>";
                    } else {

                        $insert_query = "INSERT INTO sub_categories (category_id, sub_cat_name, slug) VALUES ('$category_id', '$sub_cat_name', '$slug')";
                        if (mysqli_query($link, $insert_query)) {

                            echo "<div class='alert alert-success fade-in'>Sub Category Added Successfully.</div>";
                        } else {
                            echo "<div class='alert alert-danger fade-in'>Database Error: " . mysqli_error($link) . "</div>";
                        }
                    }
                }


                // Update Sub Category Code
                if (isset($_POST["UpdateSubCategory"])) {

                    $sub_cat_id = mysqli_real_escape_string($link, $_POST["sub_cat_id"]);
                    $category_id = mysqli_real_escape_string($link, $_POST["category_id"]);
                    $sub_cat_name = mysqli_real_escape_string($link, trim($_POST["sub_cat_name"]));

                    $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $sub_cat_name));
                    $slug = trim($slug, '-');

                    $update_query = "UPDATE sub_categories SET category_id = '$category_id', sub_cat_name = '$sub_cat_name',slug = '$slug' WHERE sub_cat_id = '$sub_cat_id'";

                    if (mysqli_query($link, $update_query)) {
                        echo "<div class='alert alert-success fade-in'>Sub Category Updated Successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger fade-in'>Database Error: " . mysqli_error($link) . "</div>";
                    }
                }


                // Delete Category Code
                if (isset($_POST["DeleteSubCategory"])) {
                
                    $sub_cat_id = $_POST["sub_cat_id"];
                    $delete_query = "DELETE FROM sub_categories WHERE sub_cat_id = '$sub_cat_id'";
                    if (mysqli_query($link, $delete_query)) {
                        echo "<div class='alert alert-success fade-in'>Sub Category Deleted Successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger fade-in'>Database Error: " . mysqli_error($link) . "</div>";
                    }
                    
                }
                

                ?>


                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Add New Sub Category</div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-xl-6">
                                    <label for="blog-title" class="form-label">Select Category Name</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        $categoryquery = mysqli_query($link, "SELECT * FROM categories ORDER BY category_id DESC");
                                        while ($category = mysqli_fetch_array($categoryquery)) {
                                            ?>
                                            <option value="<?= $category['category_id'] ?>">
                                                <?= $category['category_name'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-6">
                                    <label for="blog-title" class="form-label">Sub Category Name</label>
                                    <input type="text" class="form-control" name="sub_cat_name"
                                        placeholder="Enter Sub Category Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-list text-start">
                                <button type="submit" name="submit" class="btn btn-md btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                                        <th scope="col">Sub Category Name</th>
                                        <!-- <th scope="col">Image</th> -->
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT sub_categories.*, categories.category_name
                                    FROM sub_categories
                                    JOIN categories ON sub_categories.category_id = categories.category_id
                                    ORDER BY sub_categories.sub_cat_id DESC";
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
                                                <div class="d-flex">
                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <?= $row['sub_cat_name']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- <td>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <span class="avatar avatar-xl me-2">
                                                        <img src="Sub-Category-Upload/<?= $row['sub_cat_image']; ?>"
                                                            alt="<?= $row['sub_cat_name']; ?>">
                                                    </span>
                                                </div>
                                            </td> -->
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button type="button"
                                                        class="btn btn-icon btn-sm btn-primary-light editBtn"
                                                        data-id="<?= $row['sub_cat_id'] ?>" data-bs-toggle="modal"
                                                        data-bs-target="#formmodal<?= $row['sub_cat_id'] ?>">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <!-- Delete Button -->
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $row['sub_cat_id'] ?>">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                    <!-- <a href="javascript:void(0);"
                                                        class="btn btn-icon btn-sm btn-danger-light product-btn"><i
                                                            class="ri-delete-bin-line"></i></a> -->


                                                    <!-- Edit Category Modal -->
                                                    <div class="modal fade" id="formmodal<?= $row['sub_cat_id'] ?>"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Edit Sub Category</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <!-- form -->
                                                                <form method="post">
                                                                    <div class="modal-body">
                                                                        <!-- Hidden Sub Category ID -->
                                                                        <input type="hidden" name="sub_cat_id" value="<?= $row['sub_cat_id'] ?>">

                                                                        <!-- Category -->
                                                                        <div class="mb-3">
                                                                            <label class="col-form-label">Select
                                                                                Category:</label>
                                                                            <select class="form-control" name="category_id">
                                                                                <option value="">Select Category</option>
                                                                                <?php
                                                                                $categoryquery = mysqli_query($link, "SELECT * FROM categories ORDER BY category_id DESC");
                                                                                while ($category = mysqli_fetch_array($categoryquery)) {
                                                                                    $selected = ($category['category_id'] == $row['category_id']) ? 'selected' : '';
                                                                                    ?>
                                                                                    <option
                                                                                        value="<?= $category['category_id']; ?>"
                                                                                        <?= $selected; ?>>
                                                                                        <?= $category['category_name']; ?>
                                                                                    </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>

                                                                        <!-- Sub Category Name -->
                                                                        <div class="mb-3">
                                                                            <label class="col-form-label">Sub Category
                                                                                Name:</label>
                                                                            <input type="text" name="sub_cat_name"
                                                                                class="form-control"
                                                                                value="<?= $row['sub_cat_name']; ?>">
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                            Close
                                                                        </button>

                                                                        <button type="submit" name="UpdateSubCategory"
                                                                            class="btn btn-primary">
                                                                            Update
                                                                        </button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- Delete Category Modal -->
                                                    <div class="modal fade" id="deleteModal<?= $row['sub_cat_id'] ?>"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Delete Sub Category</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <form action="" method="POST">
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this sub
                                                                            category?
                                                                        </p>
                                                                        <input type="hidden" name="sub_cat_id"
                                                                            value="<?= $row['sub_cat_id'] ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                          name="DeleteSubCategory" class="btn btn-primary">Delete</button>
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