<?php
require(__DIR__ . "/../../partials/nav.php");


if (is_logged_in(true)) {
    // Comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}




if (isset($_POST["collect"])) {
    // Retrieve dog information from the form
    $dogName = se($_POST, "dog_name", "", false);
    $breedName = se($_POST, "breed_name", "Unknown", false);
    $hp = se($_POST, "hp", 0, false);
    $attack = se($_POST, "attack", 0, false);
    $defense = se($_POST, "defense", 0, false);
    $imageUrl = se($_POST, "image_url", "", false);
    $userId = get_user_id();

    // TODO: Add validation if needed

    // Insert data into the "Dogs" table
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO Dogs (user_id, name, breed_name, hp, attack, defense, image_url) VALUES (:user_id, :name, :breed_name, :hp, :attack, :defense, :image_url)");

    try {
        // Add the image URL to the bindings
        $stmt->execute([":user_id" => $userId, ":name" => $dogName, ":breed_name" => $breedName, ":hp" => $hp, ":attack" => $attack, ":defense" => $defense, ":image_url" => $imageUrl]);
        flash("Dog collected successfully!", "success");
    } catch (PDOException $e) {
        // Handle any database errors
        flash("Error collecting dog. Please try again.", "danger");
    }
}

header("Location: home.php");
exit();
?>