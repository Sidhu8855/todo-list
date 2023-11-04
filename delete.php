<?php
include_once('./database.php');

if ($_GET['delete_id'] != '') {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM `task_tbl` WHERE task_id = '" . $delete_id . "'";
    $result = mysqli_query($conn, $sql);
}
header('location: index.php');
?>