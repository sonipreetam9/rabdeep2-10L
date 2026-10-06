<?php

include 'header-top.php';

?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between">
            <h1 class="page-title fw-medium fs-18 mb-0">Today Orders</h1>
        </div>
        <!-- Page Header End -->

        <div class="row">

            <div class="col-xl-12">
                <?php

                if (isset($_POST['OrderUpdate'])) {

                    $order_id = $_POST['order_id'];
                    $payment_status = $_POST['payment_status'];
                    $order_status = $_POST['order_status'];

                    $updateQuery = "
                    UPDATE orders 
                    SET 
                        payment_status = '$payment_status',
                        order_status = '$order_status'
                    WHERE order_id = '$order_id'
                ";

                    if (mysqli_query($link, $updateQuery)) {
                        echo '<div class="alert alert-success fade-in text-start w-100 mt-3">Order Status Update Successfully.</div>';
                    } else {
                        echo '<div class="alert alert-danger fade-in text-start w-100 mt-3">Something Went Wrong. Please try again.</div>';
                    }
                }

                ?>
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table display" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Order No</th>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Total Amount</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = "
                                        SELECT 
                                            o.*, 
                                            a.user_name, 
                                            a.user_phone
                                        FROM orders o
                                        INNER JOIN address a ON o.address_id = a.address_id
                                        WHERE DATE(o.created_at) = CURDATE()
                                        ORDER BY o.order_id DESC
                                    ";

                                    $result = mysqli_query($link, $query);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row['order_number'] ?></td>
                                            <td><?= $row['user_name'] ?></td>
                                            <td><?= $row['user_phone'] ?></td>
                                            <td>₹<?= number_format($row['total_amount'], 2) ?></td>

                                            <td>
                                                <?php
                                                if ($row['payment_status'] == 'Accept') {
                                                    echo '<span class="badge bg-success">Accept</span>';
                                                } else {
                                                    echo '<span class="badge bg-warning">Pending</span>';
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                if ($row['order_status'] == 'Accept') {
                                                    echo '<span class="badge bg-success">Accept</span>';
                                                } elseif ($row['order_status'] == 'Cancelled') {
                                                    echo '<span class="badge bg-danger">Cancelled</span>';
                                                } else {
                                                    echo '<span class="badge bg-info">Processing</span>';
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <!-- Update Button -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#formmodal<?= $row['order_id'] ?>">
                                                    Update
                                                </button>

                                                <a href="view-order.php?order_id=<?= $row['order_id'] ?>"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="ri-eye-line"></i>
                                                </a>

                                                <!-- Update Order Status Modal -->
                                                <div class="modal fade" id="formmodal<?= $row['order_id'] ?>" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Update Order Status</h6>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <form action="" method="post">
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="order_id"
                                                                        value="<?= $row['order_id'] ?>">
                                                                    <!-- Payment Status -->
                                                                    <div class="mb-3">
                                                                        <label class="col-form-label">Payment Status</label>
                                                                        <select name="payment_status" class="form-select">
                                                                            <option value="Accept"
                                                                                <?= $row['payment_status'] == 'Accept' ? 'selected' : '' ?>>Accept Payment</option>
                                                                            <option value="Pending"
                                                                                <?= $row['payment_status'] == 'Pending' ? 'selected' : '' ?>>Pending Payment </option>
                                                                        </select>
                                                                    </div>

                                                                    <!-- Order Status -->
                                                                    <div class="mb-3">
                                                                        <label class="col-form-label">Order Status</label>
                                                                        <select name="order_status" class="form-select">
                                                                            <option value="Processing"
                                                                                <?= $row['order_status'] == 'Processing' ? 'selected' : '' ?>>
                                                                                Processing</option>
                                                                            <option value="Accept"
                                                                                <?= $row['order_status'] == 'Accept' ? 'selected' : '' ?>>
                                                                                Accept</option>
                                                                            <option value="Cancelled"
                                                                                <?= $row['order_status'] == 'Cancelled' ? 'selected' : '' ?>>
                                                                                Cancelled</option>
                                                                        </select>
                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="OrderUpdate"
                                                                        class="btn btn-primary">Update</button>
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

<?php include 'footer.php'; ?>