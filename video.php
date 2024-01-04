<?php
session_start();
include('header.php');
include('Database/database.php');
if (isset($_GET['id'])) {
    $videoId = $_GET['id'];

    // Fetch video details based on the ID
    $videoQuery = "SELECT * FROM long_videos WHERE id = $videoId";
    $videoResult = $conn->query($videoQuery);

    if ($videoResult->num_rows > 0) {
        $video = $videoResult->fetch_assoc();
        $videoPath = $video['file_path'];

        // Display the video player and details
        echo '
        <main>
            <div class="video-container container">
                <div class="watch-video">
                    <div class="watch-video-container">
                        <video src="' . $videoPath . '" controls loop autoplay></video>
                    </div>
                    <div class="watch-video-detail">
                        <div class="top-watch-detail flex">
                            <h2>'. $video['title'] . '</h2>
                            <div class="video-account flex">
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
                        </div>
                        <div class="watch-video-ownership flex">
                            <img src="css/media/Images/profile.jpg" alt="">
                            <span>Dennis</span>
                            <button>Follow</button>
                        </div>
                        <div class="watch-video-desc">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum corrupti ratione impedit voluptatibus necessitatibus commodi repudiandae labore ipsa quos nemo, minima rem ut consequatur quidem quisquam illo modi est. Officiis?</p>
                        </div>
                        <div class="watch-video-comments">
                            <div class="watch-video-comments-title">
                                <span>Comments</span>
                                <span></span>
                            </div>
                            <div class="watch-video-comment-form">
                                <div class="watch-video-left">
                                    <img src="css/media/Images/profile.jpg" alt="">
                                </div>
                                <div class="watch-video-right">
                                    <form action="">
                                        <div class="watch-video-comment-form-control">
                                            <input type="text" placeholder="Add areply...">
                                        </div>
                                        <div class="watch-video-comment-form-control buttons">
                                            <span class="watch-video-cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="watch-video-comments-list">
                                <div class="watch-video-comment">
                                    <div class="watch-video-left">
                                        <img src="css/media/Images/profile.jpg" alt="">
                                    </div>
                                    <div class="watch-video-right">
                                        <div class="watch-video-commentor">
                                            <h4>@James234 <span class="watch-video-date-of-comment">1 week ago</span></h4>
                                            <p>She scored a 10 at "why we need to move out of America".watch-video- By all means, goodbye and good luck!</p>
                                            <div class="watch-video-comment-interaction">
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-up"></i></button>
                                                    <span>38K</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-down"></i></button>
                                                    <span>3</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button class="watch-video-reply-comment-button">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="watch-video-reply-comment-form">
                                            <div class="watch-video-left">
                                                <img src="css/media/Images/profile.jpg" alt="">
                                            </div>
                                            <div class="watch-video-right">
                                                <form action="">
                                                    <div class="watch-video-comment-form-control">
                                                        <input type="text" placeholder="Add a reply...">
                                                    </div>
                                                    <div class="watch-video-comment-form-control buttons">
                                                        <span class="watch-video-cancel-comment-reply">cancel</span>
                                                        <button type="submit">Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="watch-video-comment">
                                    <div class="watch-video-left">
                                        <img src="css/media/Images/profile.jpg" alt="">
                                    </div>
                                    <div class="watch-video-right">
                                        <div class="watch-video-commentor">
                                            <h4>@James234 <span class="watch-video-date-of-comment">1 week ago</span></h4>
                                            <p>She scored a 10 at "why we need to move out of America".watch-video- By all means, goodbye and good luck!</p>
                                            <div class="watch-video-comment-interaction">
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-up"></i></button>
                                                    <span>38K</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-down"></i></button>
                                                    <span>3</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button class="watch-video-reply-comment-button">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="watch-video-reply-comment-form">
                                            <div class="watch-video-left">
                                                <img src="css/media/Images/profile.jpg" alt="">
                                            </div>
                                            <div class="watch-video-right">
                                                <form action="">
                                                    <div class="watch-video-comment-form-control">
                                                        <input type="text" placeholder="Add a reply...">
                                                    </div>
                                                    <div class="watch-video-comment-form-control buttons">
                                                        <span class="watch-video-cancel-comment-reply">cancel</span>
                                                        <button type="submit">Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="watch-video-comment">
                                    <div class="watch-video-left">
                                        <img src="css/media/Images/profile.jpg" alt="">
                                    </div>
                                    <div class="watch-video-right">
                                        <div class="watch-video-commentor">
                                            <h4>@James234 <span class="watch-video-date-of-comment">1 week ago</span></h4>
                                            <p>She scored a 10 at "why we need to move out of America".watch-video- By all means, goodbye and good luck!</p>
                                            <div class="watch-video-comment-interaction">
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-up"></i></button>
                                                    <span>38K</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-down"></i></button>
                                                    <span>3</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button class="watch-video-reply-comment-button">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="watch-video-reply-comment-form">
                                            <div class="watch-video-left">
                                                <img src="css/media/Images/profile.jpg" alt="">
                                            </div>
                                            <div class="watch-video-right">
                                                <form action="">
                                                    <div class="watch-video-comment-form-control">
                                                        <input type="text" placeholder="Add a reply...">
                                                    </div>
                                                    <div class="watch-video-comment-form-control buttons">
                                                        <span class="watch-video-cancel-comment-reply">cancel</span>
                                                        <button type="submit">Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="watch-video-comment">
                                    <div class="watch-video-left">
                                        <img src="css/media/Images/profile.jpg" alt="">
                                    </div>
                                    <div class="watch-video-right">
                                        <div class="watch-video-commentor">
                                            <h4>@James234 <span class="watch-video-date-of-comment">1 week ago</span></h4>
                                            <p>She scored a 10 at "why we need to move out of America".watch-video- By all means, goodbye and good luck!</p>
                                            <div class="watch-video-comment-interaction">
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-up"></i></button>
                                                    <span>38K</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-down"></i></button>
                                                    <span>3</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button class="watch-video-reply-comment-button">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="watch-video-reply-comment-form">
                                            <div class="watch-video-left">
                                                <img src="css/media/Images/profile.jpg" alt="">
                                            </div>
                                            <div class="watch-video-right">
                                                <form action="">
                                                    <div class="watch-video-comment-form-control">
                                                        <input type="text" placeholder="Add a reply...">
                                                    </div>
                                                    <div class="watch-video-comment-form-control buttons">
                                                        <span class="watch-video-cancel-comment-reply">cancel</span>
                                                        <button type="submit">Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="watch-video-comment">
                                    <div class="watch-video-left">
                                        <img src="css/media/Images/profile.jpg" alt="">
                                    </div>
                                    <div class="watch-video-right">
                                        <div class="watch-video-commentor">
                                            <h4>@James234 <span class="watch-video-date-of-comment">1 week ago</span></h4>
                                            <p>She scored a 10 at "why we need to move out of America".watch-video- By all means, goodbye and good luck!</p>
                                            <div class="watch-video-comment-interaction">
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-up"></i></button>
                                                    <span>38K</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-down"></i></button>
                                                    <span>3</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button class="watch-video-reply-comment-button">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="watch-video-reply-comment-form">
                                            <div class="watch-video-left">
                                                <img src="css/media/Images/profile.jpg" alt="">
                                            </div>
                                            <div class="watch-video-right">
                                                <form action="">
                                                    <div class="watch-video-comment-form-control">
                                                        <input type="text" placeholder="Add a reply...">
                                                    </div>
                                                    <div class="watch-video-comment-form-control buttons">
                                                        <span class="watch-video-cancel-comment-reply">cancel</span>
                                                        <button type="submit">Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="watch-video-comment">
                                    <div class="watch-video-left">
                                        <img src="css/media/Images/profile.jpg" alt="">
                                    </div>
                                    <div class="watch-video-right">
                                        <div class="watch-video-commentor">
                                            <h4>@James234 <span class="watch-video-date-of-comment">1 week ago</span></h4>
                                            <p>She scored a 10 at "why we need to move out of America".watch-video- By all means, goodbye and good luck!</p>
                                            <div class="watch-video-comment-interaction">
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-up"></i></button>
                                                    <span>38K</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-down"></i></button>
                                                    <span>3</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button class="watch-video-reply-comment-button">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="watch-video-reply-comment-form">
                                            <div class="watch-video-left">
                                                <img src="css/media/Images/profile.jpg" alt="">
                                            </div>
                                            <div class="watch-video-right">
                                                <form action="">
                                                    <div class="watch-video-comment-form-control">
                                                        <input type="text" placeholder="Add a reply...">
                                                    </div>
                                                    <div class="watch-video-comment-form-control buttons">
                                                        <span class="watch-video-cancel-comment-reply">cancel</span>
                                                        <button type="submit">Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="watch-video-comment">
                                    <div class="watch-video-left">
                                        <img src="css/media/Images/profile.jpg" alt="">
                                    </div>
                                    <div class="watch-video-right">
                                        <div class="watch-video-commentor">
                                            <h4>@James234 <span class="watch-video-date-of-comment">1 week ago</span></h4>
                                            <p>She scored a 10 at "why we need to move out of America".watch-video- By all means, goodbye and good luck!</p>
                                            <div class="watch-video-comment-interaction">
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-up"></i></button>
                                                    <span>38K</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button><i class="fas fa-thumbs-down"></i></button>
                                                    <span>3</span>
                                                </div>
                                                <div class="watch-video-comm-inter-cell">
                                                    <button class="watch-video-reply-comment-button">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="watch-video-reply-comment-form">
                                            <div class="watch-video-left">
                                                <img src="css/media/Images/profile.jpg" alt="">
                                            </div>
                                            <div class="watch-video-right">
                                                <form action="">
                                                    <div class="watch-video-comment-form-control">
                                                        <input type="text" placeholder="Add a reply...">
                                                    </div>
                                                    <div class="watch-video-comment-form-control buttons">
                                                        <span class="watch-video-cancel-comment-reply">cancel</span>
                                                        <button type="submit">Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        ';
    } else {
        // Video not found, handle the error (e.g., redirect to an error page)
        header("Location: error.php");
        exit();
    }
} else {
    // ID not set, handle the error or redirect to another page
    header("Location: error.php");
    exit();
}
?>
<script src="js/script.js"></script>
<script>
        document.addEventListener("DOMContentLoaded", function () {
          var replyButtons = document.querySelectorAll(".watch-video-reply-comment-button");
          var cancelButtons = document.querySelectorAll(".watch-video-cancel-comment-reply");
    
          // Function to handle Reply button click
          function handleReplyButtonClick(button) {
            var commentContainer = button.closest(".watch-video-comment");
            var replyForm = commentContainer.querySelector(".watch-video-reply-comment-form");
    
            // Set the display property to block
            replyForm.style.display = "block";
          }
    
          // Function to handle Cancel button click
          function handleCancelButtonClick(button) {
            var commentContainer = button.closest(".watch-video-comment");
            var replyForm = commentContainer.querySelector(".watch-video-reply-comment-form");
    
            // Set the display property to none
            replyForm.style.display = "none";
          }
    
          replyButtons.forEach(function (button) {
            button.addEventListener("click", function () {
              handleReplyButtonClick(button);
            });
          });
    
          cancelButtons.forEach(function (button) {
            button.addEventListener("click", function () {
              handleCancelButtonClick(button);
            });
          });
        });
      </script>
<?php
include('footer.php');
?>