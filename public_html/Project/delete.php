<?php
require(__DIR__ . "/../../partials/nav.php");

$db = getDB();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve dog ID from the form data
    $dog_id = isset($_POST['dog_id']) ? $_POST['dog_id'] : null;

    // Delete the dog from the database
    $stmt = $db->prepare("DELETE FROM Dogs WHERE id = :dog_id");
    $stmt->bindValue(':dog_id', $dog_id, PDO::PARAM_INT);
    $result = $stmt->execute();

    if ($result) {
        // Redirect to the home page after successful deletion
        flash("Dog successfully deleted", "success");
        header("Location: home.php");
        exit();
    } else {
        // Handle errors during deletion
        flash("Error deleting dog", "danger");
        header("Location: home.php");
        exit();
    }
} else {
    // If the form is not submitted via POST, redirect to the home page
    header("Location: home.php");
    exit();
}
?>