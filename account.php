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

// Fetch user details from the database
$user_query = "SELECT * FROM users WHERE id = $user_id";
$user_result = $conn->query($user_query);

if ($user_result->num_rows == 1) {
    $user = $user_result->fetch_assoc();
} else {
    // User not found, redirect to login page
    header("Location: login.php");
    exit();
}

// Fetch user's uploaded videos
$uploaded_videos_query = "SELECT * FROM videos WHERE user_id = $user_id";
$uploaded_videos_result = $conn->query($uploaded_videos_query);

// Fetch user's shorts (videos under or equal to 60 seconds)
$shorts_videos_query = "SELECT * FROM videos WHERE user_id = $user_id AND duration <= 60";
$shorts_videos_result = $conn->query($shorts_videos_query);

// Fetch user's long videos (videos over 60 seconds)
$long_videos_query = "SELECT * FROM videos WHERE user_id = $user_id AND duration > 60";
$long_videos_result = $conn->query($long_videos_query);

// Close the database connection
$conn->close();
?>
<main>
    <div class="account-container container">
        <div class="account-info flex flex-start">
            <div class="acc-profile-image">
                <img src="css/media/Images/profile.jpg" alt="Axtrion">
            </div>
            <div class="account-profile-follow">
                <h2>
                    <?php echo $user['full_name']; ?>
                </h2>
                <p>
                    <?php echo $user['email']; ?>
                </p>
                <div class="following">
                    <div class="followers">
                        <span><strong>20M</strong> Followers</span>
                        <span><strong>20</strong> Following</span>
                    </div>
                </div>
                <button class="btn-edit-profile"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</button>
            </div>
        </div>
        <div class="profile-uploads">
            <div class="profile-acc-tabs">
                <div id="profile-acc-videos-tab" class="profile-acc-tab active" onclick="showProfileAccTab('videos')"><i
                        class="fa-solid fa-video"></i> Videos</div>
                <div id="profile-acc-shorts-tab" class="profile-acc-tab" onclick="showProfileAccTab('shorts')"><i
                        class="fa-solid fa-film"></i> Shorts</div>
                <div id="profile-acc-likes-tab" class="profile-acc-tab" onclick="showProfileAccTab('likes')"><i
                        class="fa-solid fa-thumbs-up"></i> Likes</div>
            </div>

            <div id="profile-acc-videos" class="profile-acc-tab-content active-profile-acc-content">
                <div class="video-content flex flex-wrap">
                <?php
                if ($long_videos_result->num_rows > 0) {
                    while ($long_video = $long_videos_result->fetch_assoc()) {
                        echo '<div class="video">
                        <div class="thumbnail account">
                            <img src="css/media/Images/Thumbnails/Dark Grey Minimalist Photo Travel YouTube Thumbnail.png"
                                alt="Axtrion">
                            <div class="play-button flex">
                                <i class="fa-solid fa-play"></i>
                                <span>12K</span>
                            </div>
                        </div>
                        <div class="account-short-details flex">
                            <div class="card">
                                <span class="icon">
                                    <i class="fa-solid fa-thumbs-up"></i>
                                </span>
                                <span class="text">
                                    12
                                </span>
                            </div>
                            <div class="card">
                                <span class="icon">
                                    <i class="fa-solid fa-comment"></i>
                                </span>
                                <span class="text">
                                    24
                                </span>
                            </div>
                        </div>
                    </div>';
                    }
                } else {
                    echo '<p>No long videos yet.</p>';
                }
                ?>
                </div>
            </div>

            <div id="profile-acc-shorts" class="profile-acc-tab-content">
                <div class="shorts-content">
                    <div class="short-contents-videos flex">
                    <?php
                    if ($shorts_videos_result->num_rows > 0) {
                        while ($short_video = $shorts_videos_result->fetch_assoc()) {
                            echo '<div class="short-video">
                                    <div class="short-thumbnail account">
                                        <img src="css/media/Images/Thumbnails/Shorts/apocalypse.jpg" alt="Axtrion">
                                        <div class="play-button flex">
                                            <i class="fa-solid fa-play"></i>
                                            <span>12K</span>
                                        </div>
                                    </div>
                                    <div class="account-short-details flex">
                                        <div class="card">
                                            <span class="icon">
                                                <i class="fa-solid fa-thumbs-up"></i>
                                            </span>
                                            <span class="text">
                                                12
                                            </span>
                                        </div>
                                        <div class="card">
                                            <span class="icon">
                                                <i class="fa-solid fa-comment"></i>
                                            </span>
                                            <span class="text">
                                                24
                                            </span>
                                        </div>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo '<p>No short videos yet.</p>';
                    }
                    ?>
                    </div>
                </div>
            </div>

            <div id="profile-acc-likes" class="profile-acc-tab-content">
                <!-- Likes Content Goes Here -->
                <p>Likes content goes here.</p>
            </div>
        </div>
    </div>
</main>
<script src="js/script.js"></script>
<script>
    function showProfileAccTab(tabName) {
        // Hide all tab contents
        var tabContents = document.getElementsByClassName('profile-acc-tab-content');
        for (var i = 0; i < tabContents.length; i++) {
            tabContents[i].classList.remove('active-profile-acc-content');
        }

        // Deactivate all tabs
        var tabs = document.getElementsByClassName('profile-acc-tab');
        for (var i = 0; i < tabs.length; i++) {
            tabs[i].classList.remove('active');
        }

        // Show the selected tab content
        document.getElementById('profile-acc-' + tabName).classList.add('active-profile-acc-content');

        // Activate the selected tab
        document.getElementById('profile-acc-' + tabName + '-tab').classList.add('active');
    }
</script>
<?php
include('footer.php');
?>