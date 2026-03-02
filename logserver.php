<?php
$conn = mysqli_connect("localhost", "root", "", "login");

if (!$conn) {
    die("Connection failed!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $pasword = $_POST['pasword'] ?? '';

    if (empty($username) || empty($pasword)) {
        die("Both fields are required.");
    }

    $sql = "SELECT * FROM signup WHERE username='$username' AND pasword='$pasword'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        echo "✅ Login successful! Welcome, $username.";
        echo "<script>setTimeout(function() { window.location.href = 'home.php'; }, 1500);</script>";

    } else {
        echo "❌ Invalid username or password.";
    }
}