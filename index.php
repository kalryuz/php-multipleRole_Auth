<?php
require_once './config.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists!');</script>";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        if (mysqli_query($con, $insertQuery)) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
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
            <div class="card-header"><h5>Multiple Role Registeration</h5></div>
            <form action="" method="post" class="card-body">
                <div class="form-group mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="name" placeholder="Enter your email">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="name" placeholder="Enter your password">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select">
                        <option selected disabled>Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <button name="register" class="btn btn-primary btn-lg w-100">Register</button>
                <p class="text-center mt-4" ><a href="./login.php">Login here</a></p>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>