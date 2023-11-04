<?php include_once('./navbar.php'); ?>
<?php include_once('./database.php'); ?>

<div class="container mt-3">

    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['task_name'])) {
            $task_name = trim($_POST['task_name']);
            $sql = "INSERT INTO `task_tbl`(`task_name`) VALUES ('" . $task_name . "')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<div class="alert alert-success text-center mt-3" role="alert">SuccessFully Data Saved !</div>';
            } else {
                echo '<div class="alert alert-danger text-center mt-3" role="alert">Something Went Wrong !</div>';
            }
        } else {
            echo '<div class="alert alert-danger text-center mt-3" role="alert">Task Field Required !</div>';
        }
    }
    ?>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="" autocomplete="off" method="post">
                <div class="form-group">
                    <label for="">My Task</label>
                    <input type="text" class="form-control" name="task_name" placeholder="Enter Task Name">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8 offset-md-2">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT * FROM `task_tbl`';
                    $result = mysqli_query($conn, $sql);
                    $index = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th scope="row">
                                <?php echo $index ?>
                            </th>
                            <td>
                                <?php echo $row['task_name'] ?>
                            </td>
                            <td>
                                <a href="<?php echo 'edit.php?edit_id=' . $row['task_id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo 'delete.php?delete_id=' . $row['task_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                        $index++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once('./footer.php'); ?>