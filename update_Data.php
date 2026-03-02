<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Criminal Record</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f5f9;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #003366;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 24px;
    }
    .container {
      max-width: 600px;
      margin: 30px auto;
      background-color: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input[type="text"], input[type="number"], input[type="date"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    input[type="submit"] {
      margin-top: 20px;
      padding: 12px;
      background-color: #004080;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }
    .message {
      text-align: center;
      margin-top: 20px;
      font-size: 18px;
    }
  </style>
</head>
<body>

<header>Update Criminal Record</header>

<div class="container">
  <!-- Step 1: Search form -->
  <form method="POST">
    <label for="fir_search">Enter FIR Number to Search:</label>
    <input type="number" name="fir_search" required>
    <input type="submit" value="Search">
  </form>

  <?php
  // DB connection
  $conn = new mysqli("localhost", "root", "", "criminal_database");

  if ($conn->connect_error) {
    die("<p class='message'>❌ Connection failed: " . $conn->connect_error . "</p>");
  }

  // STEP 1: If form is submitted with FIR number
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fir_search'])) {
    $fir = $_POST['fir_search'];
    $sql = "SELECT * FROM detail WHERE firnumber = $fir";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
  ?>

  <!-- STEP 2: Show update form with values -->
  <form method="POST">
    <input type="hidden" name="firnumber" value="<?php echo $row['firnumber']; ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

    <label>City:</label>
    <input type="text" name="city" value="<?php echo $row['adress']; ?>" required>

    <label>Age:</label>
    <input type="number" name="age" value="<?php echo $row['age']; ?>" required>

    <label>Crime:</label>
    <input type="text" name="crime" value="<?php echo $row['crime']; ?>" required>

    <label>Date:</label>
    <input type="date" name="date" value="<?php echo $row['date']; ?>" required>

    <input type="submit" name="update" value="Update Record">
  </form>

  <?php
    } else {
      echo "<p class='message'>⚠️ No record found with FIR number $fir.</p>";
    }
  }

  // STEP 3: Update logic
  if (isset($_POST['update'])) {
    $fir = $_POST['firnumber'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $crime = $_POST['crime'];
    $date = $_POST['date'];

    $stmt = $conn->prepare("UPDATE detail SET name=?, adress=?, age=?, crime=?, date=? WHERE firnumber=?");
    $stmt->bind_param("ssissi", $name, $city, $age, $crime, $date, $fir);

    if ($stmt->execute()) {
      echo "<p class='message'>✅ Record updated successfully!</p>";
    } else {
      echo "<p class='message'>❌ Error updating record: " . $conn->error . "</p>";
    }

    $stmt->close();
  }

  $conn->close();
  ?>
</div>

</body>
</html>
