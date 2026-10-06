<?php
include 'config.php';

include 'header-top.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM contactus WHERE id = $id";
    if (mysqli_query($link, $query)) {
        $message = "Contact Delete Successfully.";
    } else {
        $message = "Something went wrong. please try again!";
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
                <h1 class="page-title fw-medium fs-18 mb-2">Contact Request</h1>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM contactus ORDER BY id DESC";
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
                                                <div class="d-flex">
                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <?= date('Y-m-d', strtotime($row['created_at'])); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="contact-detail.php?id=<?= $row['id'] ?>" type="button"
                                                        class="btn btn-icon btn-sm btn-warning-light">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                     <!-- Delete Button -->
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $row['id'] ?>">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>

                                                    <!-- Delete Category Modal -->
                                                    <div class="modal fade" id="deleteModal<?= $row['id'] ?>"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Delete Product</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <form action="" method="POST">
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this contact
                                                                            permanently?</p>
                                                                        <input type="hidden" name="id"
                                                                            value="<?= $row['id'] ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <button type="submit" name="delete"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </div>
                                                               </form>
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