<?php
require_once "connection.php";

if(isset($_POST['save']))
{    

     $bname = $_POST['bookname'];
     $pub = $_POST['publication'];
     $class = $_POST['class'];
     $rate=$_POST['rate'];
     $quantity=$_POST['quantity'];
     $sql = "INSERT INTO bookslist (bookname,publication,class,rate,quantity)
     VALUES ('$bname','$pub','$class','$rate','$quantity')";
     if (mysqli_query($conn, $sql)) {
        header("location: index.php");
        exit();
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <?php include "head.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Book Name</label>
                            <input type="text" name="bookname" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                            <label>Publication</label>
                            <input type="text" name="publication" class="form-control" value="" maxlength="30" required="">
                        </div>
                        <div class="form-group">
                            <label>Class</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Select Class--</option>
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="3">IV</option>
                                <option value="3">V</option>
                                <option value="3">VI</option>
                                <option value="3">VII</option>
                                <option value="3">VIII</option>
                                <option value="3">IX</option>
                                <option value="3">X</option>
                                <option value="3">Nursery</option>
                                <option value="3">L.K.G.</option>
                                <option value="3">H.K.G.</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>Rate</label>
                            <input type="number" name="rate" class="form-control" value="" maxlength="30" required="">
                        </div>
                        <div class="form-group ">
                            <label>Quantity</label>
                            <input type="number" name="Quantity" class="form-control" value="" maxlength="30" required="">
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
