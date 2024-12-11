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

// Check if 'id' is provided
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);

    // Fetch the record
    $sql = "SELECT * FROM new WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $news = $result->fetch_assoc();
    } else {
        die("Record not found!");
    }
} else {
    die("Invalid request. ID is missing!");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $news_name = $conn->real_escape_string($_POST['news_name']);
    $news_category = $conn->real_escape_string($_POST['news_category']);
    $news_description = $conn->real_escape_string($_POST['news_description']);
    $date = $conn->real_escape_string($_POST['date']);
    $image = $_FILES['image']['name'];

    // If a new image is uploaded, handle it
    if (!empty($image)) {
        $target = __DIR__ . "/uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $sql = "UPDATE new SET news_name = '$news_name', news_category = '$news_category', 
                news_description = '$news_description', date = '$date', image = '$image' WHERE id = $id";
    } else {
        $sql = "UPDATE new SET news_name = '$news_name', news_category = '$news_category', 
                news_description = '$news_description', date = '$date' WHERE id = $id";
    }

    if ($conn->query($sql)) {
        header("Location: allnews.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>



<?php include('includes/head.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php include('includes/header.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- Content Row -->
                    <div class="container">
                            <h2 class="mt-4">Edit News</h2>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="news_name">News Name:</label>
                                    <input type="text" class="form-control" id="news_name" name="news_name" 
                                        value="<?php echo htmlspecialchars($news['news_name']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="news_category">News Category:</label>
                                    <input type="text" class="form-control" id="news_category" name="news_category" 
                                        value="<?php echo htmlspecialchars($news['news_category']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="news_description">Description:</label>
                                    <textarea class="form-control" id="news_description" name="news_description" rows="4" required><?php echo htmlspecialchars($news['news_description']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" class="form-control" id="date" name="date" 
                                        value="<?php echo htmlspecialchars($news['date']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image:</label><br>
                                    <img src="uploads/<?php echo htmlspecialchars($news['image']); ?>" alt="Current Image" width="150">
                                    <input type="file" class="form-control-file mt-2" id="image" name="image">
                                </div>
                                <a class="btn btn-default" href="allnews.php">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                    </div>
                </div>

                        
<?php include('includes/footer.php'); ?>
<?php include('includes/javascript.php'); ?>