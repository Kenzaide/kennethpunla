<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('stacked-waves-haikei.png'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .login-box {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 40px rgba(118, 136, 91, 0.5);
        }
        form {
            text-align: center;
        }
        button {
            margin: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #627254;
            border: none;
            color: white;
            margin-top: 20px;
        }
        h3{
            color: #627254; 
        }
        a {
            color: #627254; 
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <form action="login_process.php" method="POST">
            <h3>USERNAME:</h3><input type="text" name="username" placeholder="Username" required><br>
            <h3>PASSWORD:</h3><input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Log In</button>
        </form>
        <p>Don't have an account? <a href="sign-up.php">Sign-up</a></p>
    </div>
</body>
</html>