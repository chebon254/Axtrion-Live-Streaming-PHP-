<?php
session_start();

// Include header and database connection code
include('header.php');
include('Database/database.php');
?>
<main>
    <div class="settings-container container">
        <h2>User Settings</h2>
        <div class="user-profile-settings">
            <img src="css/media/Images/profile.jpg" alt="Axtrion">
            <h2>Chebon kelvin</h2>
            <p>Welcome to my account</p>
        </div>
        <h2>Account Settings</h2>
        <div class="account-profile-settings">
            <p><strong>Name: </strong>kelvinchebon</p>
            <p><strong>Username: </strong>kelvin</p>
            <p><strong>Email: </strong>kelvinchebon90@gmail.com</p>
            <p><strong>Password: </strong>********</p>
        </div>
        <h2>Preference Settings</h2>
        <div class="account-profile-settings">
            <p><strong>Notifications: </strong><input type="checkbox"></p>
            <p><strong>Alert: </strong><input type="checkbox"></p>
            <p><strong>SMS: </strong><input type="checkbox"></p>
        </div>
    </div>
</main>
<script src="js/script.js"></script>
<?php
include('footer.php');
?>