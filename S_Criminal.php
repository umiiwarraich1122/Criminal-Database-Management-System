<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Record Search</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #004080;
        }

        .form-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #003366;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
            margin-bottom: 15px;
            transition: border 0.3s;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #004080;
            outline: none;
        }

        input[type="submit"] {
            padding: 12px 20px;
            background-color: #004080;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0066cc;
        }

        .result {
            background-color: #e0f7fa;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .result ul {
            list-style-type: none;
            padding: 0;
        }

        .result li {
            font-size: 16px;
            margin: 8px 0;
        }

        .result li strong {
            color: #003366;
        }

        .message {
            color: #ff5733;
        }
    </style>
</head>
<body>

    <header>Criminal Record Search</header>

    <div class="container">

        <div class="form-container">
            <form method="POST">
                <div>
                    <label for="FIR">FIR Number:</label>
                    <input type="number" id="FIR" name="FIR" required>
                </div>
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <input type="submit" value="Search">
                </div>
            </form>
        </div>

        <?php
        echo "✅ PHP is working!"; 
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Get values from form
            $fir = $_POST['FIR'] ?? '';
            $name = $_POST['name'] ?? '';

            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "criminal_database");

            if (!$conn) {
                die("❌ Database connection failed: " . mysqli_connect_error());
            }

            // Search for record
            $sql = "SELECT * FROM detail WHERE firnumber = '$fir' AND name = '$name'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='result'>";
                echo "<h3>🔍 Criminal Record Found:</h3>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<ul>";
                    echo "<li><strong>FIR Number:</strong> " . $row['firnumber'] . "</li>";
                    echo "<li><strong>Name:</strong> " . $row['name'] . "</li>";
                    echo "<li><strong>Age:</strong> " . $row['age'] . "</li>";
                    echo "<li><strong>Address:</strong> " . $row['adress'] . "</li>";
                    echo "<li><strong>Crime:</strong> " . $row['crime'] . "</li>";
                    echo "<li><strong>Date:</strong> " . $row['date'] . "</li>";
                    echo "</ul>";
                }
                echo "</div>";
            } else {
                echo "<p class='message'>⚠️ No criminal record found for the given FIR number and name.</p>";
            }

            mysqli_close($conn);
        }
        ?>

    </div>

</body>
</html>
