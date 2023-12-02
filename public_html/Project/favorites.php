<?php
require(__DIR__ . "/../../partials/nav.php");

// Ensure the user is logged in
if (!is_logged_in()) {
    // Redirect to the login page or handle unauthorized access as needed
    header("Location: login.php");
    exit;
}

$user_id = get_user_id();
$db = getDB();

// Check if the form is submitted to remove all associations for the user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_all_associations'])) {
    // Update the 'is_favorite' column in the database to 0 for all dogs associated with the user
    $removeAllStmt = $db->prepare("UPDATE Dogs SET is_favorite = 0 WHERE user_id = :user_id");
    $removeAllStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $removeAllStmt->execute();

    // Check if the update was successful
    $removedRows = $removeAllStmt->rowCount();
    if ($removedRows > 0) {
        // Successfully removed all associations, set flash message
        flash("Successfully removed all favorites.", "success");
    } else {
        // No rows updated, set flash message for failure
        flash("Failed to remove favorites. Please try again.", "danger");
    }

    // Redirect to the current page after updating the associations
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Check if the form is submitted to remove a specific favorite dog
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_favorite_dog'])) {
    $dogIdToRemove = $_POST['remove_favorite_dog'];

    // Update the 'is_favorite' column in the database to 0 for the specific dog
    $removeDogStmt = $db->prepare("UPDATE Dogs SET is_favorite = 0 WHERE user_id = :user_id AND id = :dog_id");
    $removeDogStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $removeDogStmt->bindValue(':dog_id', $dogIdToRemove, PDO::PARAM_INT);
    $removeDogStmt->execute();

    // Check if the update was successful
    $removedRows = $removeDogStmt->rowCount();
    if ($removedRows > 0) {
        // Successfully removed the specific dog as a favorite, set flash message
        flash("Successfully removed the dog from favorites.", "success");
    } else {
        // No rows updated, set flash message for failure
        flash("Failed to remove the dog from favorites. Please try again.", "danger");
    }

    // Redirect to the current page after updating the associations
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Filter variables
$sessionFilterName = isset($_SESSION['filter_name']) ? $_SESSION['filter_name'] : '';
$sessionFilterLimit = isset($_SESSION['filter_limit']) ? $_SESSION['filter_limit'] : 10;

// Retrieve the filtered name from the URL
$filterName = isset($_GET['filter_name']) ? $_GET['filter_name'] : '';
$filterLimit = isset($_GET['filter_limit']) ? $_GET['filter_limit'] : 10;
$filterLimit = max(1, min($filterLimit, 100));




// SQL query to retrieve total count of favorite dogs for the logged-in user without filters
$totalCountStmt = $db->prepare("
    SELECT COUNT(*) as total_count
    FROM Dogs
    WHERE user_id = :user_id AND is_favorite = 1
");
$totalCountStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$totalCountStmt->execute();
$totalCountResult = $totalCountStmt->fetch(PDO::FETCH_ASSOC);
$totalCount = $totalCountResult['total_count'];


// SQL query to retrieve favorite dogs for the logged-in user with filters
$stmt = $db->prepare("
    SELECT *
    FROM Dogs
    WHERE user_id = :user_id AND is_favorite = 1 AND name LIKE :filterName
    LIMIT :filterLimit
");
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':filterName', '%' . $filterName . '%', PDO::PARAM_STR);
$stmt->bindValue(':filterLimit', $filterLimit, PDO::PARAM_INT);
$stmt->execute();
$favoriteDogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Your Favorite Dogemons (Total: {$totalCount}, Showing " . count($favoriteDogs) . " with Filters)</h2>";

// Display the filtering form
echo "<form method='get' action=''>";
echo "<label for='filter_name'>Filter by Name:</label>";
echo "<input type='text' name='filter_name' value='{$filterName}' placeholder='Enter dog name'>";
echo "<label for='filter_limit'>Limit Records (1-100):</label>";
echo "<input type='number' name='filter_limit' value='{$filterLimit}' min='1' max='100'>";
echo "<button type='submit'>Apply Filters</button>";
echo "</form>";



// Display the favorite dogs
if (empty($favoriteDogs)) {
    // Display a message if no favorite dogs are found
    echo "<p>No favorite Dogemon found.</p>";
} else {
    // Display the favorite dogs in a card format
    echo "<div class='row'>";
    foreach ($favoriteDogs as $dog) {
        echo "<div class='col-md-6 col-lg-4 col-xl-3 mb-4'>";
        echo "<div class='card'>";
        echo "<img src='{$dog['image_url']}' class='card-img-top img-fluid' alt='Dog Image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title text-center'>Name: {$dog['name']}</h5>";
    
        // Buttons and other details (similar to the existing code)
        echo "<div class='text-center'>";
        echo "<a href='details.php?dog_id={$dog['id']}' class='btn btn-info btn-sm m-1'>Details</a>";
        
        // Remove from Favorites Button
        echo "<form method='post' style='border: none; box-shadow: none; display: inline; background-color: transparent;'>";
        echo "<input type='hidden' name='remove_favorite_dog' value='{$dog['id']}'>";
        echo "<button type='submit' class='btn btn-danger btn-sm m-1'>Remove</button>";
        echo "</form>";
    
        echo "</div>";
    
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
}

// Link/Button to Remove All Associations
echo "<form method='post' style='background-color: transparent; border: none; box-shadow: none; margin-left: 0px;'>";
echo "<input type='hidden' name='remove_all_associations' value='1'>";
echo "<button type='submit' class='btn btn-warning'>Remove All Favorites</button>";
echo "</form>";

require(__DIR__ . "/../../partials/flash.php");
?>