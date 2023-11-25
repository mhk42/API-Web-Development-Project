<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    // Comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

function getRandomDog() {
    $result = get("https://api.thedogapi.com/v1/images/search", "API_KEY", ["limit" => 1, "has_breeds" => "true"], false);

    if (se($result, "status", 400, false) == 200 && isset($result["response"])) {
        return json_decode($result["response"], true)[0];
    }

    return null;
}

function generateRandomStats() {
    return [
        'hp' => rand(60, 160),
        'attack' => rand(20, 90),
        'defense' => rand(10, 70),
    ];
}


$db = getDB();

// Retrieve dog ID from the URL parameter
$dog_id = isset($_GET['dog_id']) ? $_GET['dog_id'] : null;

echo "<div class='container mt-4'>";

if (!$dog_id) {
    // Handle the case where no dog ID is provided
    flash("Dog ID not Provided", "danger");
} else {
    // Fetch dog details from the database
    $stmt = $db->prepare("SELECT * FROM Dogs WHERE id = :dog_id");
    $stmt->bindValue(':dog_id', $dog_id, PDO::PARAM_INT);
    $stmt->execute();
    $dogDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dogDetails) {
        // Redirect back to the list page with a flash message for invalid ID
        flash("Invalid Dog ID", "danger");
        header("Location: home.php");
        exit();
    }

    // Display dog details with card styling
    echo "<div class='row'>";
    echo "<div class='col-md-4 text-center'>";
    echo "<div class='card'>";
    echo "<img src='{$dogDetails['image_url']}' class='card-img-top' alt='Dog Image'>";
    echo "<div class='card-body'>";
    echo "<h2 class='card-title'>{$dogDetails['name']}</h2>";
    echo "<p class='card-text'>Breed: {$dogDetails['breed_name']}</p>";
    echo "<p class='card-text'>HP: {$dogDetails['hp']}</p>";
    echo "<p class='card-text'>Attack: {$dogDetails['attack']}</p>";
    echo "<p class='card-text'>Defense: {$dogDetails['defense']}</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    // Add styled "Vs." text in the middle of the screen
    echo "<div class='col-md-4 d-flex align-items-center justify-content-center'>";
    echo "<h1 class='vs-text'>Vs.</h1>";
    echo "</div>";

    echo "<div class='col-md-4 text-center'>";
    // Fetch a random dog from the API
    $randomDog = getRandomDog();

    // Display random dog details with card styling and random stats
    if ($randomDog) {
        $randomStats = generateRandomStats();

        echo "<div class='card'>";
        echo "<img src='{$randomDog['url']}' class='card-img-top' alt='Random Dog Image'>";
        echo "<div class='card-body'>";
        echo "<h2 class='card-title'>{$randomDog['breeds'][0]['name']}</h2>";
        echo "<p class='card-text'>Breed: {$randomDog['breeds'][0]['name']}</p>";
        echo "<p class='card-text'>HP: {$randomStats['hp']}</p>";
        echo "<p class='card-text'>Attack: {$randomStats['attack']}</p>";
        echo "<p class='card-text'>Defense: {$randomStats['defense']}</p>";
        echo "</div>";
        echo "</div>";
    } else {
        flash("Error fetching random dog data", "danger");
    }

    echo "</div>";

    echo "</div>"; 
}


echo "<div class='row mt-4'>";
echo "<div class='col-md-12 text-center'>";
echo "<button class='btn btn-primary' onclick='startBattle()'>Battle</button>";
echo "</div>";
echo "</div>";

echo "</div>";

require(__DIR__ . "/../../partials/flash.php");
?>

<div id="battle-result-container"></div>

<script>
function startBattle() {
    // Assuming $dogDetails and $randomDog are available

    // Simulate a random outcome (1 for player win, 2 for player lose)
    var battleResult = Math.floor(Math.random() * 2) + 1;


    //mhk42, 11/24/2023, 
    // This code creates a card with information about a randomly generated dog, along with a manually entered name
    // this will appear if the player wins the battle
    if (battleResult == 1) {
        var html = `<div class='col-md-6 offset-md-3 mb-4'>
            <div class='card'>
                <img src='<?= $randomDog['url'] ?>' class='card-img-top img-fluid' alt='Dog Image'>
                <div class='card-body'>
                    <p class='card-text text-center'>Breed: <?= $randomDog['breeds'][0]['name'] ?? 'Unknown' ?></p>
                    <p class='card-text text-center'>Stats:</p>
                    <ul class='list-group'>
                        <li class='list-group-item'>HP: <?= $randomStats['hp'] ?></li>
                        <li class='list-group-item'>Attack: <?= $randomStats['attack'] ?></li>
                        <li class='list-group-item'>Defense: <?= $randomStats['defense'] ?></li>
                    </ul>
                    <form method='post' action='collect.php' style='border: none; box-shadow: none; background: transparent;'>
                        <!-- existing code for displaying dog information -->
                        <div class="form-group">
                    <input type="text" name="dog_name" id="dogName" class="form-control" placeholder="Enter Dog Name" required>
                 </div>
                        <input type='hidden' name='breed_name' value='<?= $randomDog['breeds'][0]['name'] ?? 'Unknown' ?>'>
                        <input type='hidden' name='hp' value='<?= $randomStats['hp'] ?>'>
                        <input type='hidden' name='attack' value='<?= $randomStats['attack'] ?>'>
                        <input type='hidden' name='defense' value='<?= $randomStats['defense'] ?>'>
                        <input type='hidden' name='image_url' value='<?= $randomDog['url'] ?>'>
                        <div class='alert alert-success mt-3' role='alert'>Congrats! You have won!</div>
                        <button type='submit' class='btn btn-success btn-block mt-3' name='collect' style='margin-left: 225px;'>Collect</button>
                    </form>
                </div>
            </div>
        </div>`;

        document.querySelector('.btn-primary').style.display = 'none';
        
        document.getElementById('battle-result-container').innerHTML = html;

    } else {
        // Player loses
        // Redirect to home.php with a message
        window.location.href = 'home.php?battle_result=lost';
    }
}
</script>