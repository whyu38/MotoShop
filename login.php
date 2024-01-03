<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Call css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php
if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // include file connect.php
    include_once("koneksi.php");

    // Check if the username exists in the database
    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username'");
    $count = mysqli_num_rows($result);

    if($count == 1) {
        // username exists, verify the password
        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];

        if(password_verify($password, $hash)) {
            // password is correct, start a session and redirect to index.php
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            // password is incorrect, show an error message
            echo "<div class='alert alert-danger' role='alert'>Wrong password.</div>";
        }
    } else {
        // username doesn't exist, show an error message
        echo "<div class='alert alert-danger' role='alert'>Username not found.</div>";
    }
}
?>
    <br>
    <br>
    <div class="container mt-5">
<div class="card mx-auto" style="max-width: 600px;">
<div class="card-header">
            <h2 class="mb-0">Login</h2>
            <br>
        <div class="row">
            <div class="col-md-12">
            <form action="login.php" method="post">
            <div class="mb-3">
                <labe class="form-label">Username</labe>
                <input type="text" name="username" class="form-control" placeholder="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="password" required>
            </div>

            <br>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <a href="register.php" class="btn btn-secondary">Register</a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>