<?php
$conn = mysqli_connect("localhost", "root", "", "todo-list");
if (!$conn) {
    echo "MySQL getting Problem in => " . mysqli_connect_error();
    die();
}
?>