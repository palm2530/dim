<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
      if ($_POST) {
        $server = '127.0.0.1';
        $user = 'root';
        $pass = 'root';
        $dbName = 'dim';
        $conn = mysqli_connect($server, $user, $pass, $dbName);
        mysqli_set_charset($conn,'utf8');

        $query = 'insert into customer (
                      CustomerID,
                      Name,
                      Email
                    )
                    values (
                      "'.$_POST['id'].'",
                      "'.$_POST['Name'].'",
                      "'.$_POST['Email'].'"
                    )';
        $data = mysqli_query($conn, $query);
        echo "<script> alert('Success'); </script>";
        echo "<script> window.location='read.php'; </script>";
      }

     ?>

    <form action="?" method="post">
      <table border="1">
        <tr>
          <td>ID</td>
          <td><input type="text" name="id" /></td>
        </tr>
        <tr>
          <td>Name</td>
          <td><input type="text" name="Name" /></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>
            <select>
              <option value="รถกระบะ"> รถกระบะ </option>
              <option value="รถเก๋ง"> รถเก๋ง </option>
            </select>
          </td>
        </tr>
      </table>
      <input type="submit" value="Submit" />
    </form>

  </body>
</html>
