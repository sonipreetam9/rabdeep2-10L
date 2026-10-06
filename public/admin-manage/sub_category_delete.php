<?php
include 'config.php';

if (!empty($_POST['sub_cat_id'])) {
    $id = $_POST['sub_cat_id'];
    $sql = "DELETE FROM sub_categories WHERE sub_cat_id = $id";

    if (mysqli_query($link, $sql)) {
        $message = "Sub Category deleted successfully!";
    } else {
        $message = "Failed to delete sub category.";
    }

    header("Location: sub-category.php?message=" . urlencode($message));
    exit;
} else {
    header("Location: sub-category.php?message=" . urlencode('No sub category selected.'));
    exit;
}
?>