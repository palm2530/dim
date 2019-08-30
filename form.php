<?php
        if ($_POST) {
            if ($_POST['username'] == '') {
                echo 'Username is required';
                echo '<p><a href="form.php">กลับ</a></p>';
            } elseif ($_POST['password'] == '') {
                echo 'Password is required';
                echo '<p><a href="form.php">กลับ</a></p>';
            } else {
                echo 'ชื่อผู้ใช้งาน คือ ' . $_POST['username'];
                echo '<br>';
                echo 'รหัสผ่าน คือ ' . $_POST['password'];
            }
        }
?>

<form action="?" method="post"> 
    Username: <input type="text" name="username" /> 
    Password: <input type="password" name="password" /> 
    <input type="submit" /> 
</form>
