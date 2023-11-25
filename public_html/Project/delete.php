<?php
require(__DIR__ . "/../../partials/nav.php");

$db = getDB();




//mhk42, 11/24/2023
// etrieves a dog ID from the form data, prepares a SQL statement to delete the corresponding dog record from a database, and executes the deletion. 
// Depending on the success or failure of the deletion, it sets a flash message and redirects the user to the home page.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve dog ID from the form data
    $dog_id = isset($_POST['dog_id']) ? $_POST['dog_id'] : null;


    $stmt = $db->prepare("DELETE FROM Dogs WHERE id = :dog_id");
    $stmt->bindValue(':dog_id', $dog_id, PDO::PARAM_INT);
    $result = $stmt->execute();

    if ($result) {
        flash("Dog successfully deleted", "success");
        header("Location: home.php");
        exit();
    } else {
        flash("Error deleting dog", "danger");
        header("Location: home.php");
        exit();
    }
} else {
    header("Location: home.php");
    exit();
}
?>