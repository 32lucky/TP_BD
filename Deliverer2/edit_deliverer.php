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

// Check if deliverer ID is provided via URL parameter
if (isset($_GET['id'])) {
    $deliverer_id = $_GET['id'];

    // Retrieve deliverer information from database
    $stmt = $pdo->prepare("SELECT * FROM chauffeurlivreur WHERE matricule_chauffeur = ?");
    $stmt->execute([$deliverer_id]);
    $deliverer = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$deliverer) {
        die("Deliverer not found.");
    }

    // Check if form is submitted for updating deliverer
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        header("Location: manage_deliverers.php");


        exit();
    }
} else {
    die("Invalid request.");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Deliverer</title>
</head>
<body>
    <h1>Edit Deliverer</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $deliverer['id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $deliverer['name']; ?>" required><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $deliverer['address']; ?>" required><br>
       
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
