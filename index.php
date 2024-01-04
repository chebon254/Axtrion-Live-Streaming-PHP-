<?php
session_start();
include('header.php');
include('Database/database.php');
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );

    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) {
        $string = array_slice($string, 0, 1);
    }

    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>
<style>
    video{
        height: 498px;
        aspect-ratio: 16/9;
        width: 100%;
        vertical-align: middle;
        border-radius: 10px;
    }
</style>
<main>
    <div class="home-container container flex flex-start">
        <div class="side-nav">
            <a href="#">
                <span><i class="fa-solid fa-house"></i></span>
                <br>
                <span>Home</span>
            </a>
            <a href="#">
                <span><i class="fa-solid fa-film"></i></span>
                <br>
                <span>Shorts</span>
            </a>
        </div>
        <div class="home-videos">
            <div class="video-content flex flex-wrap">
                <?php
                // Fetch and display long videos
                $longVideosQuery = "SELECT * FROM long_videos";
                $longVideosResult = $conn->query($longVideosQuery);

                while ($video = $longVideosResult->fetch_assoc()) {
                    echo '<div class="video">';
                    echo '<a href="video.php?id=' . $video['id'] . '" class="thumbnail">';
                    echo '<img src="' . $video['thumbnail_path'] . '" alt="' . $video['title'] . '">';
                    echo '<div class="video-duration"><span>3:56</span></div>';
                    echo '</a>';
                    echo '<div class="video-detail flex flex-start">';
                    echo '<div class="left">';
                    echo '<img src="css/media/Images/profile.jpg" alt="">';
                    echo '</div>';
                    echo '<div class="right">';
                    echo '<h3>' . $video['title'] . '</h3>';
                    echo '<span class="channel-name">Kelvin</span>';
                    echo '<div class="time-views">';
                    // echo '<span class="views">' . $video['views'] . ' Views</span>';
                    echo '<span class="time-uploaded"> ' . time_elapsed_string($video['created_at']) . '</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="shorts-content">
                <div class="shorts-content-title">
                    <h4><span><i class="fa-solid fa-film"></i></span> Shorts</h4>
                </div>
                <div class="short-contents-videos flex">
                    <?php
                    // Fetch and display short videos
                    $shortVideosQuery = "SELECT * FROM short_videos";
                    $shortVideosResult = $conn->query($shortVideosQuery);

                    while ($short = $shortVideosResult->fetch_assoc()) {
                        echo '<div class="short-video">';
                        // Use a placeholder image for the snapshot
                        echo '<a href="shorts_videos.php?id=' . $short['id'] . '" class="thumbnail">';
                        echo '<video style="pointet-events: none !important;" src="' . $short['file_path'] . '" alt="' . $short['title'] . '"></video>';
                        echo '</a>';
                        echo '<div class="short-details">';
                        echo '<h3>' . $short['title'] . '</h3>';
                        echo '<span>2 views</span>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="shorts-content-title">
                    <a href="shorts_videos.php" class="see-all-link">See All</a>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/script.js"></script>
<?php
include('footer.php');
?>