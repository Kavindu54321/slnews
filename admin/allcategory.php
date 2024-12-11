


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


if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM category WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: allcategory.php');
}

?>




    


<?php include('includes/head.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php include('includes/header.php'); ?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Manage <b>Category</b></h2>
                </div>
                <div class="col-sm-8">
                    
                    <a href="addcategory.php" class="btn btn-primary btn-icon-split" style="margin-left:680px;">        
                        <span class="text">+ Add News</span>
                    </a>				
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                           <th>Id</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                       
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
          $query = "SELECT * FROM category";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['code']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="editcategory.php?id=<?php echo $row['id']?>" class="btn btn-success btn-icon-split">
               
                <span class='icon text-white-50'>
                    <i class='fas fa-check'></i>
                </span>
                <span class='text'>Edit</span>
              </a>
              <a href="allcategory.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-icon-split">
              <span class='icon text-white-50'>
                    <i class='fas fa-trash'></i>
                </span>
            <span class='text'>Delete</span>
              </a>
            </td>
          </tr>
          <?php } ?>
                        
                    </tbody>
                </table>
                <?php
                    // Close the connection
                    $conn->close();
                    ?>	
            </div>
        </div>        
    </div>
</div>
    
           
<?php include('includes/footer.php'); ?>
<?php include('includes/javascript.php'); ?>

 