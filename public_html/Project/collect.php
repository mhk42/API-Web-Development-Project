<?php
require(__DIR__ . "/../../partials/nav.php");

if (isset($_POST["collect"])) {
    // Retrieve dog information from the form
    $dogName = se($_POST, "dog_name", "", false);
    $breedName = se($_POST, "breed_name", "Unknown", false);
    $hp = se($_POST, "hp", 0, false);
    $attack = se($_POST, "attack", 0, false);
    $defense = se($_POST, "defense", 0, false);
    $imageUrl = se($_POST, "image_url", "", false); // Add this line to retrieve the image URL

    // TODO: Add validation if needed

    // Insert data into the "Dogs" table
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO Dogs (name, breed_name, hp, attack, defense, image_url) VALUES (:name, :breed_name, :hp, :attack, :defense, :image_url)");

    try {
        // Add the image URL to the bindings
        $stmt->execute([":name" => $dogName, ":breed_name" => $breedName, ":hp" => $hp, ":attack" => $attack, ":defense" => $defense, ":image_url" => $imageUrl]);
        flash("Dog collected successfully!", "success");
    } catch (PDOException $e) {
        // Handle any database errors
        flash("Error collecting dog. Please try again.", "danger");
    }
}

header("Location: Home.php");
exit();
?>