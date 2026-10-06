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
                <h1 class="page-title fw-medium fs-18 mb-2">Category List</h1>
            </div>

            <div class="btn-list">
                <a href="add-category.php" class="btn btn-primary-light btn-wave me-2">
                    <i class="ri-upload-cloud-line align-middle"></i> Add Category
                </a>
            </div>

            <?php if (!empty($message)) { ?>
                <div class="alert alert-success fade-in text-center w-100 mt-3">
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
                                                                    <form enctype="multipart/form-data"
                                                                        action="update_category.php" method="post">
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
                                                                            <button type="submit" name="submit"
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

                                                                <form action="category_delete.php" method="POST">
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this category?
                                                                        </p>
                                                                        <input type="hidden" name="category_id"
                                                                            value="<?= $row['category_id'] ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- END MAIN-CONTENT -->

<?php

include 'footer.php';

?>