<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pick</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .outer-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            background-color: #EEEEEE; 
        }

        .inner-box {
            padding: 50px;
            background-color: white;
            border-radius: 10px; 
            box-shadow: 0px 0px 40px rgba(118, 136, 91, 0.5);
            text-align: center;
        }


        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button {
            margin: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #627254;
            border: none;
            color: white;
        }

        h2, p {
            color: #627254;
        }
    </style>
</head>
<body>
    <div class="outer-box">
        <div class="inner-box">
        <h2 style="font-size:30px;">Welcome!</h2>
            <p>Please select an option:</p>
                <div class="button-container">
                    <button onclick="window.location.href='sign-up.php'">Sign Up</button>
                    <button onclick="window.location.href='login.php'">Log In</button>
                </div>
        </div>
    </div>
</body>
</html>