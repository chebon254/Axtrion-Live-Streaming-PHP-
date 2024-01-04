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
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Short video upload
    $target_directory = 'Database/uploads/short_videos/';
    $target_file = $target_directory . basename($_FILES["short_file"]["name"]);

    // Additional checks and validations can be added here

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["short_file"]["tmp_name"], $target_file)) {

        // Insert short video data into the database
        $insert_short_video_query = "INSERT INTO short_videos (user_id, title, description, file_path) VALUES ({$_SESSION['user_id']}, '$title', '$description', '$target_file')";

        if ($conn->query($insert_short_video_query) === TRUE) {
            $_SESSION['upload_message'] = '<p class="success">Short Video uploaded successfully!</p>';
        } else {
            $_SESSION['upload_message'] = '<p class="error">Error inserting data into the database: ' . $conn->error . '</p>';
        }

    } else {
        $_SESSION['upload_message'] = '<p class="error">Error moving uploaded file to the directory. Target File: ' . $target_file . '</p>';
    }

    // Redirect to the shorts page after processing the upload
    header("Location: shorts.php");
    exit();
}
?>

<main>
    <div class="container">
        <div class="form">
            <form action="shorts.php" method="post" enctype="multipart/form-data">
                <div class="form-control">
                    <h1>Upload Short Video</h1>
                    <p>Upload your short video content.</p>
                    <?php
                    // Display error message, if any
                    if (isset($_SESSION['upload_message'])) {
                        echo '<p class="error">' . $_SESSION['upload_message'] . '</p>';
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
                    <label for="short_file">Video File</label>
                    <br>
                    <br>
                    <input type="file" name="short_file" accept="video/*" required>
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
