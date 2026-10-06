<?php

include 'header-top.php';

$user_id = $_GET['user_id'];
$user_query = mysqli_query($link, "SELECT * FROM register_user WHERE user_id = '$user_id'");
$user_data = mysqli_fetch_array($user_query);

?>

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">User Details</h1>
                <div class="">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="btn-list">
                <a href="all-product.php" class="btn btn-primary-light btn-wave me-2">
                    <i class="ri-upload-cloud-line align-middle"></i> All User
                </a>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start:: row-1 -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12 mt-3">
                <div class="card custom-card">
                    <div class="card-header p-0">
                        <ul class="nav nav-tabs tab-style-8 scaleX mb-0 d-flex" id="myTab1" role="tablist">
                            <li class="nav-item me-0" role="presentation">
                                <button class="nav-link px-4 py-3 active" id="allorders" data-bs-toggle="tab"
                                    data-bs-target="#allorders-pane" type="button" role="tab"
                                    aria-controls="allorders-pane" aria-selected="true">User details</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0" id="myTabContent">
                            <div class="tab-pane p-0 border-0 active show" id="allorders-pane" role="tabpanel"
                                aria-labelledby="allorders" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table text-nowrap table-bordered">
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="fw-semibold"> User Name </th>
                                                <td><?= $user_data['name'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold"> User Phone </th>
                                                <td> <?= $user_data['phone'] ?> </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold"> User Email </th>
                                                <td> <?= $user_data['email'] ?> </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold">User Status</th>
                                                <td>
                                                    <?php if ($user_data['user_status'] == 1) { ?>
                                                        <span class="badge bg-success">Active</span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-danger">Blocked</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0" id="myTabContent">
                            <div class="tab-pane p-0 border-0 active show" id="allorders-pane" role="tabpanel"
                                aria-labelledby="allorders" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User Name</th>
                                                <th>User Address Type</th>
                                                <th>User Phone</th>
                                                <th>User Address</th>
                                                <th>User Country</th>
                                                <th>User City</th>
                                                <th>State</th>
                                                <th>Pincode</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $address_query = mysqli_query($link, "
                                                SELECT a.*, 
                                                    c.city, 
                                                    s.name 
                                                FROM address a
                                                LEFT JOIN city c ON a.user_city_id = c.city_id
                                                LEFT JOIN state s ON a.user_state_id = s.state_id
                                                WHERE a.user_id = '$user_id'
                                            ");

                                            $i = 1;

                                            while ($address_data = mysqli_fetch_assoc($address_query)) { ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>

                                                    <td>
                                                        <?= $address_data['user_name'] ?>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge bg-primary"><?= $address_data['user_address_type'] ?>
                                                        </span>
                                                    </td>

                                                    <td><?= $address_data['user_phone'] ?></td>
                                                    <td><?= $address_data['user_address'] ?></td>
                                                    <td><?= $address_data['user_country'] ?></td>
                                                    <td><?= $address_data['city'] ?></td>
                                                    <td><?= $address_data['name'] ?></td>
                                                    <td><?= $address_data['user_pincode'] ?></td>
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
        <!-- End:: row-1 -->

    </div>
</div>
<!-- End::app-content -->

<!-- END MAIN-CONTENT -->

<!-- FOOTER -->
<?php

include 'footer.php';

?>