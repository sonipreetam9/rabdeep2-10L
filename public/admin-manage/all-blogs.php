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
                <h1 class="page-title fw-medium fs-18 mb-2">All Blog</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Main</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Blog</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!--End::row-1 -->
        <div class="row">
            <div class="col-xl-12">

                <?php

                // Delete Category Code
                if (isset($_POST["Submit"])) {

                    $id = $_POST["id"];
                    // Correct delete query
                    $delete_query = "DELETE FROM blogs WHERE id = '$id'";
                    if (mysqli_query($link, $delete_query)) {
                        echo "<div class='alert alert-success fade-in'>Blog Deleted Successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger fade-in'>Database Error: " . mysqli_error($link) . "</div>";
                    }

                }

                ?>
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM blogs ORDER BY id DESC";
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
                                                        <img src="Uploads/<?= $row['image']; ?>" style="height: 70px;"
                                                            alt="about image">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <?= $row['title']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="edit-blogs.php?id=<?= $row['id']; ?>"
                                                        class="btn btn-icon btn-sm btn-primary-light editBtn">
                                                        <i class="ri-edit-line"></i>
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $row['id'] ?>">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>


                                                    <!-- Edit Category Modal -->
                                                    <div class="modal fade" id="formmodal<?= $row['id'] ?>" tabindex="-1"
                                                        aria-hidden="true">
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
                                                                        <input type="hidden" name="id"
                                                                            value="<?= $row['id'] ?>">

                                                                        <div class="mb-3">
                                                                            <label class="col-form-label">Category
                                                                                Name:</label>
                                                                            <input type="text" name="category_name"
                                                                                class="form-control"
                                                                                value="<?= $row['category_name']; ?>">
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
                                                    <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Delete Blog</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <form action="" method="POST">
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this blog?
                                                                        </p>
                                                                        <input type="hidden" name="id"
                                                                            value="<?= $row['id'] ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <button type="submit" name="Submit"
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
<script>
    function previewImage(input, imgPreviewId) {
        const file = input.files[0];
        const preview = document.getElementById(imgPreviewId);

        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    }
</script>