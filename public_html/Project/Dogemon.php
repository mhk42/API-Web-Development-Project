<?php
require(__DIR__ . "/../../partials/nav.php");

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
                <div class="card">
                    <img src="<?= $randomDog['url']; ?>" class="card-img-top img-fluid" alt="Dog Image">
                    <div class="card-body">
                        <h5 class="card-title text-center">Name: <?= $randomDog['breeds'][0]['name']; ?></h5>
                        <p class="card-text text-center">Breed: <?= $randomDog['breeds'][0]['name'] ?? 'Unknown'; ?></p>
                        <p class="card-text text-center">Stats:</p>
                        <ul class="list-group">
                            <li class="list-group-item">HP: <?= $randomStats['hp']; ?></li>
                            <li class="list-group-item">Attack: <?= $randomStats['attack']; ?></li>
                            <li class="list-group-item">Defense: <?= $randomStats['defense']; ?></li>
                        </ul>
                        <form method="post" action="collect.php">
                        <!-- existing code for displaying dog information -->
                        <input type="hidden" name="dog_name" value="<?= $randomDog['breeds'][0]['name']; ?>">
                        <input type="hidden" name="breed_name" value="<?= $randomDog['breeds'][0]['name'] ?? 'Unknown'; ?>">
                        <input type="hidden" name="hp" value="<?= $randomStats['hp']; ?>">
                        <input type="hidden" name="attack" value="<?= $randomStats['attack']; ?>">
                        <input type="hidden" name="defense" value="<?= $randomStats['defense']; ?>">
                        <input type="hidden" name="image_url" value="<?= $randomDog['url']; ?>"> <!-- Add this line for image URL -->
                        <button type="submit" class="btn btn-primary btn-block mt-3" name="collect">Collect</button>
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