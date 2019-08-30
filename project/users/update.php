<?php
//session_start();
include '../core/connect.php';

if ($_POST) {
    $query = 'update users set
                    username = "' . $_POST['username'] . '" ,
                    password = "' . $_POST['password'] . '"
                  where
                    id = "' . $_POST['id'] . '"
                     ';
    $data = mysqli_query($conn, $query);
    echo "<script> alert('Success'); </script>";
    echo "<script> window.location='read.php'; </script>";
} else {
    $query = 'select * from users where id="' . $_GET['id'] . '"';
    $data = mysqli_query($conn, $query);
    $ROW = mysqli_fetch_array($data);
}
?>

<!doctype html>
<html lang="en">
    <?php include '../template/head.php'; ?>

    <body>
        <?php include '../template/nav.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <?php include '../template/menu.php'; ?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <h2>Users</h2>
                    <form action="?" method="post">
                        <input type="hidden" name="id" value="<?php echo $ROW['id'] ?>">
                        <table class="table table-striped">
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username" class="form-control" value="<?php echo $ROW['username'] ?>"/></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="text" name="password" class="form-control" value="<?php echo $ROW['password'] ?>"/></td>
                            </tr>
                        </table>
                        <input type="submit" class="btn btn-primary btn-sm" value="Update" />
                        <a class="btn btn-danger btn-sm" href="read.php">Cancel</a>
                    </form>
                </main>
            </div>
        </div>

        <?php include '../template/script.php'; ?>

    </body>
</html>
