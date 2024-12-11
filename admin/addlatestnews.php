<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "news";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input
    $name = $conn->real_escape_string($_POST['news_name']);
    $category = $conn->real_escape_string($_POST['news_category']);
    $description = $conn->real_escape_string($_POST['news_description']);
    $date = $conn->real_escape_string($_POST['date']);
    $image = $_FILES['image']['name'];
    $target = __DIR__ . "/uploads/" . basename($image);

    // Create the 'uploads' directory if it doesn't exist
    if (!is_dir(__DIR__ . "/uploads")) {
        mkdir(__DIR__ . "/uploads", 0755, true);
    }

    // Image upload validation
    if (!empty($image)) {
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = pathinfo($image, PATHINFO_EXTENSION);

        if (in_array(strtolower($file_extension), $allowed_types)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                // Prepared statement to avoid SQL injection
                $stmt = $conn->prepare("INSERT INTO latest_news (news_name, news_category, news_description, date, image) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $name, $category, $description, $date, $image);

                if ($stmt->execute()) {
                    header("Location: alllatestnews.php");
                    echo "Record added successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Failed to upload image. Please check the 'uploads' directory permissions.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
        }
    } else {
        echo "Please upload an image.";
    }
}

$conn->close();
?>




<?php include('includes/head.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php include('includes/header.php'); ?>
                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
  
                        <div id="addEmployeeModal" >
                            <div class="modal-content">
                                <form  method="POST" enctype="multipart/form-data">
                                        <div class="modal-header">						
                                            <h4 class="modal-title">Add Employee</h4>
                                            
                                        </div>
                                        <div class="modal-body">					
                                            <div class="form-group">
                                                <label>News Name:</label>
                                                <input type="text" class="form-control" name="news_name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>News Category:</label>
                                                <input type="text" class="form-control" name="news_category" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description:</label>
                                                <textarea class="form-control" name="news_description" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Date:</label>
                                                <input type="date" class="form-control" name="date" required>
                                            </div>	
                                            <div class="form-group">
                                                <label>Image:</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div>						
                                        </div>
                                        <div class="modal-footer">
                                             <a class="btn btn-default" href="alllatestnews.php">Cancel</a>
                                            <input type="submit" name="submit" class="btn btn-success" value="Add">
                                        </div>
                                </form>
                            </div>
                        </div>
                </div>
           
<?php include('includes/footer.php'); ?>
<?php include('includes/javascript.php'); ?>










