<?php
session_start();

// Include header and database connection code
include('header.php');
include('Database/database.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST["email"];

    // Check if the username is already taken
    $check_username_query = "SELECT * FROM users WHERE username = '$username'";
    $result_username = $conn->query($check_username_query);

    if ($result_username === FALSE) {
        die("Error executing the query: " . $conn->error);
    }

    if ($result_username->num_rows > 0) {
        $_SESSION['registration_message'] = 'Username is already taken. Please choose another.';
        header("Location: register.php");
        exit();
    }

    // Check if the email is already registered
    $check_email_query = "SELECT * FROM users WHERE email = '$email'";
    $result_email = $conn->query($check_email_query);

    if ($result_email->num_rows > 0) {
        $_SESSION['registration_message'] = 'Email is already registered. Please use a different email.';
        header("Location: register.php");
        exit();
    }

    // Upload profile image
    $target_directory = 'Database/uploads/profile_images/';
    $target_file = $target_directory . basename($_FILES["profile_image"]["name"]);

    // Check if the file is an image
    if (!getimagesize($_FILES["profile_image"]["tmp_name"])) {
        $_SESSION['registration_message'] = 'Please upload a valid image file.';
        header("Location: register.php");
        exit();
    }

    // Move the uploaded file to the specified directory
    if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
        $_SESSION['registration_message'] = 'Sorry, there was an error uploading your file.';
        header("Location: register.php");
        exit();
    }

    // Insert user data into the database
    $insert_user_query = "INSERT INTO users (full_name, username, password, email, profile_image) VALUES ('$full_name', '$username', '$password', '$email', '$target_file')";

    if ($conn->query($insert_user_query) === TRUE) {
        // Set a session variable to remember the user
        $_SESSION['user_id'] = $conn->insert_id;

        // Redirect to the homepage after successful registration
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['registration_message'] = 'Error registering user: ' . $conn->error;
        header("Location: register.php");
        exit();
    }
}
?>
<main>
    <div class="container">
        <div class="form">
            <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="form-control">
                    <h1>Register</h1>
                    <p>Create your account.</p>
                    <?php
                    // Display registration success/error message
                    if (isset($_SESSION['registration_message'])) {
                        echo '<p class="error">' . $_SESSION['registration_message'] . '</p>';
                        unset($_SESSION['registration_message']);
                    }
                    ?>
                </div>
                <div class="form-control">
                    <label for="username">UserName</label>
                    <br>
                    <br>
                    <input type="text" name="username" placeholder="John254">
                </div>
                <div class="form-control">
                    <label for="full_name">Full Name</label>
                    <br>
                    <br>
                    <input type="text" name="full_name" placeholder="John Kimana...">
                </div>
                <div class="form-control">
                    <label for="email">Email</label>
                    <br>
                    <br>
                    <input type="email" name="email" placeholder="johnkimana@gmail.com">
                </div>
                <div class="form-control">
                    <label for="profile_image">Profile Image</label>
                    <br>
                    <br>
                    <input type="file" name="profile_image" placeholder="">
                </div>
                <div class="form-control">
                    <label for="password">Password</label>
                    <br>
                    <br>
                    <input type="password" name="password" placeholder="Enter password">
                </div>
                <div class="form-control">
                    <button type="submit">Submit</button>
                </div>
                <div class="form-control">
                    <p class="account-related">Already have an account?<a href="login.php">Sign in</a></p>
                </div>
            </form>
        </div>
    </div>
</main>
<script src="js/script.js"></script>
<?php
include('footer.php');
?>