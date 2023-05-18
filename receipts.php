<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Submitted Records</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			background-color: #f2f2f2;
			font-family: "Segoe UI", "Helvetica Neue", sans-serif;
		}

		.container {
			margin: 50px auto;
			max-width: 800px;
			background-color: #fff;
			border: 1px solid #ccc;
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
			padding: 20px;
			border-radius: 5px;
		}

		h1 {
			margin: 0;
			padding: 10px;
			font-size: 26px;
			text-align: center;
			border-bottom: 1px solid #ccc;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ccc;
		}

		th {
			background-color: #007bff;
			color: #fff;
			font-weight: bold;
			text-transform: uppercase;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		form {
			margin-top: 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}

		input[type="search"] {
			padding: 8px;
			font-size: 16px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-right: 10px;
			height: 38px;
			background-color: #fff;
			color: #444;
			padding-left: 10px;
			width: 70%;
		}

		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 4px;
			cursor: pointer;
			margin-top: 20px;
			text-transform: uppercase;
			font-weight: bold;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
			transition: background-color 0.3s ease;
		}

		input[type="submit"]:hover {
			background-color: #0062cc;
		}

		.clearfix::after {
			content: "";
			display: table;
			clear: both;
		}
		.back{
			float:right;
			border:1px solid #ccc;
			border-radius:5px;
			font-size:15px;
			padding:4px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Saved Records <a href="payment.php" class="back">Back</a></h1>
		
		<form method="post">
			<label for="search_query">Search:</label>
			<input type="search" id="search" name="search_query" placeholder="Search by name or date">

			<input type="submit" value="Submit">
		</form>
		<table>
			<thead>
				<tr>
					<th>Student Name</th>
					<th>Fees Received</th>
					<th>Total Fees</th>
					<th>Due Fees</th>
					<th>Pay Date</th>
					<th>Actions</th>
				</tr>
			</<tbody>
				<tr>
				<?php
// Define database connection details
require_once "connection.php";
$sql = "SELECT * FROM receipts";

// Check if search query has been submitted
if (isset($_POST["search_query"])) {
    // Retrieve search query from form field
    $search_query = $_POST["search_query"];

    // Append WHERE clause to SQL query to filter results by search query
    $sql .= " WHERE student_name LIKE '%$search_query%'";
}

// Execute SQL query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    
    // Output table rows for each record
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["student_name"] . "</td>";
        echo "<td>" . $row["fees_received"] . "</td>";
        echo "<td>" . $row["total_fees"] . "</td>";
        echo "<td>" . $row["due_fees"] . "</td>";
        echo "<td>" . $row["pay_date"] . "</td>";
		echo "<td><a href='print.php?id=".$row['id']."' target='_blank'>Print Receipt</a></td>";
        echo "</tr>";
    }

    // Output table footer row
    echo "</table>";
} else {
    echo "No records found.";
}

// Close database connection
$conn->close();
?>
				</tbody>
		</table>
	</div>
</body>
</html>
