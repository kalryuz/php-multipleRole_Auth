<?php
require_once './config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists
    $checkUserQuery = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $checkUserQuery);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        if ($user['role'] === 'Admin') {
            header("Location: admin.php");
        } else {
            header("Location: user.php");
        }
        exit();
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container col-8 mt-5">
        <div class="card">
            <div class="card-header"><h5>Multiple Role Login</h5></div>
            <form action="" method="post" class="card-body">
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="name" placeholder="Enter your email">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="name" placeholder="Enter your password">
                </div>
                <button name="login" class="btn btn-primary btn-lg w-100">Login</button>
                <p class="text-center mt-4" ><a href="./index.php">register here</a></p>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>