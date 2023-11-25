<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    error_log("Session data: " . var_export($_SESSION, true));
}



//mhk42, 11/24/2023
// The getRandomDog function makes a GET request to the Dog API's image search endpoint, providing an API key, limiting the result to one image with breeds information. 
// If the HTTP status is 200 and a valid response is received, it decodes the JSON response and returns the data of the first dog; otherwise, it returns null.
function getRandomDog() {
    $result = get("https://api.thedogapi.com/v1/images/search", "API_KEY", ["limit" => 1, "has_breeds" => "true"], false);

    if (se($result, "status", 400, false) == 200 && isset($result["response"])) {
        return json_decode($result["response"], true)[0];
    }

    return null;
}

// Function to generate random stats for the dog
function generateRandomStats() {
    return [
        'hp' => rand(50, 100),
        'attack' => rand(20, 50),
        'defense' => rand(10, 30),
    ];
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["collect"])) {
    $dogName = trim($_POST["dog_name"]);
    $userId = get_user_id(); // Assuming you have a function like this

    // Check if the dog name already exists for the current user
    if (dogNameExists($dogName, $userId)) {
        // Display an error flash message
        echo '<div class="alert alert-danger" role="alert">Error: Dog name already in use. Choose a different name.</div>';
    } else {
        
    }
}

function dogNameExists($dogName, $userId) {
    $db = getDB();
    $query = "SELECT COUNT(*) FROM dogs WHERE user_id = :userId AND dog_name = :dogName";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":userId", $userId);
    $stmt->bindParam(":dogName", $dogName);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    return $count > 0;
}
//mhk42, 11/24/2023
// Generates a random dog and displays its image along with some generated statistics. Users can enter a name for the dog and collect it
?>
<div class="container-fluid">
    <h1 class="text-center mb-4">Spin for Your Dog</h1>
    <div class="row">
        <?php
        $randomDog = getRandomDog();
        if ($randomDog !== null) {
            $randomStats = generateRandomStats();
        ?>
<div class="col-md-6 offset-md-3 mb-4">
    <div class="card position-relative">
        <img src="<?= $randomDog['url']; ?>" class="card-img-top img-fluid" alt="Dog Image">
        <div class="card-body">
            <p class="card-text text-center">Breed: <?= $randomDog['breeds'][0]['name'] ?? 'Unknown'; ?></p>
            <p class="card-text text-center">Stats:</p>
            <ul class="list-group">
                <li class="list-group-item">HP: <?= $randomStats['hp']; ?></li>
                <li class="list-group-item">Attack: <?= $randomStats['attack']; ?></li>
                <li class="list-group-item">Defense: <?= $randomStats['defense']; ?></li>
            </ul>
            <form method="post" action="collect.php" class="mt-3" style="border: none; box-shadow: none;">
                <div class="form-group">
                    <input type="text" name="dog_name" id="dogName" class="form-control" placeholder="Enter Dog Name" required>
                </div>
                <input type="hidden" name="breed_name" value="<?= $randomDog['breeds'][0]['name'] ?? 'Unknown'; ?>">
                <input type="hidden" name="hp" value="<?= $randomStats['hp']; ?>">
                <input type="hidden" name="attack" value="<?= $randomStats['attack']; ?>">
                <input type="hidden" name="defense" value="<?= $randomStats['defense']; ?>">
                <input type="hidden" name="image_url" value="<?= $randomDog['url']; ?>">
                <button type="submit" class="btn btn-primary btn-block" name="collect" style="margin-left: 239px;">Collect</button>
            </form>
        </div>
    </div>
</div>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <button id="spinButton" class="btn btn-success btn-lg">Spin Again</button>
        </div>
    </div>
</div>



<script>
    // JavaScript to handle the spin button click event
    document.getElementById("spinButton").addEventListener("click", function () {
        // Reload the page to fetch a new random dog
        location.reload();
    });
</script>