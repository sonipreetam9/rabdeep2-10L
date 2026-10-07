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
                <h1 class="page-title fw-medium fs-18 mb-2">Add Product Category</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Main</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">


                <?php

                // Add New Category Code
                if (isset($_POST['submit'])) {

                    $name = mysqli_real_escape_string($link, $_POST['name']);
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
                    $status = mysqli_real_escape_string($link, $_POST['status']);

                    // Check if category already exists
                    $check_query = "SELECT * FROM categories WHERE name = '$name'";
                    $check_result = mysqli_query($link, $check_query);

                    if (mysqli_num_rows($check_result) > 0) {
                        echo "<div class='alert alert-warning fade-in'>Category name already exists.</div>";
                    } else {
                        $insert_query = "INSERT INTO categories (name, slug, status) VALUES ('$name', '$slug', '$status')";

                        if (mysqli_query($link, $insert_query)) {
                            echo "<div class='alert alert-success fade-in'>Category Added Successfully.</div>";
                        } else {
                            echo "<div class='alert alert-danger fade-in'>Database Error: " . mysqli_error($link) . "</div>";
                        }
                    }
                }


                // Update Category Code
                if (isset($_POST["UpdateCategory"])) {

                    $id = mysqli_real_escape_string($link, $_POST["id"]);
                    $name = mysqli_real_escape_string($link, $_POST["name"]);
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
                    $status = mysqli_real_escape_string($link, $_POST["status"]);

                    $update_query = "UPDATE categories SET name = '$name', slug = '$slug', status = '$status' WHERE id = '$id'";

                    if (mysqli_query($link, $update_query)) {
                        echo "<div class='alert alert-success fade-in'>Category Updated Successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger fade-in'>Database Error: " . mysqli_error($link) . "</div>";
                    }

                }

                // Delete Category Code
                if (isset($_POST["DeleteCategory"])) {

                    $id = mysqli_real_escape_string($link, $_POST["id"]);
                    $delete_query = "DELETE FROM categories WHERE id = '$id'";

                    if (mysqli_query($link, $delete_query)) {
                        echo "<div class='alert alert-success fade-in'>Category Deleted Successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger fade-in'>Database Error: " . mysqli_error($link) . "</div>";
                    }

                }

                ?>


                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Add New Category</div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-xl-6">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Category Name" required>
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-control form-select" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
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
        <!--End::row-1 -->

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
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM categories ORDER BY id DESC";
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
                                                            <?= htmlspecialchars($row['name']); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if($row['status'] == 1): ?>
                                                    <span class="badge bg-success">Active</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button type="button"
                                                        class="btn btn-icon btn-sm btn-primary-light editBtn"
                                                        data-id="<?= $row['id'] ?>" data-bs-toggle="modal"
                                                        data-bs-target="#formmodal<?= $row['id'] ?>">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <!-- Delete Button -->
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $row['id'] ?>">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>


                                                    <!-- Edit Category Modal -->
                                                    <div class="modal fade" id="formmodal<?= $row['id'] ?>"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Edit Category</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form enctype="multipart/form-data" action="" method="post">
                                                                        <input type="hidden" name="id"
                                                                            value="<?= $row['id'] ?>">

                                                                        <div class="mb-3">
                                                                            <label class="col-form-label">Category Name:</label>
                                                                            <input type="text" name="name"
                                                                                class="form-control"
                                                                                value="<?= htmlspecialchars($row['name']); ?>" required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="col-form-label">Status:</label>
                                                                            <select class="form-control form-select" name="status" required>
                                                                                <option value="1" <?= ($row['status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                                                                <option value="0" <?= ($row['status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="UpdateCategory"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>

                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Delete Category Modal -->
                                                    <div class="modal fade" id="deleteModal<?= $row['id'] ?>"
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
                                                                        <p>Are you sure you want to delete this category?</p>
                                                                        <input type="hidden" name="id"
                                                                            value="<?= $row['id'] ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <button type="submit" name="DeleteCategory"
                                                                            class="btn btn-primary">Delete</button>
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

<!-- END MAIN-CONTENT -->

<!-- FOOTER -->
<?php

include 'footer.php';

?>
