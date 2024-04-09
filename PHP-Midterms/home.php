<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
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
        .home {
            text-align: center;
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

        .center-image {
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="home">
        <?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: login.php");
            exit();
        }
        ?>
        <img src="Super_OK_Emote.webp" alt="Invalid" class="center-image" />
        <h3>Welcome, <?php echo $_SESSION['username']; ?>!</h3>
        <form action="logout.php" method="POST">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>