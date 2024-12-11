<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "news";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $code = $_POST['code'];
  $query = "INSERT INTO category(name, code) VALUES ('$name', '$code')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: allcategory.php');

}

?>




  
   
              
<?php include('includes/head.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php include('includes/header.php'); ?>               
            

                            <!-- Begin Page Content -->
                        <div class="container-fluid">

                                <!-- Page Heading -->
  
                                    <div id="addEmployeeModal" >
                                        <div class="modal-dialog">
                                                <div class="modal-content">
                                                <form action="addcategory.php" method="POST">
                                                            <div class="modal-header">						
                                                                <h4 class="modal-title">Add Category</h4>
                                                            
                                                            </div>
                                                            <div class="modal-body">					
                                                                <div class="form-group">
                                                                    <label>Name:</label>
                                                                    <input type="text" class="form-control" name="name" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Code:</label>
                                                                    <input type="text" class="form-control" name="code" required>
                                                                </div>
                                                                
                                                                
                                                             	
                                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                            <a class="btn btn-default" href="allcategory.php">Cancel</a>
                                                                <input type="submit" name="submit" class="btn btn-success" value="Add">
                                                            </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                         </div>
                       

                

                         
<?php include('includes/footer.php'); ?>
<?php include('includes/javascript.php'); ?>