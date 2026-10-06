<?php

include 'header-top.php';

?>
<!-- END SIDEBAR -->

<!-- MAIN-CONTENT -->

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Start::page-header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">Add Brand</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Main</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Add Brand</div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-xl-6">
                                <label for="blog-title" class="form-label">Brand Name</label>
                                <input type="text" class="form-control" id="blog-title" placeholder="Category Name">
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-file" class="form-label">File</label>
                                <input class="form-control" type="file" id="input-file">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-list text-start">
                            <button type="button" class="btn btn-md btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::row-1 -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Brand List
                        </div>
                        <div class="d-flex gap-3">
                            <input class="form-control form-control-sm" type="text" placeholder="Search Here"
                                aria-label=".form-control-sm example">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap border">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="product-list">
                                        <td>
                                            <div class="d-flex">
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 d-flex align-items-center">1</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 d-flex align-items-center">Wooden Sofa
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center fw-semibold">
                                                <span class="avatar avatar-xl me-2">
                                                    <img src="assets/images/faces/4.jpg" alt="">
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="edit-product.html"
                                                    class="btn btn-icon btn-sm btn-primary-light"><i
                                                        class="ri-edit-line"></i></a>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-icon btn-sm btn-danger-light product-btn"><i
                                                        class="ri-delete-bin-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center flex-wrap overflow-auto">
                            <div class="mb-2 mb-sm-0">
                                Showing <b>1</b> to <b>5</b> of <b>10</b> entries <i
                                    class="bi bi-arrow-right ms-2 fw-semibold"></i>
                            </div>
                            <div class="ms-auto">
                                <ul class="pagination mb-0 overflow-auto">
                                    <li class="page-item disabled">
                                        <a class="page-link">Previous</a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link"
                                            href="javascript:void(0)">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- End::app-content -->

<!-- END MAIN-CONTENT -->

<!-- FOOTER -->

<?php

include 'footer.php';

?>