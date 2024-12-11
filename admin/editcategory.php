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

$name = '';
$code= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM category WHERE id=$id";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $code = $row['code'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $name= $_POST['name'];
  $code = $_POST['code'];

  $query = "UPDATE category set name = '$name', code = '$code' WHERE id=$id";

  mysqli_query($conn, $query);

  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
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
                                                <form action="editcategory.php?id=<?php echo $_GET['id']; ?>" method="POST">
                                                            <div class="modal-header">						
                                                                <h4 class="modal-title">Add Category</h4>
                                                            
                                                            </div>
                                                            <div class="modal-body">					
                                                                <div class="form-group">
                                                                    <label>Name:</label>
                                                                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Code:</label>
                                                                    <input type="text" class="form-control" name="code" value="<?php echo $code; ?>" required>
                                                                </div>
                                                                
                                                                
                                                             	
                                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                            <a class="btn btn-default" href="allcategory.php">Cancel</a>
                                                                <input type="submit" name="update" class="btn btn-success" value="Add">
                                                            </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                         </div>
                       

                

                         
<?php include('includes/footer.php'); ?>
<?php include('includes/javascript.php'); ?>