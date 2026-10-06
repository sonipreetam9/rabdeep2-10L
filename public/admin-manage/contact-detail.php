<?php

include 'header-top.php';

$id = $_GET['id'];
$user_query = mysqli_query($link, "SELECT * FROM contactus WHERE id = '$id'");
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Contact Detials</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="btn-list">
                <a href="contact-form-request.php" class="btn btn-primary-light btn-wave me-2">
                    <i class="ri-upload-cloud-line align-middle"></i> All Request
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
                                                <th scope="row" class="fw-semibold"> User Message </th>
                                                <td> <?= $user_data['message'] ?> </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold"> Status </th>
                                                <td>
                                                    <?= date('Y-m-d', strtotime($user_data['created_at'])); ?>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
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