<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

// Check if a user_id is provided in the URL
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Get the username for the provided user_id
    $db = getDB();
    $usernameStmt = $db->prepare("SELECT username FROM Users WHERE id = :user_id");
    $usernameStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $usernameStmt->execute();
    $userData = $usernameStmt->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        $username = $userData['username'];

        // Fetch the original total count without filters
        $dogsCountStmt = $db->prepare("SELECT COUNT(*) as total_count FROM Dogs WHERE user_id = :user_id");
        $dogsCountStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $dogsCountStmt->execute();
        $dogsCountResult = $dogsCountStmt->fetch(PDO::FETCH_ASSOC);
        $totalCount = $dogsCountResult['total_count'];

        // Filter variables
        $filterName = isset($_GET['filter_name']) ? $_GET['filter_name'] : '';
        $filterLimit = isset($_GET['filter_limit']) ? $_GET['filter_limit'] : 10;
        $filterLimit = max(1, min($filterLimit, 100));

        // SQL query with filters and user ID condition
        $dogsStmt = $db->prepare("SELECT * FROM Dogs 
                                  WHERE user_id = :user_id 
                                  AND name LIKE :filterName 
                                  LIMIT :filterLimit");
        $dogsStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $dogsStmt->bindValue(':filterName', '%' . $filterName . '%', PDO::PARAM_STR);
        $dogsStmt->bindValue(':filterLimit', $filterLimit, PDO::PARAM_INT);
        $dogsStmt->execute();
        $dogs = $dogsStmt->fetchAll(PDO::FETCH_ASSOC);

        // Display the username, total count, and inventory header
        echo "<h2>{$username}'s Profile (Total: {$totalCount}, Showing " . count($dogs) . " with Filters)</h2>";

        // Get additional user information
        $userInfoStmt = $db->prepare("SELECT username, email, created FROM Users WHERE id = :user_id");
        $userInfoStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $userInfoStmt->execute();
        $userInfo = $userInfoStmt->fetch(PDO::FETCH_ASSOC);

        if ($userInfo) {
            $email = $userInfo['email'];
            $created = $userInfo['created'];

            echo "<p>Email: {$email}</p>";
            echo "<p>Account Created: " . date("F j, Y", strtotime($created)) . "</p>";

        } else {
            // Display a message if the user with the specified ID is not found
            echo "<p>User not found.</p>";
        }

        // Display the form for filtering Dogemon by name
        echo "<form method='get' action=''>";
        echo "<label for='filter_name'>Filter by Name:</label>";
        echo "<input type='text' name='filter_name' value='{$filterName}' placeholder='Enter dog name'>";

        echo "<label for='filter_limit'>Limit Records (1-100):</label>";
        echo "<input type='number' name='filter_limit' value='{$filterLimit}' min='1' max='100'>";

        echo "<input type='hidden' name='user_id' value='{$user_id}'>"; // Preserve user_id in the form

        echo "<button type='submit'>Apply Filters</button>";
        echo "</form>";

        if (empty($dogs)) {
            // Display a message if no dogs match the filters
            echo "<p>No dogs found with the specified filters.</p>";
        } else {
            // Display the dogs in a card format
            echo "<div class='row'>";
            foreach ($dogs as $dog) {
                echo "<div class='col-md-6 col-lg-4 col-xl-3 mb-4'>";
                echo "<div class='card'>";
                echo "<img src='{$dog['image_url']}' class='card-img-top img-fluid' alt='Dog Image'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title text-center'>Name: {$dog['name']}</h5>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        }
    } else {
        // Display a message if the user with the specified ID is not found
        echo "<p>User not found.</p>";
    }
} else {
    // Display a message if no user_id is provided in the URL
    echo "<p>No user ID provided.</p>";
}

require_once(__DIR__ . "/../../../partials/flash.php");
?>