<?php
include "db/config.php";

if(isset($_POST['register'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        // Email already exists
        $error = "⚠ This email is already in use. Please use a different email.";
    } else {
        // Insert new user
        mysqli_query($conn, "INSERT INTO users(name,email,password,role) 
                             VALUES('$name','$email','$password','user')");
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Register</h2>

    <!-- Show error if email already exists -->
    <?php if(isset($error)) echo "<div class='error-message'>$error</div>"; ?>

    <form method="post">
        <div class="input-group">
            <input type="text" name="name" placeholder="Full Name" required>
        </div>
        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button name="register">Register</button>
    </form>

    <div class="links">
        <a href="login.php">Already have an account? Login</a>
    </div>
</div>
</body>
</html>
