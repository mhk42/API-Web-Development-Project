<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<?php
if (is_logged_in(true)) {
    // Comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

$sessionFilterName = isset($_SESSION['filter_name']) ? $_SESSION['filter_name'] : '';
$sessionFilterLimit = isset($_SESSION['filter_limit']) ? $_SESSION['filter_limit'] : 10;



$db = getDB();

// Get the logged-in user's ID
$user_id = get_user_id();


$filterName = isset($_GET['filter_name']) ? $_GET['filter_name'] : '';
$filterLimit = isset($_GET['filter_limit']) ? $_GET['filter_limit'] : 10;
$filterLimit = max(1, min($filterLimit, 100));

// SQL query with filters and user ID condition
$stmt = $db->prepare("SELECT * FROM Dogs WHERE user_id = :user_id AND name LIKE :filterName LIMIT :filterLimit");
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':filterName', '%' . $filterName . '%', PDO::PARAM_STR);
$stmt->bindValue(':filterLimit', $filterLimit, PDO::PARAM_INT);
$stmt->execute();
$dogs = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['battle_result'])) {
    $battleResult = $_GET['battle_result'];
    $message = ($battleResult === 'lost') ? "You lost the battle!" : "";
    flash($message, "danger");
}


if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['dog_id'])) {
    $deleteDogId = $_GET['dog_id'];

    // Perform the deletion from the database
    $deleteStmt = $db->prepare("DELETE FROM Dogs WHERE id = :dog_id AND user_id = :user_id");
    $deleteStmt->bindValue(':dog_id', $deleteDogId, PDO::PARAM_INT);
    $deleteStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $deleteStmt->execute();

    // Check if deletion was successful
    $deletedRows = $deleteStmt->rowCount();
    if ($deletedRows > 0) {
        // Successfully deleted, set flash message
        flash("Successfully deleted the Dogemon!", "success");

        // Redirect to the current page with active filters
    header("Location: " . $_SERVER['PHP_SELF'] . "?filter_name={$sessionFilterName}&filter_limit={$sessionFilterLimit}");
    exit;
    } else {
        // No rows deleted, set flash message for failure
        flash("Failed to delete the Dogemon. Please try again.", "danger", );
    }

    // Redirect to the current page to refresh the dog list
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Display the collected dogs
echo "<h2>Your Dogemon Inventory</h2>";



//mhk42, 11/24/2023
// The form is displayed with input fields for entering the dog name filter and adjusting the limit on the number of records to display.
echo "<form method='get' action=''>";
echo "<label for='filter_name'>Filter by Name:</label>";
echo "<input type='text' name='filter_name' value='{$sessionFilterName}' placeholder='Enter dog name'>";
echo "<label for='filter_limit'>Limit Records (1-100):</label>";
echo "<input type='number' name='filter_limit' value='{$sessionFilterLimit}' min='1' max='100'>";
echo "<button type='submit'>Apply Filters</button>";
echo "</form>";

$_SESSION['filter_name'] = $filterName;
$_SESSION['filter_limit'] = $filterLimit;


if (empty($dogs) && !empty($filterName)) {
    // Display a flash message if no Dogemon is found with the specified name
    flash("No Dog Name Found.", "info");
} elseif (empty($dogs)) {
    // Display a flash message if no Dogemon is available
    flash("No Dogemon available.", "info");

    // Display the "Collect Dogemon" button
    echo "<form method='get' action='Dogemon.php' style='background-color: transparent; border: none; box-shadow: none;'>";
    echo "<button type='submit' style='margin-left: 185px;'>Collect Dogemon</button>";
    echo "</form>";
} else {
    echo "<div class='row'>";
    foreach ($dogs as $dog) {

}
echo "</div>";
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['favorite_dog'])) {
        $favoriteDogId = $_POST['favorite_dog'];

        // Update the 'is_favorite' column in the database
        $updateStmt = $db->prepare("UPDATE Dogs SET is_favorite = 1 WHERE id = :dog_id AND user_id = :user_id");
        $updateStmt->bindValue(':dog_id', $favoriteDogId, PDO::PARAM_INT);
        $updateStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $updateStmt->execute();
    
        // Check if the update was successful
        $updatedRows = $updateStmt->rowCount();
        if ($updatedRows > 0) {
            // Successfully marked as favorite, set flash message
            flash("Successfully marked as a favorite!", "success");
        } else {
            // No rows updated, set flash message for failure
            flash("Failed to mark as a favorite. Please try again.", "danger");
        }
    
        // Redirect to the current page after updating the favorite status
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } elseif (isset($_POST['remove_favorite_dog'])) {
        // Code for removing the dog from favorites
        $removeFavoriteDogId = $_POST['remove_favorite_dog'];

        // Update the 'is_favorite' column in the database to 0
        $removeFavoriteStmt = $db->prepare("UPDATE Dogs SET is_favorite = 0 WHERE id = :dog_id AND user_id = :user_id");
        $removeFavoriteStmt->bindValue(':dog_id', $removeFavoriteDogId, PDO::PARAM_INT);
        $removeFavoriteStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $removeFavoriteStmt->execute();

        // Check if the update was successful
        $removedRows = $removeFavoriteStmt->rowCount();
        if ($removedRows > 0) {
            // Successfully removed from favorites, set flash message
            flash("Successfully removed from favorites!", "success");
        } else {
            // No rows updated, set flash message for failure
            flash("Failed to remove from favorites. Please try again.", "danger");
        }

        // Redirect to the current page after updating the favorite status
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

//mhk42, 11/24/2023
//if the user has at least 1 dog, then it displays a list of dogs in a card format 
// with various buttons for actions such as viewing details, editing, deleting, and battle.
if (!empty($dogs)) {
    echo "<div class='row'>";
    foreach ($dogs as $dog) {
        echo "<div class='col-md-6 col-lg-4 col-xl-3 mb-4'>";
        echo "<div class='card'>";
        echo "<img src='{$dog['image_url']}' class='card-img-top img-fluid' alt='Dog Image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title text-center'>Name: {$dog['name']}</h5>";
    
        // Buttons and other details (unchanged)
        echo "<div class='text-center'>";
        echo "<a href='details.php?dog_id={$dog['id']}' class='btn btn-info btn-sm m-1'>Details</a>";
        echo "<a href='edit.php?dog_id={$dog['id']}' class='btn btn-warning btn-sm m-1'>Edit</a>";
        echo "<a href='?action=delete&dog_id={$dog['id']}' class='btn btn-danger btn-sm m-1' onclick='return confirmDelete()'>Delete</a>";
        echo "<a href='battle.php?dog_id={$dog['id']}&dog_name={$dog['name']}&dog_image={$dog['image_url']}' 
              class='btn btn-battle btn-sm m-1' style='background-color: #4CAF50; color: white;'>Battle</a>";
    
        // Check if the dog is already a favorite
        if ($dog['is_favorite'] == 1) {
            // "Remove Favorite" Button
            echo "<form method='post' style='border: none; box-shadow: none;'>";
            echo "<input type='hidden' name='remove_favorite_dog' value='{$dog['id']}'>";
            echo "<button type='submit' class='btn btn-danger btn-sm mt-1'>Remove Favorite</button>";
            echo "</form>";
        } else {
            // "Save as Favorite" Button
            echo "<form method='post' style='border: none; box-shadow: none;'>";
            echo "<input type='hidden' name='favorite_dog' value='{$dog['id']}'>";
            echo "<button type='submit' class='btn btn-primary btn-sm mt-1'>Save as Favorite</button>";
            echo "</form>";
        }
    
        echo "</div>";
    
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
}

      
require(__DIR__ . "/../../partials/flash.php");
?>