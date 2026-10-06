<?php
include 'header-top.php';

$order_id = $_GET['order_id'];

$order_query = mysqli_query(
    $link,
    "SELECT o.*, u.*
     FROM orders o
     LEFT JOIN register_user u ON u.user_id = o.user_id
     WHERE o.order_id = '$order_id'"
);


$order = mysqli_fetch_assoc($order_query);

$user_id = $order['user_id'];
$address_query = mysqli_query(
    $link,
    "SELECT a.*, c.city, s.name AS state_name
     FROM address a
     LEFT JOIN city c ON c.city_id = a.user_city_id
     LEFT JOIN state s ON s.state_id = a.user_state_id
     WHERE a.address_id = '{$order['address_id']}'"
);

$address = mysqli_fetch_assoc($address_query);

?>


<div class="main-content app-content">
    <div class="container-fluid">

        <!-- PAGE HEADER -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between">
            <h1 class="page-title fw-medium fs-18">User Details</h1>
            <a href="all-user.php" class="btn btn-primary-light">All Users</a>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card custom-card">

                    <!-- USER BASIC DETAILS -->
                    <div class="card-body">
                        <h5>User Information</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td><?= $order['name'] ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?= $order['phone'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $order['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php
                                    if ($order['user_status'] == 1) {
                                        echo '<span class="badge bg-success">Active</span>';
                                    } else {
                                        echo '<span class="badge bg-danger">Blocked</span>';
                                    }
                                    ?>
                                </td>
                            </tr>

                        </table>
                    </div>

                    <!-- USER ADDRESSES -->
                    <div class="card-body">
                        <h5>Shipping Address</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td><?= $address['user_name'] ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?= $address['user_phone'] ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?= $address['user_address'] ?></td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td><?= $address['city'] ?></td>
                            </tr>
                            <tr>
                                <th>State</th>
                                <td><?= $address['state_name'] ?></td>
                            </tr>
                            <tr>
                                <th>Pincode</th>
                                <td><?= $address['user_pincode'] ?></td>
                            </tr>
                        </table>
                    </div>


                    <!-- USER ORDERS -->
                    <div class="card-body">
                        <h5>Order Details</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Order No</th>
                                <td><?= $order['order_number'] ?></td>
                            </tr>
                            <tr>
                                <th>Total Amount with Delivery charge</th>
                                <td>₹<?= $order['total_amount'] ?>+<?= $order['delivery_charge'] ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php
                                    if ($order['order_status'] == 'Completed') {
                                        echo '<span class="badge bg-success">Completed</span>';
                                    } elseif ($order['order_status'] == 'Cancelled') {
                                        echo '<span class="badge bg-danger">Cancelled</span>';
                                    } else {
                                        echo '<span class="badge bg-warning">Pending</span>';
                                    }
                                    ?>
                                </td>

                            </tr>
                            <tr>
                                <th>Date</th>
                                <td><?= date("d M Y", strtotime($order['created_at'])) ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="card-body">
                        <h5>Order Items</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $items = mysqli_query($link,
                                    "SELECT oi.price, oi.quantity, p.product_name
                                    FROM order_items oi
                                    LEFT JOIN product p ON p.product_id = oi.product_id
                                    WHERE oi.order_id = '$order_id'"
                                );

                                $i = 1;
                                while ($item = mysqli_fetch_assoc($items)) {
                                    $total = $item['price'] * $item['quantity'];
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $item['product_name'] ?></td>
                                        <td>₹<?= $item['price'] ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td>₹<?= $total ?></td>
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

<?php include 'footer.php'; ?>