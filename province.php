<?php
  $server = '127.0.0.1';
  $user = 'root';
  $pass = 'root';
  $dbName = 'dim';
  $conn = mysqli_connect($server, $user, $pass, $dbName);
  mysqli_set_charset($conn,'utf8');

  $query = 'select * from geography';
  $data = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <table border="1">
      <tr>
        <td>PROVINCE_NAME</td>
      </tr>
      <?php while($ROW = mysqli_fetch_array($data)) : ?>
        <tr>
          <td><?php echo $ROW['GEO_NAME']?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </body>
</html>
