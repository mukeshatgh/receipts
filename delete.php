<?php
include_once 'connection.php';
$sql = "DELETE FROM bookslist WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Record Deleted!');</script>";
   header("location: index.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>