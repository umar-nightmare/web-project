<?php
session_start();
include "db/config.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $q = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$pass'");
    if(mysqli_num_rows($q) > 0){
        $row = mysqli_fetch_assoc($q);
        $_SESSION['user'] = $row['role'];

        if($row['role']=="admin")
            header("Location: admin/dashboard.php");
        else
            header("Location: user/dashboard.php");
    } else {
        $error = "Invalid Login!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<h2>Login</h2>

<?php if(isset($error)) echo "<div class='error-message'>$error</div>"; ?>

<form method="post">
<div class="input-group">
<input type="email" name="email" placeholder="Email" required>
</div>
<div class="input-group">
<input type="password" name="password" placeholder="Password" required>
</div>
<button name="login">Login</button>
</form>

<div class="links">
<a href="register.php">Create Account</a>
</div>
</div>
</body>
</html>
