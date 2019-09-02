<?php
//session_start();
include '../core/connect.php';

if ($_POST) {

    if ($_FILES["filUpload"]["name"] != '') { //ตรวจสอบไฟล์อัพโหลด
        move_uploaded_file($_FILES["filUpload"]["tmp_name"], "../uploads/" . $_FILES["filUpload"]["name"]);
    }

    $query = 'insert into content (
                      title,
                      detail,
                      imagesPath,
                      status,
                      startDate,
                      endDate
                    )
                    values (
                      "' . $_POST['title'] . '",
                      "' . $_POST['detail'] . '",
                      "' . $_FILES["filUpload"]["name"] . '",
                      "' . $_POST['status'] . '",
                      "' . $_POST['startDate'] . '",
                      "' . $_POST['endDate'] . '"
                    )';
    $data = mysqli_query($conn, $query);
    echo "<script> alert('Success'); </script>";
    echo "<script> window.location='read.php'; </script>";
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
                        <table class="table table-striped">

                            <tr>
                                <td>Title</td>
                                <td><input type="text" name="title" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Detail</td>
                                <td><textarea name="detail"></textarea></td>
                            </tr>
                            <tr>
                                <td>Upload</td>
                                <td><input type="file" name="filUpload" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <select name="status" class="form-control">
                                        <option value="1">เปิด</option>
                                        <option value="2">ปิด</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td><input type="text" name="startDate" id="startDate" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td><input type="text" name="endDate" id="endDate" class="form-control"/></td>
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
