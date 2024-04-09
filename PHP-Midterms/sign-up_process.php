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
        require_once('connect.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $check_query = "SELECT * FROM users WHERE username='$username'";
            $check_result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                echo '<img src="What_can_I_do_Emote.webp" alt="Invalid" class="center-image" />';
                echo '<div class="error-message">USERNAME IS ALREADY TAKEN.</div>';
            } else {
                $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
                mysqli_query($conn, $query);

                header("Location: login.php");
                exit();
            }
        }
        ?>
        <form action="sign-up.php" method="POST">
            <button type="submit" class="logout-btn">Retry</button>
        </form>
    </div>
</body>
</html>