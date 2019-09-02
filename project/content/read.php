<?php
//session_start();
include '../core/connect.php';

$query = 'select * from content';
$data = mysqli_query($conn, $query);
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
                    <a href="create.php" class="btn btn-primary btn-sm">Addnew</a>
                    <div class="table-responsive" style="margin-top: 10px;">
                        <table class="table table-striped">
                            <tr>
                                <td>#</td>
                                <td>Title</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <?php $i = 1; ?>
                            <?php while ($ROW = mysqli_fetch_array($data)) : ?>
                                <tr>
                                    <td><?php echo $i++ ?>.</td>
                                    <td><?php echo $ROW['title'] ?></td>
                                    <td><?php echo $ROW['status'] == 1 ? 'เปิด' : 'ปิด' ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="update.php?id=<?php echo $ROW['id'] ?>">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $ROW['id'] ?>" onclick="return confirm('คุณต้องการลบข้อมูลนี้ ใช่หรือไม่?')">Delete</a></td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </main>
            </div>
        </div>

        <?php include '../template/script.php'; ?>

    </body>
</html>
