<?php


$link = mysqli_connect("localhost","root","admin","rabdeep_motors");
mysqli_set_charset($link, "utf8");

if(mysqli_connect_error()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

?>
