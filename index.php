<!DOCTYPE html>
<html>
<head>
    <title>Simple Login</title>
    <style>
        body {
            background-color: #00215E; /* Navy blue background */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        header {
            background-color: #FC4100; /* Bright orange */
            color: white;
            padding: 20px;
            width: 100%;
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
        }

        .login-box {
            background-color: #2C4E80; /* Cool blue */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 300px;
            margin-top: 100px; /* Give space below header */
            color: #FFC55A; /* Yellow text */
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFC55A;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #FFC55A;
            background-color: #fff;
            color: #00215E;
        }

        .login-box input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #FC4100;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .login-box input[type="submit"]:hover {
            background-color: #FFC55A;
            color: #00215E;
        }

        h3{
            color:white;
        }
    </style>
</head>
<body>

<header>
    <h1>Criminal Records</h1>
</header>

<div class="login-box">
    <h2>Login</h2>
    <form action="logserver.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="pasword" placeholder="Password" required>
        <input type="submit" value="Login">
        <h3> If no Acount <a href="signup.php"> Signup</a></h3>
    </form>
</div>

<?php 
include ("logserver.php");
?>

</body>
</html>
