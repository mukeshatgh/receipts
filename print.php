<!DOCTYPE html>
<html>
<head>
	<title>Print Receipt</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}
		.receipt {
			margin: 50px auto;
			padding: 20px;
			width: 800px;
			border: 1px solid #ccc;
		}
		.receipt h2 {
			margin: 0;
			text-align: center;
			font-size: 24px;
		}
		.receipt p {
			margin: 10px 0;
			font-size: 18px;
		}
		.receipt table {
			margin: 20px 0;
			border-collapse: collapse;
			width: 100%;
		}
		.receipt th {
			padding: 10px;
			background-color: #ccc;
			border: 1px solid #000;
			font-weight: normal;
		}
		.receipt td {
			padding: 10px;
			border: 1px solid #000;
			text-align: center;
		}
        .logo{
            width:60px;
            height:60px;
        }
	</style>
</head>
<body>
	<?php
   function amountToWords($amount) {
    $ones = array(
        0 => "",
        1 => "One",
        2 => "Two",
        3 => "Three",
        4 => "Four",
        5 => "Five",
        6 => "Six",
        7 => "Seven",
        8 => "Eight",
        9 => "Nine",
        10 => "Ten",
        11 => "Eleven",
        12 => "Twelve",
        13 => "Thirteen",
        14 => "Fourteen",
        15 => "Fifteen",
        16 => "Sixteen",
        17 => "Seventeen",
        18 => "Eighteen",
        19 => "Nineteen"
    );
    $tens = array(
        0 => "",
        2 => "Twenty",
        3 => "Thirty",
        4 => "Forty",
        5 => "Fifty",
        6 => "Sixty",
        7 => "Seventy",
        8 => "Eighty",
        9 => "Ninety"
    );
    $amount = str_replace(",", "", $amount);
    $amount = number_format($amount, 2, ".", "");
    $num = explode(".", $amount);
    $dollars = $num[0];
    $cents = isset($num[1]) ? $num[1] : 0;
    if (strlen($dollars) > 12) return "Amount too large.";
    $hundreds = array();
    if ($dollars > 999) {
        $hundreds[] = $ones[substr($dollars, -4, 1)];
        $hundreds[] = "Thousand";
    }
    if ($dollars > 99) {
        $hundreds[] = $ones[substr($dollars, -3, 1)];
        $hundreds[] = "Hundred";
    }
    $t = intval(substr($dollars, -2));
    if ($t < 20) {
        $hundreds[] = $ones[$t];
    } else {
        $hundreds[] = $tens[substr($dollars, -2, 1)];
        $hundreds[] = $ones[substr($dollars, -1)];
    }
    if (count($hundreds) == 0) {
        $hundreds[] = $ones[$dollars];
    }
    if ($dollars > 0) {
        $hundreds[] = "Rupees";
    }
    if ($cents > 0) {
        $hundreds[] = "and";
        if ($cents < 20) {
            $hundreds[] = $ones[$cents];
        } else {
            $hundreds[] = $tens[substr($cents, 0, 1)];
            $hundreds[] = $ones[substr($cents, 1, 1)];
        }
        $hundreds[] = "Paise";
    }
    return implode(" ", $hundreds);
}


    
		// Connect to the database
		require_once "connection.php";
		// Get the record ID from the URL parameter
        if (isset($_GET['id'])) {
            // Access the 'id' key here
            $id = $_GET['id'];
          
		

		// Query the database for the record with the specified ID
		$sql = "SELECT * FROM receipts WHERE id = '$id'";
		$result = mysqli_query($conn, $sql);

		// Check for query errors
		if (!$result) {
			die("Error: " . $sql . "<br>" . mysqli_error($conn));
		}

		// Get the record data and store it in variables
		$row = mysqli_fetch_assoc($result);
		$student_name = $row['student_name'];
		$fees_received = $row['fees_received'];
		$total_fees = $row['total_fees'];
		$due_fees = $row['due_fees'];
		$pay_date = $row['pay_date'];
    }
    else 
    echo "Select Print Receipt!";
		// Close the database connection
		mysqli_close($conn);

	?>

	<div class="receipt">

        <h1><img src='nkvs.png' class='logo'></img>Nav Krishna Valley School(MSCIT ALC)</h1>
        <h2>Center Code 23210241</h2>
		<h2>Receipt</h2>
		<div>Receipt Number : <?php echo $id;?> <span style='float:right;'>Date : <?php echo $pay_date; ?></span></div>
		<table>
			<thead>
				<tr>
                    <th>Particulars</th>
					<th>Fees Received</th>
					<tr>
			</thead>
			<tbody>
				<tr>
                <td height="50">Account Name :<?php echo $student_name; echo '<br>';?>Amount Due :<?php echo $due_fees; ?></td>
			    <td height="50"><?php echo $fees_received; ?></td>
</tr>
<tr>
    <?php $amount_in_words = amountToWords($fees_received); ?>
    <td>Amount in Words :<?php echo $amount_in_words; ?></td>
    <td><?php echo $fees_received; ?></td>
</tr>
			
		</tbody>
	</table>
<div>
<br>
<span>Cordinator/Prinicpal</span><span style="float:right;">Recieved By</span>
</div>
	<p style="text-align: center;"><a href="#" onclick="window.print();">Print Receipt</a></p>
    <p style="text-align: center;"><a href="payment.php">Home</a></p>
</div>
</body>
</html>