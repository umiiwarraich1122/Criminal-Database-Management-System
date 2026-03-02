<?php

// Database connection
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "criminal_database";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("❌ Database connection failed: " . mysqli_connect_error());
}

// Only process when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Collect and sanitize data
    $firnumber = $_POST['firnumber'] ?? '';
    $name      = $_POST['name'] ?? '';
    $age       = $_POST['age'] ?? '';
    $address   = $_POST['address'] ?? '';
    $crime     = $_POST['crime'] ?? '';
    $date      = $_POST['date'] ?? '';

    // Basic validation
    if (empty($firnumber) || empty($name) || empty($age) || empty($address) || empty($crime) || empty($date)) {
        die("⚠️ All fields are required.");
    }

    // Insert into table
    $sql = "INSERT INTO detail (firnumber, name, age, adress, crime, date) 
            VALUES ('$firnumber', '$name', '$age', '$address', '$crime', '$date')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "✅ Record added successfully!";
        echo "<script>setTimeout(function() { window.location.href = 'home.php'; }, 1500);</script>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
