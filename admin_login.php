<?php
session_start();
$loginError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy credentials (you can connect to DB later)
    if ($username === "admin" && $password === "admin123") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_panel.php");
        exit();
    } else {
        $loginError = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body { font-family: Arial; background: #f6f7f9; }
        .login-box {
            width: 300px; margin: 100px auto; padding: 30px;
            background: white; border-radius: 8px; box-shadow: 0 0 10px #ccc;
        }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 10px; margin: 10px 0;
        }
        .btn { width: 100%; padding: 10px; background: #0984e3; color: white; border: none; cursor: pointer; }
        .btn:hover { background: #74b9ff; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Admin Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Admin Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button class="btn" type="submit">Login</button>
    </form>
    <div class="error"><?= $loginError ?></div>
</div>
</body>
</html>
