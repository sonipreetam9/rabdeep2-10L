<?php
session_start();

if (!isset($_SESSION['superid'])) {
    header("Location: index.php");
    exit;
}

include 'header-top.php';

?>
<!-- MAIN-CONTENT -->

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">Products List</h1>
                <div class="">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header Close -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Products List
                        </div>
                        <div class="d-flex gap-3">
                            <input class="form-control form-control-sm" type="text" placeholder="Search Here"
                                aria-label=".form-control-sm example">
                            <a href="add-product.html" class="btn btn-primary btn-sm me-2 text-nowrap"><i
                                    class="ri-add-line me-1 fw-medium align-middle"></i>Add Product</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap border">
                                <thead>
                                    <tr>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Seller</th>
                                        <th scope="col">Published</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="product-list">
                                        <td>
                                            <div class="d-flex">
                                                <span
                                                    class="avatar avatar-md avatar-square bg-primary-transparent p-1"><img
                                                        src="assets/images/ecommerce/png/1.png" class="w-100 h-100"
                                                        alt="..."></span>
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 d-flex align-items-center"><a
                                                            href="javascript:void(0);">Wooden Sofa</a></p>
                                                    <p class="fs-12 text-muted mb-0">Accusam Brand</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>Electronic</span>
                                        </td>
                                        <td>$1,299</td>
                                        <td>283</td>
                                        <td><span class="badge bg-primary-transparent">Published</span></td>
                                        <td>
                                            <div class="d-flex align-items-center fw-semibold">
                                                <span class="avatar avatar-sm p-1 bg-light me-2 avatar-rounded">
                                                    <img src="assets/images/faces/4.jpg" alt="">
                                                </span>
                                                <a href="javascript:void(0);">Mayor Kelly</a>
                                            </div>
                                        </td>
                                        <td>24,Nov 2023 - 04:42PM</td>
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
                                    <tr class="product-list">
                                        <td>
                                            <div class="d-flex">
                                                <span
                                                    class="avatar avatar-md avatar-square bg-primary-transparent p-1"><img
                                                        src="assets/images/ecommerce/png/1.png" class="w-100 h-100"
                                                        alt="..."></span>
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 d-flex align-items-center"><a
                                                            href="javascript:void(0);">Wooden Sofa</a></p>
                                                    <p class="fs-12 text-muted mb-0">Accusam Brand</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>Electronic</span>
                                        </td>
                                        <td>$1,299</td>
                                        <td>283</td>
                                        <td><span class="badge bg-primary-transparent">Published</span></td>
                                        <td>
                                            <div class="d-flex align-items-center fw-semibold">
                                                <span class="avatar avatar-sm p-1 bg-light me-2 avatar-rounded">
                                                    <img src="assets/images/faces/4.jpg" alt="">
                                                </span>
                                                <a href="javascript:void(0);">Mayor Kelly</a>
                                            </div>
                                        </td>
                                        <td>24,Nov 2023 - 04:42PM</td>
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
                                    <tr class="product-list">
                                        <td>
                                            <div class="d-flex">
                                                <span
                                                    class="avatar avatar-md avatar-square bg-primary-transparent p-1"><img
                                                        src="assets/images/ecommerce/png/1.png" class="w-100 h-100"
                                                        alt="..."></span>
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 d-flex align-items-center"><a
                                                            href="javascript:void(0);">Wooden Sofa</a></p>
                                                    <p class="fs-12 text-muted mb-0">Accusam Brand</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>Electronic</span>
                                        </td>
                                        <td>$1,299</td>
                                        <td>283</td>
                                        <td><span class="badge bg-primary-transparent">Published</span></td>
                                        <td>
                                            <div class="d-flex align-items-center fw-semibold">
                                                <span class="avatar avatar-sm p-1 bg-light me-2 avatar-rounded">
                                                    <img src="assets/images/faces/4.jpg" alt="">
                                                </span>
                                                <a href="javascript:void(0);">Mayor Kelly</a>
                                            </div>
                                        </td>
                                        <td>24,Nov 2023 - 04:42PM</td>
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
                                    <tr class="product-list">
                                        <td>
                                            <div class="d-flex">
                                                <span
                                                    class="avatar avatar-md avatar-square bg-primary-transparent p-1"><img
                                                        src="assets/images/ecommerce/png/1.png" class="w-100 h-100"
                                                        alt="..."></span>
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 d-flex align-items-center"><a
                                                            href="javascript:void(0);">Wooden Sofa</a></p>
                                                    <p class="fs-12 text-muted mb-0">Accusam Brand</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>Electronic</span>
                                        </td>
                                        <td>$1,299</td>
                                        <td>283</td>
                                        <td><span class="badge bg-primary-transparent">Published</span></td>
                                        <td>
                                            <div class="d-flex align-items-center fw-semibold">
                                                <span class="avatar avatar-sm p-1 bg-light me-2 avatar-rounded">
                                                    <img src="assets/images/faces/4.jpg" alt="">
                                                </span>
                                                <a href="javascript:void(0);">Mayor Kelly</a>
                                            </div>
                                        </td>
                                        <td>24,Nov 2023 - 04:42PM</td>
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
                                    <tr class="product-list">
                                        <td>
                                            <div class="d-flex">
                                                <span
                                                    class="avatar avatar-md avatar-square bg-primary-transparent p-1"><img
                                                        src="assets/images/ecommerce/png/1.png" class="w-100 h-100"
                                                        alt="..."></span>
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 d-flex align-items-center"><a
                                                            href="javascript:void(0);">Wooden Sofa</a></p>
                                                    <p class="fs-12 text-muted mb-0">Accusam Brand</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>Electronic</span>
                                        </td>
                                        <td>$1,299</td>
                                        <td>283</td>
                                        <td><span class="badge bg-primary-transparent">Published</span></td>
                                        <td>
                                            <div class="d-flex align-items-center fw-semibold">
                                                <span class="avatar avatar-sm p-1 bg-light me-2 avatar-rounded">
                                                    <img src="assets/images/faces/4.jpg" alt="">
                                                </span>
                                                <a href="javascript:void(0);">Mayor Kelly</a>
                                            </div>
                                        </td>
                                        <td>24,Nov 2023 - 04:42PM</td>
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
                                    <tr class="product-list">
                                        <td>
                                            <div class="d-flex">
                                                <span
                                                    class="avatar avatar-md avatar-square bg-primary-transparent p-1"><img
                                                        src="assets/images/ecommerce/png/1.png" class="w-100 h-100"
                                                        alt="..."></span>
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 d-flex align-items-center"><a
                                                            href="javascript:void(0);">Wooden Sofa</a></p>
                                                    <p class="fs-12 text-muted mb-0">Accusam Brand</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>Electronic</span>
                                        </td>
                                        <td>$1,299</td>
                                        <td>283</td>
                                        <td><span class="badge bg-primary-transparent">Published</span></td>
                                        <td>
                                            <div class="d-flex align-items-center fw-semibold">
                                                <span class="avatar avatar-sm p-1 bg-light me-2 avatar-rounded">
                                                    <img src="assets/images/faces/4.jpg" alt="">
                                                </span>
                                                <a href="javascript:void(0);">Mayor Kelly</a>
                                            </div>
                                        </td>
                                        <td>24,Nov 2023 - 04:42PM</td>
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
        <!--End::row-2 -->

    </div>
</div>
<!-- End::app-content -->

<?php

include 'footer.php';

?>