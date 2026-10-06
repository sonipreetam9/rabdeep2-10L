<?php
session_start();
unset($_SESSION['superid']);
header("Location: index.php");
exit;
