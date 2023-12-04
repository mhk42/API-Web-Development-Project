<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

$db = getDB();

// Retrieve the original total count of dogs without filters
$originalCountStmt = $db->query("SELECT COUNT(*) as total_count FROM Dogs WHERE user_id IS NULL");
$originalCountResult = $originalCountStmt->fetch(PDO::FETCH_ASSOC);
$originalTotalCount = $originalCountResult['total_count'];

// Filter variables
$sessionFilterDogName = isset($_SESSION['filter_dog_name']) ? $_SESSION['filter_dog_name'] : '';
$sessionFilterLimit = isset($_SESSION['filter_limit']) ? $_SESSION['filter_limit'] : 10;

// Retrieve the filtered values from the URL
$filterDogName = isset($_GET['filter_dog_name']) ? $_GET['filter_dog_name'] : '';
$filterLimit = isset($_GET['filter_limit']) ? $_GET['filter_limit'] : 10;

// Ensure that the limit is between 1 and 100
$filterLimit = max(1, min($filterLimit, 100));

// Save filter values in sessions
$_SESSION['filter_dog_name'] = $filterDogName;
$_SESSION['filter_limit'] = $filterLimit;

// SQL query to retrieve total count of dogs without an owner with filters
$totalCountStmt = $db->prepare("
    SELECT COUNT(*) as total_count
    FROM Dogs
    WHERE user_id IS NULL
    AND name LIKE :filterDogName
");
$totalCountStmt->bindValue(':filterDogName', '%' . $filterDogName . '%', PDO::PARAM_STR);
$totalCountStmt->execute();
$totalCountResult = $totalCountStmt->fetch(PDO::FETCH_ASSOC);
$totalCount = $totalCountResult['total_count'];

// SQL query to retrieve dogs without an owner with filters
$stmt = $db->prepare("
    SELECT Dogs.*, Users.username as dog_owner_name
    FROM Dogs
    LEFT JOIN Users ON Dogs.user_id = Users.id
    WHERE Dogs.user_id IS NULL
    AND Dogs.name LIKE :filterDogName
    LIMIT :filterLimit
");
$stmt->bindValue(':filterDogName', '%' . $filterDogName . '%', PDO::PARAM_STR);
$stmt->bindValue(':filterLimit', $filterLimit, PDO::PARAM_INT);
$stmt->execute();
$dogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Dogs Without Owners (Total: {$originalTotalCount}, Showing " . count($dogs) . " with Filters)</h2>";

// Display the filtering form
echo "<form method='get' action=''>";
echo "<label for='filter_dog_name'>Filter by Dog Name:</label>";
echo "<input type='text' name='filter_dog_name' value='{$filterDogName}' placeholder='Enter dog name'>";
echo "<label for='filter_limit'>Limit Records (1-100):</label>";
echo "<input type='number' name='filter_limit' value='{$filterLimit}' min='1' max='100'>";
echo "<button type='submit'>Apply Filters</button>";
echo "</form>";

if (empty($dogs)) {
    // Display a message if no dogs are found
    echo "<p>No dogs found without an owner for the specified filters.</p>";
} else {
    // Display the dogs in a card format
    echo "<div class='row'>";
    foreach ($dogs as $dog) {
        echo "<div class='col-md-6 col-lg-4 col-xl-3 mb-4'>";
        echo "<div class='card'>";
        echo "<img src='{$dog['image_url']}' class='card-img-top img-fluid' alt='Dog Image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title text-center'>Name: {$dog['name']}</h5>";

     
        echo "<div class='text-center'>";
        echo "<a href='../details.php?dog_id={$dog['id']}' class='btn btn-info btn-sm m-1'>Details</a>";
        echo "</div>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
}

require_once(__DIR__ . "/../../../partials/flash.php");
?>