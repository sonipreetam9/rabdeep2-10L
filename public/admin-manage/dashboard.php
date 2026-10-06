<?php

include 'header-top.php';

?>


<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between my-4 page-header-breadcrumb flex-wrap gap-2">
            <div>
                <p class="fw-semibold fs-20 mb-0">Welcome Back, Admin</p>
            </div>
        </div>

        <!-- Start:: row-1 -->
        <div class="row">
            <div class="col-xxl-12">
                <div class="row">
                 
    
                   <?php
                    $total_product = mysqli_query($link, "SELECT COUNT(*) as total FROM product");
                    $total_product_row = mysqli_fetch_assoc($total_product);
                    $total_product = $total_product_row['total'];
                    ?>
                   <div class="col-xl-3">
                        <div class="card custom-card main-card-item primary">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap">
                                    <div>
                                        <span class="d-block mb-3 fw-medium">Total Product</span>
                                        <h3 class="fw-semibold lh-1 mb-0"><?= $total_product ?></h3>
                                    </div>
                                    <div class="text-end">
                                        <div class="mb-4">
                                            <span class="avatar avatar-md bg-primary svg-white avatar-rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                                    <rect width="256" height="256" fill="none" />
                                                    <rect x="32" y="48" width="192" height="160" rx="8" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M168,88a40,40,0,0,1-80,0" fill="none" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="16" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php
                    $total_gallery = mysqli_query($link, "SELECT COUNT(*) as total FROM gallery");
                    $total_gallery_row = mysqli_fetch_assoc($total_gallery);
                    $total_gallery = $total_gallery_row['total'];
                    ?>
                    <div class="col-xl-3">
                        <div class="card custom-card main-card-item">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap">
                                    <div>
                                        <span class="d-block mb-3 fw-medium">Total Gallery Images</span>
                                        <h3 class="fw-semibold lh-1 mb-0"><?php echo $total_gallery; ?></h3>
                                    </div>
                                    <div class="text-end">
                                        <div class="mb-4">
                                            <span class="avatar avatar-md bg-success svg-white avatar-rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                                    <rect width="256" height="256" fill="none" />
                                                    <circle cx="84" cy="108" r="52" fill="none" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="16" />
                                                    <path d="M10.23,200a88,88,0,0,1,147.54,0" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M172,160a87.93,87.93,0,0,1,73.77,40" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M152.69,59.7A52,52,0,1,1,172,160" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php
                    $total_blog = mysqli_query($link, "SELECT COUNT(*) as total FROM blogs");
                    $total_blog_row = mysqli_fetch_assoc($total_blog);
                    $total_blog = $total_blog_row['total'];
                    ?>
                    <div class="col-xl-3">
                        <div class="card custom-card main-card-item">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap">
                                    <div>
                                        <span class="d-block mb-3 fw-medium">Total Blog</span>
                                        <h3 class="fw-semibold lh-1 mb-0"><?php echo $total_blog; ?></h3>
                                    </div>
                                    <div class="text-end">
                                        <div class="mb-4">
                                            <span class="avatar avatar-md bg-success svg-white avatar-rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                                    <rect width="256" height="256" fill="none" />
                                                    <circle cx="84" cy="108" r="52" fill="none" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="16" />
                                                    <path d="M10.23,200a88,88,0,0,1,147.54,0" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M172,160a87.93,87.93,0,0,1,73.77,40" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M152.69,59.7A52,52,0,1,1,172,160" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php
                    $total_accessories = mysqli_query($link, "SELECT COUNT(*) as total FROM accessories");
                    $total_accessories_row = mysqli_fetch_assoc($total_accessories);
                    $total_accessories = $total_accessories_row['total'];
                    ?>
                    <div class="col-xl-3">
                        <div class="card custom-card main-card-item">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap">
                                    <div>
                                        <span class="d-block mb-3 fw-medium">Total accessories</span>
                                        <h3 class="fw-semibold lh-1 mb-0"><?php echo $total_accessories; ?></h3>
                                    </div>
                                    <div class="text-end">
                                        <div class="mb-4">
                                            <span class="avatar avatar-md bg-success svg-white avatar-rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                                    <rect width="256" height="256" fill="none" />
                                                    <circle cx="84" cy="108" r="52" fill="none" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="16" />
                                                    <path d="M10.23,200a88,88,0,0,1,147.54,0" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M172,160a87.93,87.93,0,0,1,73.77,40" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M152.69,59.7A52,52,0,1,1,172,160" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php
                    $total_portfolio = mysqli_query($link, "SELECT COUNT(*) as total FROM portfolio");
                    $total_portfolio_row = mysqli_fetch_assoc($total_portfolio);
                    $total_portfolio = $total_portfolio_row['total'];
                    ?>
                    <div class="col-xl-3">
                        <div class="card custom-card main-card-item">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap">
                                    <div>
                                        <span class="d-block mb-3 fw-medium">Total portfolio</span>
                                        <h3 class="fw-semibold lh-1 mb-0"><?php echo $total_portfolio; ?></h3>
                                    </div>
                                    <div class="text-end">
                                        <div class="mb-4">
                                            <span class="avatar avatar-md bg-success svg-white avatar-rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                                    <rect width="256" height="256" fill="none" />
                                                    <circle cx="84" cy="108" r="52" fill="none" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="16" />
                                                    <path d="M10.23,200a88,88,0,0,1,147.54,0" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M172,160a87.93,87.93,0,0,1,73.77,40" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M152.69,59.7A52,52,0,1,1,172,160" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php
                    $total_contact = mysqli_query($link, "SELECT COUNT(*) as total FROM contactus");
                    $total_contact_row = mysqli_fetch_assoc($total_contact);
                    $total_contact = $total_contact_row['total'];
                    ?>
                    <div class="col-xl-3">
                        <div class="card custom-card main-card-item">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap">
                                    <div>
                                        <span class="d-block mb-3 fw-medium">Total Contact Request</span>
                                        <h3 class="fw-semibold lh-1 mb-0"><?php echo $total_contact; ?></h3>
                                    </div>
                                    <div class="text-end">
                                        <div class="mb-4">
                                            <span class="avatar avatar-md bg-success svg-white avatar-rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                                    <rect width="256" height="256" fill="none" />
                                                    <circle cx="84" cy="108" r="52" fill="none" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="16" />
                                                    <path d="M10.23,200a88,88,0,0,1,147.54,0" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M172,160a87.93,87.93,0,0,1,73.77,40" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                    <path d="M152.69,59.7A52,52,0,1,1,172,160" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="16" />
                                                </svg>
                                            </span>
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->

<?php

include 'footer.php';
?>