<?php
include 'config.php';

include 'header-top.php';

$message = '';
if (!empty($_GET['message'])) {
    $message = $_GET['message'];
}

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $user_status = $_POST['user_status'];

    $update = "UPDATE register_user SET user_status = '$user_status' WHERE user_id = '$user_id'";
    if (mysqli_query($link, $update)) {
        $message = "User status updated successfully!";
    } else {
        $message = "Error: " . mysqli_error($link);
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
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Phone</th>
                                        <th scope="col">User Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM register_user ORDER BY user_id DESC";
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
                                                            <?= $row['name']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <?= $row['phone']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <?= $row['email']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">

                                                    <a href="user-detail.php?user_id=<?= $row['user_id'] ?>" type="button"
                                                        class="btn btn-icon btn-sm btn-warning-light">
                                                        <i class="ri-eye-line"></i>
                                                    </a>

                                                    <button type="button"
                                                        class="btn btn-sm <?= $row['user_status'] == 1 ? 'btn-success' : 'btn-danger' ?> btn-wave editBtn"
                                                        data-id="<?= $row['user_id'] ?>" data-bs-toggle="modal"
                                                        data-bs-target="#formmodal<?= $row['user_id'] ?>">
                                                        <?= $row['user_status'] == 1 ? 'Block' : 'Unblock' ?>
                                                    </button>

                                                    <!-- Delete Button -->
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $row['user_id'] ?>">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                    <!-- <a href="javascript:void(0);"
                                                        class="btn btn-icon btn-sm btn-danger-light product-btn"><i
                                                            class="ri-delete-bin-line"></i></a> -->


                                                    <!-- Edit User Modal -->
                                                    <div class="modal fade" id="formmodal<?= $row['user_id'] ?>"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">User Block / Unblock</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="user_id"
                                                                            value="<?= $row['user_id'] ?>">

                                                                        <div class="mb-3">
                                                                            <label class="col-form-label">Select</label>

                                                                            <select name="user_status" class="form-select">
                                                                                <option value="1" <?= $row['user_status'] == 1 ? 'selected' : '' ?>>Active (Unblock)
                                                                                </option>
                                                                                <option value="0" <?= $row['user_status'] == 0 ? 'selected' : '' ?>>Blocked</option>
                                                                            </select>
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
                                                    <div class="modal fade" id="deleteModal<?= $row['user_id'] ?>"
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
                                                                        <input type="hidden" name="user_id"
                                                                            value="<?= $row['user_id'] ?>">
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