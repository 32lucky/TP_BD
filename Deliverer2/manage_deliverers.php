<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'tp_bd';
$username = 'root';
$password = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}


function getAllDeliverers() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM chauffeurlivreur");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to delete a deliverer by ID
function deleteDeliverer($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM chauffeurlivreur WHERE matricule_chauffeur = ?");
    $stmt->execute([$id]);
}

// Check if form is submitted for deletion
if (isset($_POST['delete'])) {
    $id_to_delete = $_POST['id_to_delete'];
    deleteDeliverer($id_to_delete);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['matricule_chauffeur '];
    $name = $_POST['name'];
    $address = $_POST['address'];
  

    $stmt = $pdo->prepare("UPDATE chauffeurlivreur SET nom = ?, adresse = ? WHERE matricule_chauffeur = ?");
    $stmt->execute([$name, $address,  $id]);
}

// Check if form is submitted for adding new deliverer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    

    $stmt = $pdo->prepare("INSERT INTO chauffeurlivreur (nom, adresse) VALUES ( ?, ?)");
    $stmt->execute([$name, $address]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Deliverers</title>
</head>
<body>
    <h1>Manage Deliverers</h1>

    <!-- Form to add new deliverer -->
    <h2>Add New Deliverer</h2>
    <form method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br>
        <button type="submit" name="add">Submit</button>

    </form>

    <h2>List of Deliverers</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php
        $deliverers = getAllDeliverers();
        foreach ($deliverers as $deliverer) {
            echo "<tr>";
            echo "<td>{$deliverer['nom']}</td>";
            echo "<td>{$deliverer['adresse']}</td>";
            
            echo "<td>";
            echo "<form method='post' style='display: inline;'>";
            echo "<input type='hidden' name='id_to_delete' value='{$deliverer['matricule_chauffeur']}'>";
            echo "<input type='submit' name='delete' value='Delete'>";
            echo "</form>";
            echo "<a href='edit_deliverer.php?id={$deliverer['matricule_chauffeur']}'>Edit</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
