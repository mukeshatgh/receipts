<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Retrieve Or Fetch Data From MySQL Database Using PHP With Boostrap</title>
<?php include "head.php"; ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Books List</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Book/s</a>
                    </div>
                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM bookslist");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped'>
                      
                      <tr>
                        <td>ID</td>
                        <td>Book Name</td>
                        <td>Publication</td>
                        <td>Class</td>
                        <td>Rate</td>
                        <td>Quantity</td>
                        <td>Action</td>
                      </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                         <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["bookname"]; ?></td>
                        <td><?php echo $row["publication"]; ?></td>
                        <td><?php echo ($row["class"]); ?></td>
                        <td><?php echo ($row["rate"]); ?></td>
                        <td><?php echo ($row["quantity"]); ?></td>
                        <td>
  <a href="update.php?id=<?php echo $row["id"]; ?>" title='Update Record' class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
  <a href="delete.php?id=<?php echo $row["id"]; ?>" title='Delete Record' class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
</td>

                        
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>

                </div>
            </div>     
        </div>

</body>
</html>