<?php

include 'header-top.php';

?>
<!-- END SIDEBAR -->

<!-- Start::app-content -->

<div class="main-content app-content">

    <div class="container-fluid">
        <!-- PAGE HEADER -->
        <div class="my-4 page-header-breadcrumb
                    d-flex align-items-center
                    justify-content-between
                    flex-wrap gap-2">

            <div>

                <h1 class="page-title fw-medium fs-18 mb-2">
                    Instagram Reels
                </h1>

                <ol class="breadcrumb mb-0">

                    <li class="breadcrumb-item">
                        <a href="dashboard.php">
                            Main
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Instagram Reels
                    </li>

                </ol>

            </div>

        </div>


        <!-- =====================================================
                         ADD INSTAGRAM
        ====================================================== -->

        <div class="row">

            <div class="col-xl-12">
                <?php
                // Add New Portfolio Code
                if (isset($_POST["submit"])) {
                    $instagram_url = mysqli_real_escape_string($link, $_POST['instagram_url']);
                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
                    $image_path = null;

                    // Handle single file upload
                    if (!empty($_FILES['thumbnail']['tmp_name']) && is_uploaded_file($_FILES['thumbnail']['tmp_name'])) {
                        $imageno = $_FILES['thumbnail']['name'];
                        $extension = strtolower(pathinfo($imageno, PATHINFO_EXTENSION));
                        if (in_array($extension, $allowed_extensions)) {
                            $ran = rand(9999999, 99999999999);
                            $imagename = $ran . '.' . $extension;
                            $source = $_FILES['thumbnail']['tmp_name'];
                            $target = "Uploads/" . $imagename;
                            move_uploaded_file($source, $target);
                            $image_path = $imagename;

                        } else {
                            echo '<div class="alert alert-danger fade-in" role="alert">Invalid image format. Allowed formats are .jpg, .jpeg, .png, .webp.</div>';
                            exit;
                        }
                    }
                    // Insert data into the database
                    $query = "INSERT INTO instagram_reels (instagram_url, thumbnail) VALUES ('$instagram_url', '$image_path')";
                    $result = mysqli_query($link, $query);

                    if ($result) {
                        echo '<div class="alert alert-success fade-in" role="alert">Added successfully.</div>';
                    } else {
                        echo '<div class="alert alert-danger fade-in" role="alert">Try again.</div>';
                    }
                }

                // Delete Portfolio Code
                if (isset($_POST["DeleteReel"])) {
                    $id = $_POST["id"];
                    // Correct delete query
                    $delete_query = "DELETE FROM instagram_reels WHERE id = '$id'";
                    if (mysqli_query($link, $delete_query)) {
                        echo "<div class='alert alert-success fade-in'>Reel Deleted Successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger fade-in'>Database Error: " . mysqli_error($link) . "</div>";
                    }
                }
                ?>
                <div class="card custom-card">

                    <div class="card-header">

                        <div class="card-title">
                            Add Instagram Reel
                        </div>

                    </div>

                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="card-body">
                            <div class="row gy-3">
                                <!-- INSTAGRAM URL -->
                                <div class="col-xl-8">
                                    <label class="form-label">
                                        Instagram Post / Reel URL
                                    </label>
                                    <input type="url" name="instagram_url" class="form-control"
                                        placeholder="https://www.instagram.com/reel/XXXXXXXX/" required>
                                </div>


                                <!-- THUMBNAIL -->

                                <div class="col-xl-4">

                                    <label class="form-label">

                                        Thumbnail

                                    </label>

                                    <input type="file" name="thumbnail" class="form-control"
                                        accept="image/jpeg,image/png,image/webp" onchange="previewImage(this)">
                                </div>
                                <!-- PREVIEW -->
                                <div class="col-xl-12">
                                    <div class="mt-2">
                                        <img id="thumbnailPreview" src="" style="
                                                width:120px;
                                                height:180px;
                                                object-fit:cover;
                                                border-radius:8px;
                                                display:none;
                                             " alt="Thumbnail Preview">

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="ri-instagram-line"></i>
                                Add Reel
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>


        <!-- =====================================================
                         INSTAGRAM LIST
        ====================================================== -->

        <div class="row">

            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="card-header">

                        <div class="card-title">
                            Instagram Reels List
                        </div>

                    </div>


                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table display" id="myTable">

                                <thead>

                                    <tr>

                                        <th>
                                            Sr.
                                        </th>

                                        <th>
                                            Thumbnail
                                        </th>

                                        <th>
                                            Instagram URL
                                        </th>

                                        <th>
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    <?php

                                    $query = "SELECT * FROM instagram_reels ORDER BY id DESC";
                                    $result = mysqli_query($link, $query);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $i++;
                                        ?>

                                        <tr>
                                            <!-- SR -->
                                            <td>
                                                <?= $i; ?>
                                            </td>

                                            <!-- THUMBNAIL -->
                                            <td>
                                                <img src="Uploads/<?= $row['thumbnail']; ?>" style="width:80px; height:120px; object-fit:cover; border-radius:7px;" alt="Instagram Thumbnail">
                                            </td>


                                            <!-- URL -->
                                            <td>
                                                <a href="<?= $row['instagram_url']; ?>" target="_blank"
                                                    rel="noopener noreferrer">
                                                    <?= $row['instagram_url']; ?>
                                                </a>
                                            </td>


                                            <!-- ACTION -->
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal<?= $row['id']; ?>">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>

                                                <!-- DELETE MODAL -->
                                                <div class="modal fade" id="deleteModal<?= $row['id']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">
                                                                    Delete Instagram Reel
                                                                </h6>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>
                                                            </div>

                                                            <form action="" method="POST">
                                                                <div class="modal-body">
                                                                    <p>

                                                                        Are you sure you want
                                                                        to delete this
                                                                        Instagram Reel?
                                                                    </p>
                                                                    <input type="hidden" name="id"
                                                                        value="<?= $row['id']; ?>">
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Cancel
                                                                    </button>

                                                                    <button type="submit" name="DeleteReel"
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

                                    <?php } ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script>
    function previewImage(input) {

        const file = input.files[0];

        const preview =
            document.getElementById('thumbnailPreview');

        if (file) {

            preview.src =
                URL.createObjectURL(file);

            preview.style.display =
                'block';

        } else {

            preview.src = '';

            preview.style.display =
                'none';
        }
    }
</script>


<?php

include 'footer.php';

?>