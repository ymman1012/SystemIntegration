<?php
include("../dbcon.php");

$did3 = $_GET['did3'];
mysqli_query($con, "DELETE FROM deworming WHERE deworming_id = '$did3'");
?>

<script type="text/javascript">
    window.location="../deworming3/deworming10-19.php";
</script> 

