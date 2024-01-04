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

// Fetch user's videos
$videos_query = "SELECT * FROM long_videos WHERE user_id = $user_id";
$videos_result = $conn->query($videos_query);

// Fetch user's short videos
$shorts_query = "SELECT * FROM short_videos WHERE user_id = $user_id";
$shorts_result = $conn->query($shorts_query);
?>
<style>
    .short-video video{
        width: 100%;
        background-color: #000000;
        aspect-ratio: 9/16;
    }
</style>
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
                    // Display long videos
                    while ($video = $videos_result->fetch_assoc()) {
                        echo '<div class="video">';
                        echo '<div class="thumbnail account">';
                        echo '<img src="' . $video['thumbnail_path'] . '" alt="' . $video['title'] . '">';
                        echo '<div class="play-button flex">';
                        echo '<i class="fa-solid fa-play"></i>';
                        // echo '<span>' . $video['views'] . ' Views</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="account-short-details flex">';
                        echo '<div class="card">';
                        echo '<span class="icon">';
                        echo '<i class="fa-solid fa-thumbs-up"></i>';
                        echo '</span>';
                        // echo '<span class="text">' . $video['likes'] . '</span>';
                        echo '</div>';
                        echo '<div class="card">';
                        echo '<span class="icon">';
                        echo '<i class="fa-solid fa-comment"></i>';
                        echo '</span>';
                        // echo '<span class="text">' . $video['comments'] . '</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div id="profile-acc-shorts" class="profile-acc-tab-content">
                <div class="shorts-content">
                    <div class="short-contents-videos flex">
                    <?php
                    // Display short videos
                    while ($short = $shorts_result->fetch_assoc()) {
                        echo '<div class="short-video">';
                        echo '<div class="short-thumbnail account">';
                        echo '<video width="320" height="240" controls>';
                        echo '<source src="' . $short['file_path'] . '" type="video/mp4">';
                        echo '</video>';
                        echo '<div class="play-button flex">';
                        echo '<i class="fa-solid fa-play"></i>';
                        // echo '<span>' . $short['views'] . ' Views</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="account-short-details flex">';
                        echo '<div class="card">';
                        echo '<span class="icon">';
                        echo '<i class="fa-solid fa-thumbs-up"></i>';
                        echo '</span>';
                        // echo '<span class="text">' . $short['likes'] . '</span>';
                        echo '</div>';
                        echo '<div class="card">';
                        echo '<span class="icon">';
                        echo '<i class="fa-solid fa-comment"></i>';
                        echo '</span>';
                        // echo '<span class="text">' . $short['comments'] . '</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
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