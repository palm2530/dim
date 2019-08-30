<?php
  $server = '127.0.0.1';
  $user = 'root';
  $pass = 'root';
  $dbName = 'dim';
  $conn = mysqli_connect($server, $user, $pass, $dbName);
  mysqli_set_charset($conn,'utf8');

  $query = 'select * from customer';
  $data = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>

    <a href="create.php">Addnew</a>

    <table border="1">
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Action</td>
      </tr>
      <?php while($ROW = mysqli_fetch_array($data)) : ?>
        <tr>
          <td><?php echo $ROW['CustomerID']?></td>
          <td><?php echo $ROW['Name']?></td>
          <td><?php echo $ROW['Email']?></td>
          <td>
            <a href="update.php?id=<?php echo $ROW['CustomerID'] ?>">Edit</a>
            /
            <a href="delete.php?id=<?php echo $ROW['CustomerID'] ?>"
                  onclick="return confirm('คุณต้องการลบข้อมูลนี้ ใช่หรือไม่?')">Delete</a></td>
        </tr>
      <?php endwhile; ?>
    </table>

  </body>
</html>
