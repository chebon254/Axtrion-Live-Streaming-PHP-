<?php
session_start();
include('header.php');
include('Database/database.php');

if (isset($_GET['id'])) {
    $videoId = $_GET['id'];

    // Fetch short video details based on the ID
    $videoQuery = "SELECT * FROM short_videos WHERE id = $videoId";
    $videoResult = $conn->query($videoQuery);

    if ($videoResult->num_rows > 0) {
        $video = $videoResult->fetch_assoc();
        $videoPath = $video['file_path'];

        // Display the short video player and details
        echo '<main>';
        echo '<div class="shorts-container container">';
        
        echo '
        <div class="shorts-video">
            <video id="short-video" src="' . $videoPath . '" autoplay></video>  
            <div class="shorts-channel">
                <div class="top">
                    <div class="profile-image">
                        <img src="css/media/Images/profile.jpg" alt="Axtrion">
                    </div>
                    <div class="profile-name">
                        <span class="channel-name">@Dingdong</span>
                    </div>
                    <div class="follow-button">
                        <button id="playButton">Follow</button>
                    </div>
                </div>
                <div class="bottom">
                    <p>' . $video['title'] . '<span class="hashtags">#respect</span></p>
                </div>
            </div>
            <div class="shorts-control">
                <div class="shorts-ctrl-cell">
                    <span class="icon" tooltip="Like This">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </span>
                    <span class="text">10K</span>
                </div>
                <div class="shorts-ctrl-cell">
                    <span class="icon">
                        <i class="fa-solid fa-thumbs-down"></i>
                    </span>
                    <span class="text">2K</span>
                </div>
                <div class="shorts-ctrl-cell">
                    <button class="icon button-comment">
                        <i class="fa-solid fa-comment"></i>
                    </button>
                    <span class="text">223</span>
                </div>
                <div class="shorts-ctrl-cell">
                    <span class="icon">
                        <i class="fa-solid fa-share"></i>
                    </span>
                    <span class="text">Share</span>
                </div>
                <div class="shorts-ctrl-cell">
                    <span class="icon">
                        <i class="fa-solid fa-ellipsis"></i>
                    </span>
                </div>
            </div>
            <div class="shorts-comments">
                <div class="comments-title">
                    <span>Comments</span>
                    <button class="cancel-comment-section"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="comments-list">
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    <div class="left">
                        <img src="css\media\Images\profile.jpg" alt="">
                    </div>
                    <div class="right">
                        <form action="">
                            <div class="comment-form-control">
                                <input type="text" placeholder="Add areply...">
                            </div>
                            <div class="comment-form-control buttons">
                                <span class="cancel-comment-reply">cancel</span>
                                <button type="submit">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        ';
        
        // Fetch and display other short videos
        $otherShortVideosQuery = "SELECT * FROM short_videos WHERE id != $videoId";
        $otherShortVideosResult = $conn->query($otherShortVideosQuery);

        while ($otherVideo = $otherShortVideosResult->fetch_assoc()) {
            echo '
        <div class="shorts-video">
            <video id="short-video" src="' . $otherVideo['file_path'] . '" autoplay></video>  
            <div class="shorts-channel">
                <div class="top">
                    <div class="profile-image">
                        <img src="css/media/Images/profile.jpg" alt="Axtrion">
                    </div>
                    <div class="profile-name">
                        <span class="channel-name">@Dingdong</span>
                    </div>
                    <div class="follow-button">
                        <button id="playButton">Follow</button>
                    </div>
                </div>
                <div class="bottom">
                    <p>' . $otherVideo['title'] . '<span class="hashtags">#respect</span></p>
                </div>
            </div>
            <div class="shorts-control">
                <div class="shorts-ctrl-cell">
                    <span class="icon" tooltip="Like This">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </span>
                    <span class="text">10K</span>
                </div>
                <div class="shorts-ctrl-cell">
                    <span class="icon">
                        <i class="fa-solid fa-thumbs-down"></i>
                    </span>
                    <span class="text">2K</span>
                </div>
                <div class="shorts-ctrl-cell">
                    <button class="icon button-comment">
                        <i class="fa-solid fa-comment"></i>
                    </button>
                    <span class="text">223</span>
                </div>
                <div class="shorts-ctrl-cell">
                    <span class="icon">
                        <i class="fa-solid fa-share"></i>
                    </span>
                    <span class="text">Share</span>
                </div>
                <div class="shorts-ctrl-cell">
                    <span class="icon">
                        <i class="fa-solid fa-ellipsis"></i>
                    </span>
                </div>
            </div>
            <div class="shorts-comments">
                <div class="comments-title">
                    <span>Comments</span>
                    <button class="cancel-comment-section"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="comments-list">
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="left">
                            <img src="css\media\Images\profile.jpg" alt="">
                        </div>
                        <div class="right">
                            <div class="commentor">
                                <h4>@James234 <span class="date-of-comment">1 week ago</span></h4>
                                <p>She scored a 10 at "why we need to move out of America". By all means, goodbye and good luck!</p>
                                <div class="comment-interaction">
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-up"></i></button>
                                        <span>38K</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button><i class="fas fa-thumbs-down"></i></button>
                                        <span>3</span>
                                    </div>
                                    <div class="comm-inter-cell">
                                        <button class="reply-comment-button">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment-form">
                                <div class="left">
                                    <img src="css\media\Images\profile.jpg" alt="">
                                </div>
                                <div class="right">
                                    <form action="">
                                        <div class="comment-form-control">
                                            <input type="text" placeholder="Add a reply...">
                                        </div>
                                        <div class="comment-form-control buttons">
                                            <span class="cancel-comment-reply">cancel</span>
                                            <button type="submit">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    <div class="left">
                        <img src="css\media\Images\profile.jpg" alt="">
                    </div>
                    <div class="right">
                        <form action="">
                            <div class="comment-form-control">
                                <input type="text" placeholder="Add areply...">
                            </div>
                            <div class="comment-form-control buttons">
                                <span class="cancel-comment-reply">cancel</span>
                                <button type="submit">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        ';
        }

        echo '</div>';
        echo '</main>';
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
    var videos = document.querySelectorAll(".shorts-video video");

    var observerOptions = {
        root: null,
        rootMargin: "0px",
        threshold: 0.5 // Trigger when 50% of the video is visible
    };

    var videoObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
        if (entry.isIntersecting) {
            // Video is in the viewport
            entry.target.play();
        } else {
            // Video is out of the viewport
            entry.target.pause();
        }
        });
    }, observerOptions);

    videos.forEach(function (video) {
        // Pause the video initially
        video.pause();

        // Add click event listener to toggle play/pause
        video.closest('#short-video').addEventListener('click', function() {
        if (video.paused) {
            video.play();
        } else {
            video.pause();
        }
        });

        // Observe the video
        videoObserver.observe(video);
    });
    });
    const shortsVideos = document.querySelectorAll('.shorts-video');

        // Iterate through each shorts video
        shortsVideos.forEach(shortsVideo => {
            // Get the comment button and comment section for each video
            const commentButton = shortsVideo.querySelector('.button-comment');
            const commentsSection = shortsVideo.querySelector('.shorts-comments');
            const cancelButton = shortsVideo.querySelector('.cancel-comment-section');

            // Add click event listener to the comment button
            commentButton.addEventListener('click', () => {
                // Show the comments section
                commentsSection.style.display = 'block';
            });

            // Add click event listener to the cancel button
            cancelButton.addEventListener('click', () => {
                // Hide the comments section
                commentsSection.style.display = 'none';
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
        var replyButtons = document.querySelectorAll(".reply-comment-button");
        var cancelButtons = document.querySelectorAll(".cancel-comment-reply");

        // Function to handle Reply button click
        function handleReplyButtonClick(button) {
            var commentContainer = button.closest(".comment");
            var replyForm = commentContainer.querySelector(".reply-comment-form");

            // Set the display property to block
            replyForm.style.display = "block";
        }

        // Function to handle Cancel button click
        function handleCancelButtonClick(button) {
            var commentContainer = button.closest(".comment");
            var replyForm = commentContainer.querySelector(".reply-comment-form");

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