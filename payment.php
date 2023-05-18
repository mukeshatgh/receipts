<?php
// Define database connection details
require_once "connection.php";

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form fields
    $student_name = $_POST["student_name"];
    $fees_received = $_POST["fees_received"];
    $total_fees = $_POST["total_fees"];
    $due_fees = $_POST["due_fees"];
    $pay_date = $_POST["pay_date"];

    // Prepare SQL query to insert record
    $sql = "INSERT INTO receipts (student_name, fees_received, total_fees, due_fees, pay_date) VALUES ('$student_name', '$fees_received', '$total_fees', '$due_fees', '$pay_date')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "<script>document.addEventListener('DOMContentLoaded', function() {var element = document.getElementById('msg_echo');element.innerHTML ='Record Inserted Successfully!'});</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
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
    #msg_echo{
        color:green;
        font-weight: bold;
    }
  </style>
  <body>
  <div class="container">
    <h1>Student Payment Form</h1>
<form method="post">
    <label for="student_name">Student Name:</label>
    <input type="text" name="student_name" required><br>
    <label for="fees_received">Fees Received:</label>
    <input type="number" name="fees_received" required><br>
    <label for="total_fees">Total Fees:</label>
    <input type="number" name="total_fees" required><br>
    <label for="due_fees">Due Fees:</label>
    <input type="number" name="due_fees" required><br>
    <label for="pay_date">Pay Date:</label>
    <input type="date" name="pay_date" required><br>
    <input type="submit" value="Submit">
    <span id="msg_echo"></span>
    <a href="receipts.php">[--Veiw Records--]</a>
</form>
</div>
</body>