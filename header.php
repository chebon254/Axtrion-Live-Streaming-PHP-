<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Axtrion Live</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/library.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/shorts.css">
    <link rel="stylesheet" href="css/profile.css">

    <link rel="apple-touch-icon" sizes="180x180" href="css/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="css/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="css/favicon/favicon-16x16.png">
    <link rel="manifest" href="css/favicon/site.webmanifest">
    <link rel="mask-icon" href="css/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="css/favicon/favicon.ico">
    <meta name="msapplication-config" content="css/favicon/browserconfig.xml">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- == Font == -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- == Icons == -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" crossorigin="anonymous" />

</head>
<body>
    <nav>
        <div class="nav-container container flex fl-bt">
            <div class="logo">
                <a href="index.php">
                    <img src="css/media/Images/logo.png" alt="Axtrion">
                </a>
            </div>
            <div class="links flex fl-bt">
                <div class="nav-pg-link flex fl-bt">
                    <!-- <a href="#">Home</a>  -->
                </div>
                <div class="nav-ac-access flex fl-bt">
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['user_id'])) {
                    echo '
                    <a href="livestream.php">Live</a>
                    <a href="upload.php">Upload</a>
                    <div class="nav-ac-profile flex fl-bt">
                        <div class="notification-bell">
                            <div class="notifcation-status"></div>
                            <div class="bell">
                                <i class="fa-solid fa-bell"></i>
                            </div>
                        </div>
                        <div class="profile-drop">
                            <button class="dropbtn profile">
                                <img src="css/media/Images/profile.jpg" alt="">
                            </button>
                            <div class="dropdown-content">
                                <a href="account.php"><i class="fa-solid fa-user"></i> Account</a>
                                <a href="settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                            </div>
                        </div>
                    </div>';
                } else {
                    echo '<a href="login.php">Login</a>
                    <a href="register.php">Register</a>';
                }
                ?>
                </div>
            </div>
        </div>
    </nav>