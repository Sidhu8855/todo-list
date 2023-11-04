<?php
include_once('./navbar.php');
include_once('./database.php');

if (isset($_POST['submit'])) {
    if (!empty($_POST['task_name'])) {
        $task_name = trim($_POST['task_name']);
        $sql = "UPDATE `task_tbl` SET `task_name`='" . $task_name . "' WHERE `task_id`='" . $_GET['edit_id'] . "'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location: index.php');
        } else {
            echo '<div class="alert alert-danger text-center mt-3" role="alert">Something Went Wrong !</div>';
        }
    } else {
        echo '<div class="alert alert-danger text-center mt-3" role="alert">Task Field Required !</div>';
    }
}

if ($_GET['edit_id'] != '') {
    $edit_id = $_GET['edit_id'];
    $sql = "SELECT * FROM `task_tbl` WHERE task_id = '" . $edit_id . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    ?>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="" autocomplete="off" method="post">
                <div class="form-group">
                    <label for="">My Task</label>
                    <input type="text" class="form-control" name="task_name" value="<?php echo $row['task_name'] ?>"
                        placeholder="Enter Task Name">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <?php
} else {
    header('location: index.php');
} ?>