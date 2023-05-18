<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Windows 7 UI Form</title>
  <style>
    body {
      background-color: #f0f0f0;
      font-family: "Segoe UI", "Helvetica Neue", sans-serif;
    }
    
    .container {
      margin: 50px auto;
      max-width: 600px;
      background-color: #fff;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    
    h1 {
      text-align: center;
      font-size: 24px;
      margin-top: 0;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      font-size: 18px;
    }
    
    input[type="text"],
    input[type="number"],
    input[type="date"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 20px;
    }
    
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Student Payment Form</h1>
    <form>
      <label for="name">Student Name:</label>
      <input type="text" id="name" name="name" required>
      
      <label for="fees_received">Fees Received:</label>
      <input type="number" id="fees_received" name="fees_received" required>
      
      <label for="total_fees">Total Fees:</label>
      <input type="number" id="total_fees" name="total_fees" required>
      
      <label for="due_fees">Due Fees:</label>
      <input type="number" id="due_fees" name="due_fees" required>
      
      <label for="pay_date">Pay Date:</label>
      <input type="date" id="pay_date" name="pay_date" required>
      
      <input type="submit" name="save" value="Submit">
    </form>
  </div>
</body>
</html>
<?php
require_once "connection.php";

if(isset($_POST['submit']))
{    

     $name = $_POST['name'];
     $fr = $_POST['fees_received'];
     $tf = $_POST['total_fees'];
     $due=$_POST['due_fees'];
     $date=$_POST['pay_date'];
     // Prepare the SQL query with placeholders
$sql = "INSERT INTO receipts (name, fees_received, total_fees, due_fees, pay_date) VALUES (?, ?, ?, ?, ?)";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind the parameters to the placeholders
$stmt->bind_param("siiss", $name, $fees_received, $total_fees, $due_fees, $pay_date);

// Execute the prepared statement
if ($stmt->execute() === TRUE) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
}
?>