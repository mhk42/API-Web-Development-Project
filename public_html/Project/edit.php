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

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $newName = isset($_POST['new_name']) ? trim($_POST['new_name']) : "";

        // Check if the user already has a dog with the same name
        $userId = get_user_id();
        $checkNameStmt = $db->prepare("SELECT id FROM Dogs WHERE user_id = :user_id AND name = :new_name AND id != :dog_id");
        $checkNameStmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $checkNameStmt->bindValue(':new_name', $newName, PDO::PARAM_STR);
        $checkNameStmt->bindValue(':dog_id', $dog_id, PDO::PARAM_INT);
        $checkNameStmt->execute();
        $existingDog = $checkNameStmt->fetch(PDO::FETCH_ASSOC);

        if ($existingDog) {
            // Display a warning message if the name is already taken
            flash("Dog name is already taken by another dog of yours!", "warning");
        } else {
            // Update the dog's name in the database
            $updateStmt = $db->prepare("UPDATE Dogs SET name = :new_name WHERE id = :dog_id");
            $updateStmt->bindValue(':new_name', $newName, PDO::PARAM_STR);
            $updateStmt->bindValue(':dog_id', $dog_id, PDO::PARAM_INT);
            $updateStmt->execute();

            // Display a success message
            flash("Dog name updated successfully!", "success");
        }
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

    // Display form for editing dog's name
    echo "<form method='post' class='mt-4' style='background-color: transparent; border: none; box-shadow: none;'>";
    echo "<label for='new_name'>Edit Dog Name:</label>";
    echo "<input type='text' name='new_name' id='new_name' value='{$dogDetails['name']}' required>";
    echo "<button type='submit' class='btn btn-primary'>Save Name</button>";
    echo "</form>";
}

echo "</div>";

require(__DIR__ . "/../../partials/flash.php");
?>