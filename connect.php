<?php
  $server = '127.0.0.1';
  $user = 'root';
  $pass = 'root';
  $dbName = 'dim';
  $conn = mysqli_connect($server, $user, $pass, $dbName);

  $query = 'select * from customer';
  $data = mysqli_query($conn, $query);
?>

<table border="1">
  <tr>
    <td>ชื่อ</td>
    <td>Email</td>
  </tr>
  <?php while($ROW = mysqli_fetch_array($data)) : ?>
    <tr>
      <td><?php echo $ROW['Name']?></td>
      <td><?php echo $ROW['Email']?></td>
    </tr>
  <?php endwhile; ?>
</table>
