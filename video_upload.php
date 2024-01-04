<?php
session_start();

// Include header and database connection code
include('header.php');
include('Database/database.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $description = $_POST["description"];
    $title = $_POST["title"];
    
    // Long video upload
    $target_directory = 'Database/uploads/long_videos/';
    $target_file = $target_directory . basename($_FILES["video_file"]["name"]);
    $thumbnail_file = $target_directory . basename($_FILES["thumbnail_file"]["name"]);

    // Additional checks and validations can be added here

    // Move the uploaded files to the specified directory
    if (move_uploaded_file($_FILES["video_file"]["tmp_name"], $target_file) &&
        move_uploaded_file($_FILES["thumbnail_file"]["tmp_name"], $thumbnail_file)) {

        // Insert long video data into the database
        $insert_long_video_query = "INSERT INTO long_videos (user_id, title, description, file_path, thumbnail_path) VALUES ({$_SESSION['user_id']}, '$title', '$description', '$target_file', '$thumbnail_file')";

        if ($conn->query($insert_long_video_query) === TRUE) {
            $_SESSION['upload_message'] = '<p class="success">Long Video uploaded successfully!</p>';
        } else {
            $_SESSION['upload_message'] = '<p class="error">Error inserting data into the database: ' . $conn->error . '</p>';
        }

    } else {
        $_SESSION['upload_message'] = '<p class="error">Error moving uploaded files to the directory. Target File: ' . $target_file . ', Thumbnail File: ' . $thumbnail_file . '</p>';
    }

    // Redirect to the homepage after processing the upload
    header("Location: video_upload.php");
    exit();
}
?>

<main>
    <div class="container">
        <div class="form">
            <form action="video_upload.php" method="post" enctype="multipart/form-data">
                <div class="form-control">
                    <h1>Upload</h1>
                    <p>Upload your Content.</p>
                    <?php
                    // Display success or error message, if any
                    if (isset($_SESSION['upload_message'])) {
                        echo $_SESSION['upload_message'];
                        unset($_SESSION['upload_message']);
                    }
                    ?>
                </div>
                <div class="form-control">
                    <label for="title">Video Title</label>
                    <br>
                    <br>
                    <input type="text" name="title" placeholder="Enter Video title..." required>
                </div>
                <div class="form-control">
                    <label for="description">Video Description</label>
                    <br>
                    <br>
                    <textarea name="description" id="" placeholder="Video description..." required></textarea>
                </div>
                <div class="form-control">
                    <label for="video_file">Video File</label>
                    <br>
                    <br>
                    <input type="file" name="video_file" accept="video/*" placeholder="Enter Video title..." required>
                </div>
                <div class="form-control">
                    <label for="thumbnail_file">Video Thumbnail</label>
                    <br>
                    <br>
                    <input type="file" name="thumbnail_file" id="video_thumbnail" accept="image/*" required>
                </div>
                <div class="form-control">
                    <button type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="js/script.js"></script>

<?php
include('footer.php');
?>
