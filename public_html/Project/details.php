<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    // Comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}


$db = getDB();

// Retrieve dog ID from the URL parameter
$dog_id = isset($_GET['dog_id']) ? $_GET['dog_id'] : null;

echo "<div class='container mt-4 text-center'>";
if (!$dog_id) {
    // Handle the case where no dog ID is provided
    echo "<p class='text-danger'>Error: Dog ID not provided.</p>";
} else {
    // Fetch dog details from the database
    $stmt = $db->prepare("SELECT * FROM Dogs WHERE id = :dog_id");
    $stmt->bindValue(':dog_id', $dog_id, PDO::PARAM_INT);
    $stmt->execute();
    $dogDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dogDetails) {
        // Redirect back to the list page with a flash message for invalid ID
        flash("Invalid Dog ID", "danger");
        header("Location: home.php"); 
        exit();
    }

    // Display dog details with styling
    echo "<h2 class='mb-4'>Dog Details</h2>";
    echo "<img src='{$dogDetails['image_url']}' class='img-fluid rounded' alt='Dog Image' style='max-width: 400px;'>";
    echo "<div class='card mt-4' style='width: 18rem; margin: 0 auto;'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Name: {$dogDetails['name']}</h5>";
    echo "<p class='card-text'>Breed: {$dogDetails['breed_name']}</p>";
    echo "<p class='card-text'>HP: {$dogDetails['hp']}</p>";
    echo "<p class='card-text'>Attack: {$dogDetails['attack']}</p>";
    echo "<p class='card-text'>Defense: {$dogDetails['defense']}</p>";

    // Add Edit and Delete buttons
    echo "<div class='mt-4'>";
    echo "<a href='#' class='btn btn-warning mx-2'>Edit</a>";
    echo "<a href='#' class='btn btn-danger mx-2'>Delete</a>";
    echo "</div>";

    echo "</div>";
    echo "</div>";
}
echo "</div>";

require(__DIR__ . "/../../partials/flash.php");

?>