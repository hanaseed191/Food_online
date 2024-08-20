<?php
    $conn = mysqli_connect("localhost","root","root","food_online") or die("Error: " . mysqli_error($con));
    mysqli_query($conn, "SET NAMES 'utf8' "); 
?>