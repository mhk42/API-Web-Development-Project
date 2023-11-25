<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    // Comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

//mhk42, 11/24/2023
//data from an API is mapped to a database table named Dogs
//The code ensures that duplicate entries are not inserted into the table by checking the existence of a dog with the same name for the given user
//and if a duplicate is found, an error message is displayed
if (isset($_POST["collect"])) {
    $dogName = se($_POST, "dog_name", "", false);
    $breedName = se($_POST, "breed_name", "Unknown", false);
    $hp = se($_POST, "hp", 0, false);
    $attack = se($_POST, "attack", 0, false);
    $defense = se($_POST, "defense", 0, false);
    $imageUrl = se($_POST, "image_url", "", false);
    $userId = get_user_id();

    $db = getDB();
    $checkStmt = $db->prepare("SELECT COUNT(*) FROM Dogs WHERE user_id = :user_id AND name = :name");
    $checkStmt->execute([":user_id" => $userId, ":name" => $dogName]);
    $count = $checkStmt->fetchColumn();

    if ($count > 0) {
        flash("Error collecting dog. Dog name is already in use.", "danger");
    } else {
        $insertStmt = $db->prepare("INSERT INTO Dogs (user_id, name, breed_name, hp, attack, defense, image_url) VALUES (:user_id, :name, :breed_name, :hp, :attack, :defense, :image_url)");

        try {
            $insertStmt->execute([
                ":user_id" => $userId,
                ":name" => $dogName,
                ":breed_name" => $breedName,
                ":hp" => $hp,
                ":attack" => $attack,
                ":defense" => $defense,
                ":image_url" => $imageUrl
            ]);
            flash("Dog collected successfully!", "success");
        } catch (PDOException $e) {
            flash("Error collecting dog. Please try again.", "danger");
        }
    }
}

header("Location: home.php");
exit();
?>