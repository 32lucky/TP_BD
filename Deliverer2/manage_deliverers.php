<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'tp_bd';
$username = 'root';
$password = '';

// Create a PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

// Function to fetch all deliverers from database
function getAllDeliverers() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM deliverers");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to delete a deliverer by ID
function deleteDeliverer($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM deliverers WHERE id = ?");
    $stmt->execute([$id]);
}

// Check if form is submitted for deletion
if (isset($_POST['delete'])) {
    $id_to_delete = $_POST['id_to_delete'];
    deleteDeliverer($id_to_delete);
}

// Check if form is submitted for update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare("UPDATE deliverers SET name = ?, address = ?, phone = ? WHERE id = ?");
    $stmt->execute([$name, $address, $phone, $id]);
}

// Check if form is submitted for adding new deliverer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare("INSERT INTO deliverers (name, address, phone) VALUES (?, ?, ?)");
    $stmt->execute([$name, $address, $phone]);
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
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" required><br><br>
        <input type="submit" name="add" value="Add Deliverer">
    </form>

    <!-- List of deliverers with delete and edit functionality -->
    <h2>List of Deliverers</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php
        $deliverers = getAllDeliverers();
        foreach ($deliverers as $deliverer) {
            echo "<tr>";
            echo "<td>{$deliverer['name']}</td>";
            echo "<td>{$deliverer['address']}</td>";
            echo "<td>{$deliverer['phone']}</td>";
            echo "<td>";
            echo "<form method='post' style='display: inline;'>";
            echo "<input type='hidden' name='id_to_delete' value='{$deliverer['id']}'>";
            echo "<input type='submit' name='delete' value='Delete'>";
            echo "</form>";
            echo "<a href='edit_deliverer.php?id={$deliverer['id']}'>Edit</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
