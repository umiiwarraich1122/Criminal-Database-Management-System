<!DOCTYPE html>
<html>
<head>
    <title>Criminal Database</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url("B.webp");
            background-size: cover;
            background-position: center;
            height: 100vh;
            filter: blur(0); /* Will not apply to content directly */
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6); /* dark overlay */
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: -1;
            filter: blur(5px); /* blur only background layer */
        }

        header {
            background-color: #FC4100;
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
        }

        header img {
            height: 40px;
            margin-right: 10px;
        }

        header h1 {
            font-size: 20px;
            margin: 0;
        }

        .container {
            text-align: center;
            margin-top: 100px;
            color: #FFC55A;
        }

        .container button {
            padding: 15px 30px;
            margin: 20px;
            background-color: #2C4E80;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .container button:hover {
            background-color: #FFC55A;
            color: #00215E;
        }
    </style>
</head>
<body>

<div class="overlay"></div>

<header>
    <img src="logo.webp" alt="Logo">
    <h1>Welcome to the Criminal Database</h1>
</header>

<div class="container">
    <button onclick="location.href='Add_Record_Html.php'">Add Criminal Record</button>
    <button onclick="location.href='Search_Record.php'">Search Criminal Record</button>
    <button onclick="location.href='delete.php'">delete Criminal Record</button>
    <button onclick="location.href='update_Data.php'">Update  Criminal Data</button>
    <button onclick="location.href='ALL_Record.php'">All Criminal Record</button>
    <button onclick="location.href='Important_info.php'">About All Crimes </button>
</div>

</body>
</html>
