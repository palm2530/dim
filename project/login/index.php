<?php
session_start();
include '../core/connect.php';

if ($_POST) {
    $sql = "select * from users where username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "' ";
    $query = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($query);
    if ($num == 1) {
        echo "<script> window.location='../dashboard/index.php'; </script>";
    } else {
        echo '<script>alert("Username หรือ Password ไม่ถูกต้อง");</script>';
        echo '<script>history.back();</script>';
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>Signin Template for Bootstrap</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    </head>

    <body class="text-center">
        <form id="myform" name="myform" action="?" method="post" class="form-signin">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" name="username" id="username" class="form-control" autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>

        <script>
            $(function () {
                $('#myform').submit(function () {
                    if ($('#username').val() == '') {
                        alert('กรุณากรอก Username');
                    } else if ($('#password').val() == '') {
                        alert('กรุณากรอก Password');
                    } else {
                        return true;
                    }
                    return false;
                });
            });
        </script>

    </body>
</html>
