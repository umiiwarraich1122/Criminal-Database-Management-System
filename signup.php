<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00215E; /* Dark navy blue */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        .signup-container {
            background-color: #2C4E80; /* Cool blue */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 320px;
            margin-top: 100px; /* space from header */
            color: #FFC55A; /* Yellow text */
        }

        h2 {
            text-align: center;
            color: #FFC55A;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #FFC55A;
            border-radius: 5px;
            background-color: #fff;
            color: #00215E;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #FC4100;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #FFC55A;
            color: #00215E;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 10px;
            color: #FFC55A;
        }
    </style>
</head>
<body>

<header>
    <h1>Criminal Records - Signup</h1>
</header>

<div class="signup-container">
    <h2>Create an Account</h2>
    <form action="login.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="gmail" placeholder="Email Address" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="pasword" placeholder="Password" required>
        <input type="submit" value="Register">
    </form>
</div>

<?php 
include ("login.php");
?>

</body>
</html>
