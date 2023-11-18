<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<?php
if (is_logged_in(true)) {
    // Comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

$db = getDB();
$stmt = $db->query("SELECT * FROM Dogs");
$dogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the collected dogs
echo "<h2>Your Dogemon Inventory</h2>";

if (!empty($dogs)) {
    echo "<div class='row'>";
    foreach ($dogs as $dog) {
        echo "<div class='col-md-6 col-lg-4 col-xl-3 mb-4'>";
        echo "<div class='card'>";
        echo "<img src='{$dog['image_url']}' class='card-img-top img-fluid' alt='Dog Image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title text-center'>Name: {$dog['name']}</h5>";
        echo "<p class='card-text text-center'>Breed: {$dog['breed_name']}</p>";
        echo "<p class='card-text text-center'>Stats:</p>";
        echo "<ul class='list-group list-group-flush'>";
        echo "<li class='list-group-item'>HP: {$dog['hp']}</li>";
        echo "<li class='list-group-item'>Attack: {$dog['attack']}</li>";
        echo "<li class='list-group-item'>Defense: {$dog['defense']}</li>";
        echo "</ul>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p>Your Dogemon inventory is empty.</p>";
}
?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>