<?php include '../core/connect.php'; ?>
<?php
$query = 'select * from content where status="1" limit 3 ';
$data = mysqli_query($conn, $query);
$i = 1;
?>
<div class="row">
    <?php while ($ROW = mysqli_fetch_array($data)) : ?>
        <div class="col-lg-4">
            <img class="rounded-circle" src="<?php echo '../uploads/' . $ROW['imagesPath'] ?>" alt="" width="140" height="140">
            <h2><?php echo $ROW['title'] ?></h2>
            <p><?php echo $ROW['title'] ?></p>
            <p><a class="btn btn-secondary" href="detail.php?id=<?php echo $ROW['id'] ?>" role="button">View details &raquo;</a></p>
        </div>
    <?php endwhile; ?>
</div>