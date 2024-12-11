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

// SQL query to fetch data from the 'new' table
$sql = "SELECT id, image, news_name, news_category, news_description, date FROM latest_news";
$result = $conn->query($sql);

?>

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
  $query = "DELETE FROM latest_news WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: alllatestnews.php');
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
                        <h2>Manage <b>Employees</b></h2>
                    </div>
                    <div class="col-sm-8">
                        <a href="addlatestnews.php" class="btn btn-primary btn-icon-split" style="margin-left:680px;">
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
                                <th>ID</th>
                                <th>Image</th>
                                <th>News Name</th>
                                <th>News Category</th>
                                <th>Description</th>
                                <th>date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        
                                        // Display the image with a relative path
                                        echo "<td><img src='uploads/" . $row['image'] . "' alt='News Image' style='width: 200px; height: 200px;'></td>";
                                        
                                        echo "<td>" . $row['news_name'] . "</td>";
                                        echo "<td>" . $row['news_category'] . "</td>";
                                        echo "<td>" . $row['news_description'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        
                                        // Action buttons for editing and deleting
                                        echo "<td>
                                                <a href='editlatestnews.php?id=" . $row['id'] . "' class='btn btn-success btn-icon-split'>
                                                    <span class='icon text-white-50'>
                                                        <i class='fas fa-check'></i>
                                                    </span>
                                                    <span class='text'>Edit</span>
                                                </a>
                                                <a href='alllatestnews.php?id=" . $row['id'] . "' class='btn btn-danger btn-icon-split'>
                                                    <span class='icon text-white-50'>
                                                        <i class='fas fa-trash'></i>
                                                    </span>
                                                    <span class='text'>Delete</span>
                                                </a>
                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No data found</td></tr>";
                                }
                                ?>
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
