<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<?php
if (is_logged_in(true)) {
    // Comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

$db = getDB();

// Get the logged-in user's ID
$user_id = get_user_id();

// Filtering options
$filterName = isset($_GET['filter_name']) ? $_GET['filter_name'] : '';
$filterLimit = isset($_GET['filter_limit']) ? $_GET['filter_limit'] : 10;
// Ensure the limit is within the range of 1 to 100
$filterLimit = max(1, min($filterLimit, 100));

// SQL query with filters and user ID condition
$stmt = $db->prepare("SELECT * FROM Dogs WHERE user_id = :user_id AND name LIKE :filterName LIMIT :filterLimit");
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':filterName', '%' . $filterName . '%', PDO::PARAM_STR);
$stmt->bindValue(':filterLimit', $filterLimit, PDO::PARAM_INT);
$stmt->execute();
$dogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the collected dogs
echo "<h2>Your Dogemon Inventory</h2>";

// Display "No Dogemon available" and "Collect Dogemon" above filtering options
if (empty($dogs)) {
    echo "<p>No Dogemon available.</p>";
    echo "<a href='Dogemon.php' class='btn btn-primary'>Collect Dogemon</a>"; // Redirect to Dogemon.php when the button is clicked
} else {
    // Display filtering options only if there are dogs in the inventory
    echo "<form method='get' action=''>";
    echo "<label for='filter_name'>Filter by Name:</label>";
    echo "<input type='text' name='filter_name' value='{$filterName}' placeholder='Enter dog name'>";
    echo "<label for='filter_limit'>Limit Records (1-100):</label>";
    echo "<input type='number' name='filter_limit' value='{$filterLimit}' min='1' max='100'>";
    echo "<button type='submit'>Apply Filters</button>";
    echo "</form>";
}

if (!empty($dogs)) {
    echo "<div class='row'>";
    foreach ($dogs as $dog) {
        echo "<div class='col-md-6 col-lg-4 col-xl-3 mb-4'>";
        echo "<div class='card'>";
        echo "<img src='{$dog['image_url']}' class='card-img-top img-fluid' alt='Dog Image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title text-center'>Name: {$dog['name']}</h5>";

        // Buttons
        echo "<div class='text-center'>";
        echo "<a href='details.php?dog_id={$dog['id']}' class='btn btn-info btn-sm m-1'>Details</a>";
        echo "<a href='#' class='btn btn-warning btn-sm m-1'>Edit</a>";
        echo "<a href='#' class='btn btn-danger btn-sm m-1'>Delete</a>";
        echo "</div>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
}

require(__DIR__ . "/../../partials/flash.php");
?>