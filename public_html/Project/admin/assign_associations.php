<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process the form submission for associating dogs with users
    if (isset($_POST["entities"]) && isset($_POST["users"])) {
        $entityIdentifiers = $_POST["entities"];
        $userIds = $_POST["users"];
        if (empty($entityIdentifiers) || empty($userIds)) {
            flash("Both entities and users need to be selected", "warning");
        } else {
            $db = getDB();
            $stmt = $db->prepare("UPDATE Dogs SET user_id = CASE WHEN user_id = :uid THEN NULL ELSE :uid END WHERE name = :name");
            foreach ($entityIdentifiers as $entity) {
                foreach ($userIds as $userId) {
                    try {
                        $stmt->execute([":uid" => $userId, ":name" => $entity]);
                        flash("Updated associations", "success");
                    } catch (PDOException $e) {
                        flash(var_export($e->errorInfo, true), "danger");
                    }
                }
            }
        }
    }
}

// Fetch partially matched entities and users
$entityResults = [];
$userResults = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $entityIdentifier = se($_POST, "entity_identifier", "", false);
    $username = se($_POST, "username", "", false);

    if (!empty($entityIdentifier) || !empty($username)) {
        $db = getDB();
        $entityStmt = $db->prepare("SELECT id, name FROM Dogs WHERE name LIKE :entityIdentifier LIMIT 25");
        $userStmt = $db->prepare("SELECT id, username FROM Users WHERE username LIKE :username LIMIT 25");

        try {
            $entityStmt->execute([":entityIdentifier" => "%$entityIdentifier%"]);
            $userStmt->execute([":username" => "%$username%"]);

            $entityResults = $entityStmt->fetchAll(PDO::FETCH_ASSOC);
            $userResults = $userStmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            flash(var_export($e->errorInfo, true), "danger");
        }
    }
}
?>

<div class="container-fluid">
    <h1>Assign Dogs to Users</h1>
    <form method="POST">
        <?php render_input(["type" => "text", "name" => "entity_identifier", "placeholder" => "Entity Identifier (e.g., Dog Name)"]); ?>
        <?php render_input(["type" => "text", "name" => "username", "placeholder" => "Username"]); ?>
        <?php render_button(["text" => "Search", "type" => "submit"]); ?>
    </form>

    <form method="POST">
        <?php if (!empty($entityIdentifier)) : ?>
            <input type="hidden" name="entity_identifier" value="<?php se($entityIdentifier, false); ?>" />
        <?php endif; ?>
        <?php if (!empty($username)) : ?>
            <input type="hidden" name="username" value="<?php se($username, false); ?>" />
        <?php endif; ?>

        <table class="table">
            <thead>
                <th>Partially Matched Entities</th>
                <th>Partially Matched Users</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table class="table">
                            <?php foreach ($entityResults as $entity) : ?>
                                <tr>
                                    <td>
                                        <label for="entity_<?php se($entity, 'id'); ?>"><?php se($entity, "name"); ?></label>
                                        <input id="entity_<?php se($entity, 'id'); ?>" type="checkbox" name="entities[]" value="<?php se($entity, 'name'); ?>" />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </td>
                    <td>
                        <table class="table">
                            <?php foreach ($userResults as $user) : ?>
                                <tr>
                                    <td>
                                        <label for="user_<?php se($user, 'id'); ?>"><?php se($user, "username"); ?></label>
                                        <input id="user_<?php se($user, 'id'); ?>" type="checkbox" name="users[]" value="<?php se($user, 'id'); ?>" />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php render_button(["text" => "Apply Associations", "type" => "submit", "color" => "secondary"]); ?>
    </form>
</div>

<?php require_once(__DIR__ . "/../../../partials/flash.php"); 
?>