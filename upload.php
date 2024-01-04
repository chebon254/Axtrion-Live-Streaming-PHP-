<?php
session_start();

include('header.php');
include('Database/database.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process video details
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Process video file
    $video_file_name = isset($_FILES['video_file']['name']) ? $_FILES['video_file']['name'] : '';
    $video_file_temp = isset($_FILES['video_file']['tmp_name']) ? $_FILES['video_file']['tmp_name'] : '';
    $video_file_path = 'Database/uploads/videos/' . $video_file_name;

    move_uploaded_file($video_file_temp, $video_file_path);

    // Process thumbnail file
    $thumbnail_file_name = isset($_FILES['thumbnail_file']['name']) ? $_FILES['thumbnail_file']['name'] : '';
    $thumbnail_file_temp = isset($_FILES['thumbnail_file']['tmp_name']) ? $_FILES['thumbnail_file']['tmp_name'] : '';
    $thumbnail_file_path = 'Database/uploads/thumbnails/' . $thumbnail_file_name;

    move_uploaded_file($thumbnail_file_temp, $thumbnail_file_path);

    // Insert video details into the database
    $insert_video_query = "INSERT INTO videos (user_id, title, description, video_path, thumbnail_path) VALUES ($user_id, '$title', '$description', '$video_file_path', '$thumbnail_file_path')";

    if ($conn->query($insert_video_query) === TRUE) {
        // Video uploaded successfully
        $_SESSION['upload_message'] = 'Video uploaded successfully.';
        header("Location: upload.php");
        exit();
    } else {
        // Error uploading video
        $_SESSION['upload_message'] = 'Error uploading video: ' . $conn->error;
        header("Location: upload.php");
        exit();
    }
}

// Close the database connection
$conn->close();
?>

<main>
    <div class="upload_container flex flex-center container">
        <div class="choice_video_upload">
            <h3>Choose Upload Type</h3>
            <p>Upload a longer video or a short 60sec clip</p>
            <div class="upload_type flex ">
                <a href="video_upload.php">Video</a>
                <a href="shorts.php">Short</a>
            </div>
        </div>
    </div>
</main>

<script src="js/script.js"></script>

<?php
include('footer.php');
?>
