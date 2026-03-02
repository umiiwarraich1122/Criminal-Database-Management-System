<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Criminal Records</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f5f9;
      padding: 0;
      margin: 0;
    }

    header {
      background-color: #003366;
      color: white;
      text-align: center;
      padding: 20px 0;
      font-size: 26px;
      font-weight: bold;
    }

    table {
      width: 90%;
      margin: 30px auto;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #004080;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .message {
      text-align: center;
      margin-top: 20px;
      font-size: 18px;
    }
  </style>
</head>
<body>

  <header>All Criminal Records</header>

  <?php
  // Database connection
  $conn = new mysqli("localhost", "root", "", "criminal_database");

  if ($conn->connect_error) {
    die("<p class='message'>❌ Connection failed: " . $conn->connect_error . "</p>");
  }

  $sql = "SELECT * FROM detail";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>FIR Number</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Crime</th>
            <th>Date</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['firnumber']}</td>
              <td>{$row['name']}</td>
              <td>{$row['age']}</td>
              <td>{$row['adress']}</td>
              <td>{$row['crime']}</td>
              <td>{$row['date']}</td>
            </tr>";
    }
    echo "</table>";
  } else {
    echo "<p class='message'>⚠️ No records found in the database.</p>";
  }

  $conn->close();
  ?>

</body>
</html>
