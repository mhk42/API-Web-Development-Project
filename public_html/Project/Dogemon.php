<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    // Comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}



// Function to fetch a random dog from the API
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
        // Dog name is unique, proceed with collecting the dog
        // ... (your existing code for collecting the dog)
    }
}

function dogNameExists($dogName, $userId) {
    $db = getDB();
    // You should implement the logic to check if the dog name exists in your database
    // Replace the following line with your actual database query
    // Example assumes you have a database connection in $db
    // and a table named "dogs" with columns "user_id" and "dog_name"
    $query = "SELECT COUNT(*) FROM dogs WHERE user_id = :userId AND dog_name = :dogName";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":userId", $userId);
    $stmt->bindParam(":dogName", $dogName);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    return $count > 0;
}

?>






<div class="container-fluid">
    <h1 class="text-center mb-4">Spin for Your Dog</h1>
    <div class="row">
        <?php
        // Get a random dog for the initial spin
        $randomDog = getRandomDog();

        if ($randomDog !== null) {
            // Generate random stats for the dog
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