<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

$user_id = get_user_id();
$db = getDB();

// Retrieve the original total count of dogs without filters
$originalCountStmt = $db->query("SELECT COUNT(*) as total_count FROM Dogs");
$originalCountResult = $originalCountStmt->fetch(PDO::FETCH_ASSOC);
$originalTotalCount = $originalCountResult['total_count'];

// Filter variables
$sessionFilterUsername = isset($_SESSION['filter_username']) ? $_SESSION['filter_username'] : '';
$sessionFilterLimit = isset($_SESSION['filter_limit']) ? $_SESSION['filter_limit'] : 10;

// Retrieve the filtered values from the URL
$filterUsername = isset($_GET['filter_username']) ? $_GET['filter_username'] : '';
$filterLimit = isset($_GET['filter_limit']) ? $_GET['filter_limit'] : 10;

// Ensure that the limit is between 1 and 100
$filterLimit = max(1, min($filterLimit, 100));

// SQL query to retrieve total count of dogs with filters
$totalCountStmt = $db->prepare("
    SELECT COUNT(*) as total_count
    FROM Dogs
    INNER JOIN Users ON Dogs.user_id = Users.id
    WHERE Users.username LIKE :filterUsername
");
$totalCountStmt->bindValue(':filterUsername', '%' . $filterUsername . '%', PDO::PARAM_STR);
$totalCountStmt->execute();
$totalCountResult = $totalCountStmt->fetch(PDO::FETCH_ASSOC);
$totalCount = $totalCountResult['total_count'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form was submitted
    if (isset($_POST["remove_dog"])) {
        $dog_id_to_remove = $_POST["remove_dog"];

        // Update the Dogs table to remove the user_id for the specified dog
        $removeDogStmt = $db->prepare("UPDATE Dogs SET user_id = NULL WHERE id = :dog_id");
        $removeDogStmt->bindValue(':dog_id', $dog_id_to_remove, PDO::PARAM_INT);

        if ($removeDogStmt->execute()) {
            // Dog removal successful
            flash("Dog removed successfully", "success");
        } else {
            // Dog removal failed
            flash("Failed to remove dog. Please try again.", "warning");
        }

        // Redirect to refresh the page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    elseif (isset($_POST["remove_all_dogs"])) {
        // Remove all dogs associated with the filtered username
        $filteredUsername = $_POST["filter_username"];

        // Update the Dogs table to remove the user_id for the specified username
        $removeAllDogsStmt = $db->prepare("UPDATE Dogs SET user_id = NULL WHERE user_id IN (SELECT id FROM Users WHERE username LIKE :filteredUsername)");
        $removeAllDogsStmt->bindValue(':filteredUsername', '%' . $filteredUsername . '%', PDO::PARAM_STR);

        if ($removeAllDogsStmt->execute()) {
            // Dogs removal successful
            flash("All dogs for the user '{$filteredUsername}' removed successfully", "success");
        } else {
            // Dogs removal failed
            flash("Failed to remove all dogs. Please try again.", "warning");
        }

        // Redirect to refresh the page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}


// SQL query to retrieve dogs with filters, including user ID
$stmt = $db->prepare("
    SELECT Dogs.*, Users.username as dog_owner_name
    FROM Dogs
    INNER JOIN Users ON Dogs.user_id = Users.id
    WHERE Users.username LIKE :filterUsername
    LIMIT :filterLimit
");
$stmt->bindValue(':filterUsername', '%' . $filterUsername . '%', PDO::PARAM_STR);
$stmt->bindValue(':filterLimit', $filterLimit, PDO::PARAM_INT);
$stmt->execute();
$dogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Dogs Owned by User (Total: {$originalTotalCount}, Showing " . count($dogs) . " with Filters)</h2>";

// Display the filtering form
echo "<form method='get' action=''>";
echo "<label for='filter_username'>Filter by Username:</label>";
echo "<input type='text' name='filter_username' value='{$filterUsername}' placeholder='Enter username'>";
echo "<label for='filter_limit'>Limit Records (1-100):</label>";
echo "<input type='number' name='filter_limit' value='{$filterLimit}' min='1' max='100'>";
echo "<button type='submit'>Apply Filters</button>";

// Display "Remove All Dogs" button if filtering by username
if (!empty($filterUsername)) {
    echo "<button type='button' onclick='removeAllDogs()' style='margin-left: 7px;'>Remove All Dogs</button>";
}

echo "</form>";



// JavaScript function to handle "Remove All Dogs" button click
echo "<script>
    function removeAllDogs() {
        if (confirm('Are you sure you want to remove all dogs for this user?')) {
            // AJAX request to handle the removal of all dogs
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '{$_SERVER['PHP_SELF']}', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Refresh the page after successful removal
                    location.reload();
                } else {
                    alert('Failed to remove all dogs. Please try again.');
                }
            };
            xhr.send('remove_all_dogs=true&filter_username={$filterUsername}');
        }
    }
</script>";


if (empty($dogs)) {
    // Display a message if no dogs are found
    echo "<p>No dogs found for the specified user.</p>";
} else {
    // Display the dogs in a card format
    echo "<div class='row'>";
    foreach ($dogs as $dog) {
        echo "<div class='col-md-6 col-lg-4 col-xl-3 mb-4'>";
        echo "<div class='card'>";
        echo "<img src='{$dog['image_url']}' class='card-img-top img-fluid' alt='Dog Image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title text-center'>Name: {$dog['name']}</h5>";

        // Display owner's name instead of ID
        echo "<p class='text-center'>Owner: <a href='profile.php?user_id={$dog['user_id']}'>{$dog['dog_owner_name']}</a></p>";

        // Buttons and other details (similar to the existing code)
        echo "<div class='text-center'>";
        echo "<a href='../details.php?dog_id={$dog['id']}' class='btn btn-info btn-sm m-1'>Details</a>";

        // Add Remove button
        echo "<form method='post' style='display: inline; background-color: transparent; border: none; box-shadow: none;'>";
        echo "<input type='hidden' name='remove_dog' value='{$dog['id']}'>";
        echo "<button type='submit' class='btn btn-danger btn-sm m-1'>Remove</button>";
        echo "</form>";

        echo "</div>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
}

require_once(__DIR__ . "/../../../partials/flash.php");
?>