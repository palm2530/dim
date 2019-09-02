<?php
//session_start();
include '../core/connect.php';

if ($_POST) {
    if ($_FILES["filUpload"]["name"] != '') { //ตรวจสอบไฟล์อัพโหลด
        move_uploaded_file($_FILES["filUpload"]["tmp_name"], "../uploads/" . $_FILES["filUpload"]["name"]);
        $query = 'update slide set
                    imagesPath = "' . $_FILES["filUpload"]["name"] . '"
                  where
                    id = "' . $_POST['id'] . '"
                     ';
        $data = mysqli_query($conn, $query);
    }

    $query = 'update slide set
                    title = "' . $_POST['title'] . '" ,
                    status = "' . $_POST['status'] . '"
                  where
                    id = "' . $_POST['id'] . '"
                     ';
    $data = mysqli_query($conn, $query);
    echo "<script> alert('Success'); </script>";
    echo "<script> window.location='read.php'; </script>";
} else {
    $query = 'select * from slide where id="' . $_GET['id'] . '"';
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
                    <h2>Slide</h2>
                    <form action="?" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $ROW['id'] ?>">
                        <table class="table table-striped">
                            <tr>
                                <td>Title</td>
                                <td><input type="text" name="title" value="<?php echo $ROW['title'] ?>" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Upload</td>
                                <td>
                                    <p><a href="<?php echo '../uploads/' . $ROW['imagesPath'] ?>" target="_blank"><?php echo $ROW['imagesPath'] ?></a></p>
                                    <input type="file" name="filUpload" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <select name="status" class="form-control">
                                        <option value="1" <?php echo $ROW['status'] == 1 ? 'selected' : '' ?>>เปิด</option>
                                        <option value="2" <?php echo $ROW['status'] == 2 ? 'selected' : '' ?>>ปิด</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" class="btn btn-primary btn-sm" value="Submit" />
                        <a class="btn btn-danger btn-sm" href="read.php">Cancel</a>
                    </form>
                </main>
            </div>
        </div>

        <?php include '../template/script.php'; ?>

    </body>
</html>
