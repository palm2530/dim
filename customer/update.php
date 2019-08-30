<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
      $server = '127.0.0.1';
      $user = 'root';
      $pass = 'root';
      $dbName = 'dim';
      $conn = mysqli_connect($server, $user, $pass, $dbName);
      mysqli_set_charset($conn,'utf8');

      if ($_POST) {
        $query = 'update customer set
                    CustomerID = "'.$_POST['id'].'" ,
                    Name = "'.$_POST['Name'].'" ,
                    Email = "'.$_POST['Email'].'"
                  where
                    CustomerID = "'.$_POST['id'].'"
                     ';
        $data = mysqli_query($conn, $query);
        echo "<script> alert('Success'); </script>";
        echo "<script> window.location='read.php'; </script>";
      }else {
        $query = 'select * from customer where CustomerID="'.$_GET['id'].'"';
        $data = mysqli_query($conn, $query);
        $ROW = mysqli_fetch_array($data);
      }

     ?>

    <form action="?" method="post">
      <table border="1">
        <tr>
          <td>ID</td>
          <td><input type="text" name="id" value="<?php echo $ROW['CustomerID'] ?>" /></td>
        </tr>
        <tr>
          <td>Name</td>
          <td><input type="text" name="Name" value="<?php echo $ROW['Name'] ?>" /></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" name="Email" value="<?php echo $ROW['Email'] ?>" /></td>
        </tr>
      </table>
      <input type="submit" value="Submit" />
    </form>

  </body>
</html>
