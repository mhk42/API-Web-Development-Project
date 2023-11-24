<?php
require(__DIR__ . "/../../partials/nav.php");
$result = get("https://api.thedogapi.com/v1/images/search", "API_KEY", ["limit" => 6, "has_breeds" => "true"], false);
error_log("Response: " . var_export($result, true));
if (se($result, "status", 400, false) == 200 && isset($result["response"])) {
    $result = json_decode($result["response"], true);
} else {
    $result = [];
}


// Array of dog names
$dogNames = [
    "Buddy", "Max", "Charlie", "Bailey", "Lucy", 
    "Cooper", "Rocky", "Lola", "Tucker", "Zoe",
    "Daisy", "Milo", "Sadie", "Bear", "Molly",
    "Duke", "Chloe", "Jack", "Roxy", "Coco",
    "Oliver", "Lily", "Leo", "Ruby", "Zeus"
];

// Shuffle the array to get a random order of names
shuffle($dogNames);

// Array to keep track of used names
$usedNames = [];

?>

<div class="container-fluid">
    <h1 class="text-center mb-4">Choose Your Fighter</h1>
    <div class="row">
        <?php for ($i = 0; $i < count($result); $i++) : ?>
            <?php
            // Get a random and unique dog name
            $randomName = array_shift($dogNames);
            $usedNames[] = $randomName;

            // Generate random stats for the dog
            $hp = rand(50, 100);
            $attack = rand(20, 50);
            $defense = rand(10, 30);
            ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= $result[$i]['url']; ?>" class="card-img-top img-fluid" alt="Dog Image">
                    <div class="card-body">
                        <h5 class="card-title text-center">Name: <?= $randomName; ?></h5>
                        <p class="card-text text-center">Breed:
                            <?= 
                                isset($result[$i]['breeds'][0]['name']) ?  
                                $result[$i]['breeds'][0]['name'] :         
                                'Unknown';                                
                            ?>
                        </p>
                        <p class="card-text text-center">Stats:</p>
                        <ul class="list-group">
                            <li class="list-group-item">HP: <?= $hp; ?></li>
                            <li class="list-group-item">Attack: <?= $attack; ?></li>
                            <li class="list-group-item">Defense: <?= $defense; ?></li>
                            <!-- Add more stats as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>