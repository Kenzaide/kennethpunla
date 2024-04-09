<?php
session_start();
require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 95vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #627254;
            color: white;
            font-size: 40px;
        }
        .login-box {
            text-align: center;
        }
        .error-message {
            margin-bottom: 20px;
        }
        .center-image {
            margin: 0 auto;
        }
        .logout-btn {
            padding: 10px 20px;
            background-color: white;
            color: #76885B;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head>
    <div class="login-box">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($result);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                header("Location: home.php");
                exit();
            } else {
                echo '<img src="Despair_Emote.webp" alt="Invalid" class="center-image" />';
                echo '<div class="error-message">INVALID USERNAME OR PASSWORD</div>';
            }
        }
        ?>
            <form action="login.php" method="POST">
            <button type="submit" class="logout-btn">Retry</button>
        </form>
    </div>
</body>
</html>