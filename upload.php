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

// Process video details
$title = $_POST['title'];
$description = $_POST['description'];

// Process video file
$video_file_name = $_FILES['video_file']['name'];
$video_file_temp = $_FILES['video_file']['tmp_name'];
$video_file_path = 'Database/uploads/videos/' . $video_file_name;

move_uploaded_file($video_file_temp, $video_file_path);

// Process thumbnail file
$thumbnail_file_name = $_FILES['thumbnail_file']['name'];
$thumbnail_file_temp = $_FILES['thumbnail_file']['tmp_name'];
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

// Close the database connection
$conn->close();
?>

<main>
    <div class="container">
        <div class="form">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-control">
                    <h1>Upload</h1>
                    <p>Upload your Content.</p>
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
                    <label for="video_file">Video File</label>
                    <br>
                    <br>
                    <input type="file" name="video_file" accept="video/*" placeholder="Enter Video title..." required>
                </div>
                <div class="form-control">
                    <label for="thumbnail_file">Video Thumbnail</label>
                    <br>
                    <br>
                    <input type="file" name="thumbnail_file" id="video_thumbnail" accept="image/*" <?php if (isset($video_duration) && $video_duration <= 60) echo 'style="display: none;"'; ?> required>
                </div>
                <div class="form-control">
                    <button type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="js/script.js"></script>
<script>
    // Function to detect video duration and toggle thumbnail input visibility
    var video_duration;
    document.getElementById('video_file').addEventListener('change', function () {
        var video = document.createElement('video');
        video.preload = 'metadata';
        video.onloadedmetadata = function () {
            window.video_duration = video.duration;
            var thumbnailInput = document.getElementById('video_thumbnail');
            if (video_duration > 60) {
                thumbnailInput.style.display = 'block';
            } else {
                thumbnailInput.style.display = 'none';
            }
        };
        video.src = URL.createObjectURL(this.files[0]);
    });
</script>

<?php
include('footer.php');
?>
