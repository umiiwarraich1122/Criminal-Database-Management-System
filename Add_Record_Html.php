<!DOCTYPE html>
<html>
<head>
  <title>Criminal Record Form</title>
  <style>
    /* Basic body styling */
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 40px;
    }

    /* Header styling */
    h1 {
      background-color: #003366;
      color: white;
      text-align: center;
      padding: 15px;
      border-radius: 8px;
    }

    /* Form container styling */
    .form-container {
      background-color: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: 30px auto;
    }

    /* Label styling */
    label {
      font-weight: bold;
      color: #003366;
    }

    /* Input field styling */
    input[type="text"], input[type="number"], input[type="date"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    /* Submit button styling */
    input[type="submit"] {
      background-color: #004080;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0066cc;
    }
  </style>
</head>
<body>

  <h1>Criminal Record Form</h1>

  <div class="form-container">
    <form action="criminal_database.php" method="POST">
      <label for="fir">FIR Number:</label>
      <input type="number" id="fir" name="firnumber" required>

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="age">Age:</label>
      <input type="number" id="age" name="age" required>

      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required>

      <label for="crime">Crime:</label>
      <input type="text" id="crime" name="crime" required>

      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required>

      <input type="submit" value="Register">
    </form>
  </div>

  <?php 
  include ("criminal_database.php");
  ?>

</body>
</html>
