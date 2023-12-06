<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    // Log session data if the user is logged in
    error_log("Session data: " . var_export($_SESSION, true));
}

$db = getDB();

// Retrieve dog ID from the URL parameter
$dog_id = isset($_GET['dog_id']) ? $_GET['dog_id'] : null;

echo "<div class='container mt-4 text-center'>";
if (!$dog_id) {
    // Handle the case where no dog ID is provided
    flash("Dog ID not Provided", "danger");
} else {
    // Check if the logged-in user has permission to view the dog's details
    $user_id = get_user_id(); // Assuming a function like get_user_id() is defined

    // Query to check if the user has admin permissions
    $adminCheckStmt = $db->prepare("SELECT * FROM UserRoles WHERE user_id = :user_id AND role_id = 1");
    $adminCheckStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $adminCheckStmt->execute();
    $isAdmin = $adminCheckStmt->fetch(PDO::FETCH_ASSOC);

    if (!$isAdmin) {
        // If the user is not an admin, check ownership
        $stmt = $db->prepare("SELECT * FROM Dogs WHERE id = :dog_id AND user_id = :user_id");
        $stmt->bindValue(':dog_id', $dog_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $dogDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dogDetails) {
            flash("Invalid Dog ID or You don't have permission to view to this dog.", "danger");
            header("Location: home.php"); 
            exit();
        }
    } else {
        // If the user is an admin, retrieve dog details without checking ownership
        $stmt = $db->prepare("SELECT * FROM Dogs WHERE id = :dog_id");
        $stmt->bindValue(':dog_id', $dog_id, PDO::PARAM_INT);
        $stmt->execute();
        $dogDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dogDetails) {
            flash("Invalid Dog ID.", "danger");
            header("Location: home.php"); 
            exit();
        }
    }

    echo "<h2 class='mb-4'>Dog Details</h2>";
    echo "<img src='{$dogDetails['image_url']}' class='img-fluid rounded' alt='Dog Image' style='max-width: 400px;'>";
    echo "<div class='card mt-4' style='width: 18rem; margin: 0 auto;'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Name: {$dogDetails['name']}</h5>";
    echo "<p class='card-text'>Breed: {$dogDetails['breed_name']}</p>";
    echo "<p class='card-text'>HP: {$dogDetails['hp']}</p>";
    echo "<p class='card-text'>Attack: {$dogDetails['attack']}</p>";
    echo "<p class='card-text'>Defense: {$dogDetails['defense']}</p>";
    echo "<div class='mt-4'>";
    echo "<a href='edit.php?dog_id={$dog_id}' class='btn btn-warning mx-2' style='min-width: 80px;'>Edit</a>";
    echo "<form action='delete.php' method='POST' style='display:inline; background-color: transparent; border: none; box-shadow: none;'>";
    echo "<input type='hidden' name='dog_id' value='{$dog_id}'>";
    echo "<button type='submit' class='btn btn-danger mx-2' style='min-width: 80px; border: none;'>Delete</button>";
    echo "</form>";
    echo "</div>";

    echo "</div>";
    echo "</div>";
}

echo "</div>";

require(__DIR__ . "/../../partials/flash.php");
?>