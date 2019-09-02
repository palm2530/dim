<?php include '../core/connect.php'; ?>
<?php
$query = 'select * from slide where status="1"';
$data = mysqli_query($conn, $query);
$i = 1;
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

        <?php while ($ROW = mysqli_fetch_array($data)) : ?>
            <div class="carousel-item <?php echo $i == 1 ? 'active' : '' ?>">
                <img class="first-slide" src="<?php echo '../uploads/' . $ROW['imagesPath'] ?>" alt="">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1><?php echo $ROW['title'] ?></h1>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
        <?php endwhile; ?>

    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>