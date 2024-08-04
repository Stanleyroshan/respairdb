<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin123') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header("Location: students_list.php");
        exit();
    } elseif ($username == 'admission' && $password == 'admission123') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admission';
        header("Location: students_list.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (isset($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
