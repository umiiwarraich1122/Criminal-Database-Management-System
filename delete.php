<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Delete Record</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f5f9;
      padding: 0;
      margin: 0;
    }

    header {
      background-color: #990000;
      color: white;
      text-align: center;
      padding: 20px 0;
      font-size: 26px;
      font-weight: bold;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    label {
      font-size: 16px;
      font-weight: bold;
      color: #333;
      display: block;
      margin-top: 15px;
    }

    input[type="number"],
    input[type="text"] {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    input[type="submit"] {
      margin-top: 25px;
      padding: 12px 20px;
      background-color: #cc0000;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #a30000;
    }

    .message {
      margin-top: 20px;
      font-size: 18px;
      color: green;
    }

    .error {
      color: red;
    }
  </style>
</head>
<body>

<header>Delete Criminal Record</header>

<div class="container">
  <form action="" method="POST">
    <label for="fir">FIR Number:</label>
    <input type="number" id="fir" name="firnumber" required>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <input type="submit" value="Delete Record">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection settings
    $servername = "localhost";
    $username = "root"; // change if needed
    $password = "";     // change if needed
    $dbname = "criminal_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("<p class='message error'>Connection failed: " . $conn->connect_error . "</p>");
    }

    // Get form data safely
    $firnumber = $_POST['firnumber'];
    $name = $_POST['name'];

    // Prepare and execute DELETE query
    $sql = "DELETE FROM detail WHERE firnumber = ? AND name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $firnumber, $name);

    if ($stmt->execute()) {
      if ($stmt->affected_rows > 0) {
        echo "<p class='message'>Record deleted successfully.</p>";
      } else {
        echo "<p class='message error'>No matching record found.</p>";
      }
    } else {
      echo "<p class='message error'>Error deleting record: " . $conn->error . "</p>";
    }

    // Close connection
    $stmt->close();
    $conn->close();
  }
  ?>
</div>

</body>
</html>
