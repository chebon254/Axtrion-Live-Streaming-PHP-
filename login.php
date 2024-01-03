<?php
session_start();

include('header.php');
include('Database/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate the user credentials against the database
    $login_query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($login_query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables to remember the user
            $_SESSION['user_id'] = $user['id'];

            // Redirect to the homepage after successful login
            header("Location: index.php");
            exit();
        } else {
            // Incorrect password
            $_SESSION['login_message'] = 'Incorrect password. Please try again.';
        }
    } else {
        // User not found
        $_SESSION['login_message'] = 'User not found. Please check your email.';
    }

    // Redirect to the login page with an error message
    header("Location: login.php");
    exit();
}

// Close the database connection
$conn->close();
?>
<main>
    <div class="container">
        <div class="form">
            <form action="login.php" method="post">
                <div class="form-control">
                    <h1>Login</h1>
                    <p>Access your account.</p>
                    <?php
                    // Display registration success/error message
                    if (isset($_SESSION['registration_message'])) {
                        echo '<p class="error">' . $_SESSION['registration_message'] . '</p>';
                        unset($_SESSION['registration_message']);
                    }
                    ?>
                </div>
                <div class="form-control">
                    <label for="email">Email</label>
                    <br>
                    <br>
                    <input type="email" name="email" placeholder="Enter name">
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
                    <p class="account-related">Don't have an account?<a href="register.php">Create An Account</a></p>
                </div>
            </form>
        </div>
    </div>
</main>
<script src="js/script.js"></script>
<?php
include('footer.php');
?>