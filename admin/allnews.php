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
$sql = "SELECT id, image, news_name, news_category, news_description, date FROM new";
$result = $conn->query($sql);



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM new WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: allnews.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
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
                                    <a href="addnews.php" class="btn btn-primary btn-icon-split" style="margin-left:680px;">
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
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                // Display the image with a relative path
                                                echo "<td><img src='uploads/" . $row['image'] . "' alt='News Image' style='width: 200px; height: 200px;'></td>";
                                                echo "<td>" . $row['news_name'] . "</td>";
                                                echo "<td>" . $row['news_category'] . "</td>";
                                                echo "<td>" . $row['news_description'] . "</td>";
                                                echo "<td>" . $row['date'] . "</td>";
                                                // Break out of PHP for the action buttons
                                                ?>
                                                <td>
                                                <a href="newsview.php" class="btn btn-warning  btn-icon-split">
                                                                    <span class="icon text-white-50">
                                                                        <i class="fas fa-info"></i>
                                                                    </span>
                                                                    <span class="text">View</span>
                                                                </a>
                                                                <a href="editnews.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-icon-split">
                                                                    <span class="icon text-white-50">
                                                                        <i class="fas fa-edit"></i>
                                                                    </span>
                                                                    <span class="text">Edit</span>
                                                                </a>
                                                            
                                                    <form method="POST" action="delete.php" style="display:inline;" 
                                                        onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" class="btn btn-danger btn-icon-split">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <span class="text">Delete</span>
                                                        </button>
                                                    </form>
                                                </td>
                                                <?php
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
                    
                           

<?php include('includes/footer.php'); ?>
<?php include('includes/javascript.php'); ?>