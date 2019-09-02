<?php
//session_start();
include '../core/connect.php';

if ($_POST) {
    if ($_FILES["filUpload"]["name"] != '') { //ตรวจสอบไฟล์อัพโหลด
        move_uploaded_file($_FILES["filUpload"]["tmp_name"], "../uploads/" . $_FILES["filUpload"]["name"]);
        $query = 'update content set
                    imagesPath = "' . $_FILES["filUpload"]["name"] . '"
                  where
                    id = "' . $_POST['id'] . '"
                     ';
        $data = mysqli_query($conn, $query);
    }

    $query = 'update content set
                    title = "' . $_POST['title'] . '" ,
                    detail = "' . $_POST['detail'] . '",
                    status = "' . $_POST['status'] . '",
                    startDate = "' . $_POST['startDate'] . '",
                    endDate = "' . $_POST['endDate'] . '"
                  where
                    id = "' . $_POST['id'] . '"
                     ';
    $data = mysqli_query($conn, $query);
    echo "<script> alert('Success'); </script>";
    echo "<script> window.location='read.php'; </script>";
} else {
    $query = 'select * from content where id="' . $_GET['id'] . '"';
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
                    <h2>Content</h2>
                    <form action="?" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $ROW['id'] ?>">
                        <table class="table table-striped">
                            <tr>
                                <td>Title</td>
                                <td><input type="text" name="title" value="<?php echo $ROW['title'] ?>" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Detail</td>
                                <td><textarea name="detail"><?php echo $ROW['detail'] ?></textarea></td>
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
                                        <option value="1" <?php echo $ROW['status'] == 1 ? 'checked' : '' ?>>เปิด</option>
                                        <option value="2" <?php echo $ROW['status'] == 2 ? 'checked' : '' ?>>ปิด</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td><input type="text" name="startDate" id="startDate" class="form-control" value="<?php echo $ROW['startDate'] ?>"/></td>
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td><input type="text" name="endDate" id="endDate" class="form-control" value="<?php echo $ROW['endDate'] ?>"/></td>
                            </tr>
                        </table>
                        <input type="submit" class="btn btn-primary btn-sm" value="Submit" />
                        <a class="btn btn-danger btn-sm" href="read.php">Cancel</a>
                    </form>
                </main>
            </div>
        </div>

        <?php include '../template/script.php'; ?>

        <script>
            CKEDITOR.replace('detail');

            $(function () {
                $("#startDate").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
                $("#endDate").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        </script>

    </body>
</html>
