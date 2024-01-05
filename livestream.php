<?php
session_start();

// Include header and database connection code
include('header.php');
include('Database/database.php');
require_once __DIR__ . '/vendor/autoload.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$options = [
    'cluster' => 'eu',
    'useTLS' => true,
];

$pusher = new Pusher\Pusher(
    'b86ce835537f24dea392',
    '7d473086a3b71ed3df99',
    '1734865',
    $options
);

function generateToken($user_id) {
    // Use Pusher App Secret for token generation
    return md5('7d473086a3b71ed3df99' . $user_id);
}

// Check if it's a POST request and handle the action
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id']; // Get the user ID from the request

    // Determine if it's a request to start or end the live stream
    if (isset($_POST['action']) && $_POST['action'] === 'start') {
        // Generate a unique token for the user
        $token = generateToken($user_id);

        // Broadcast the live stream information
        $pusher->trigger('livestream', 'start', ['user_id' => $user_id, 'token' => $token]);

        echo json_encode(['token' => $token]);
    } elseif (isset($_POST['action']) && $_POST['action'] === 'end') {
        // Broadcast that the live stream has ended
        $pusher->trigger('livestream', 'end', ['user_id' => $user_id]);

        echo json_encode(['message' => 'Live stream ended']);
    } else {
        // Handle other actions or invalid requests
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Invalid action']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET requests, for example, you can just return an empty response
    http_response_code(200); // OK
    echo json_encode(['message' => 'GET request received']);
} else {
    // Handle other request methods
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method not allowed']);
}


?>
<style>
    button{
        padding: 5px 20px;
        margin: 5px 10px;
        cursor: pointer;
    }
</style>
<main>
    <h1>Livestream</h1>
    <button onclick="startLivestream()">Start Livestream</button>
    <button onclick="endLivestream()">End Livestream</button>

    <div id="livestream-container">
        <!-- This is where the livestream video will be displayed -->
        <video id="livestream-video" controls></video>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pusher-js@7.0.0/dist/web/pusher.min.js"></script>
<script>
    // Initialize Pusher
    const pusher = new Pusher('b86ce835537f24dea392', {
        cluster: 'eu',
        forceTLS: true
    });

    const channel = pusher.subscribe('livestream');

    // Function to start the livestream
    function startLivestream() {
        // Use the PHP variable for user ID
        const userId = <?php echo $user_id; ?>;

        // Make a POST request to your server to start the livestream
        $.post('livestream.php', { user_id: userId, action: 'start' }, function(response) {
            const livestreamToken = response.token;
            // Use the livestreamToken to initiate the livestream on the client side
            // You may use WebRTC or another streaming library for this purpose
        });
    }

    // Function to end the livestream
    function endLivestream() {
        // Use the PHP variable for user ID
        const userId = <?php echo $user_id; ?>;

        // Make a POST request to your server to end the livestream
        $.post('livestream.php', { user_id: userId, action: 'end' }, function(response) {
            // Handle the response as needed
        });
    }

    // Additional code for handling livestream events from Pusher
    channel.bind('start', function(data) {
        console.log('Livestream started:', data);
        // Handle the start event, e.g., display the livestream video
    });

    channel.bind('end', function(data) {
        console.log('Livestream ended:', data);
        // Handle the end event, e.g., stop displaying the livestream video
    });
</script>
<?php
include('footer.php');
?>