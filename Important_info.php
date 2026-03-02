<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Criminal Records Report</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #003366;
      color: white;
      text-align: center;
      padding: 20px 0;
      font-size: 26px;
      font-weight: bold;
    }

    .report-box {
      max-width: 800px;
      margin: 30px auto;
      background-color: white;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h3 {
      color: #003366;
      border-bottom: 2px solid #eee;
      padding-bottom: 5px;
    }

    p {
      font-size: 18px;
      margin: 10px 0;
    }

    .highlight {
      font-weight: bold;
      color: #cc0000;
    }
  </style>
</head>
<body>

  <header>Criminal Record Report</header>
  <div class="report-box">

<?php
$conn = new mysqli("localhost", "root", "", "criminal_database");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 1. Total criminals
$result = $conn->query("SELECT COUNT(*) AS total FROM detail");
$row = $result->fetch_assoc();
echo "<h3>1. Total Criminals:</h3><p><span class='highlight'>{$row['total']}</span> criminals in the database.</p>";

// 2. Criminal who did most crimes
$result = $conn->query("SELECT name, COUNT(*) AS total FROM detail GROUP BY name ORDER BY total DESC LIMIT 1");
$row = $result->fetch_assoc();
echo "<h3>2. Criminal with Most Crimes:</h3><p><span class='highlight'>{$row['name']}</span> committed <span class='highlight'>{$row['total']}</span> crimes.</p>";

// 3. Most frequent crime
$result = $conn->query("SELECT crime, COUNT(*) AS total FROM detail GROUP BY crime ORDER BY total DESC LIMIT 1");
$row = $result->fetch_assoc();
echo "<h3>3. Most Common Crime:</h3><p><span class='highlight'>{$row['crime']}</span> occurred <span class='highlight'>{$row['total']}</span> times.</p>";

// 4. Least frequent crime
$result = $conn->query("SELECT crime, COUNT(*) AS total FROM detail GROUP BY crime ORDER BY total ASC LIMIT 1");
$row = $result->fetch_assoc();
echo "<h3>4. Least Common Crime:</h3><p><span class='highlight'>{$row['crime']}</span> occurred only <span class='highlight'>{$row['total']}</span> time(s).</p>";

// 5. Date with most crimes
$result = $conn->query("SELECT date, COUNT(*) AS total FROM detail GROUP BY date ORDER BY total DESC LIMIT 1");
$row = $result->fetch_assoc();
echo "<h3>5. Busiest Crime Date:</h3><p><span class='highlight'>{$row['date']}</span> had <span class='highlight'>{$row['total']}</span> crimes.</p>";

// 6. Criminals under 18
$result = $conn->query("SELECT COUNT(*) AS total FROM detail WHERE age < 18");
$row = $result->fetch_assoc();
echo "<h3>6. Under 18 Criminals:</h3><p><span class='highlight'>{$row['total']}</span> criminals are under 18.</p>";

// 7. Criminals 18 or older
$result = $conn->query("SELECT COUNT(*) AS total FROM detail WHERE age >= 18");
$row = $result->fetch_assoc();
echo "<h3>7. 18+ Criminals:</h3><p><span class='highlight'>{$row['total']}</span> criminals are 18 or older.</p>";

$conn->close();
?>

  </div>
</body>
</html>
