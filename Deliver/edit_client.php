<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: Deliver.php");
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM client_table WHERE id = ?");
$stmt->execute([$id]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$client) {
    header("Location: Deliver.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Client</title>
</head>
<body>
    <h2>Edit Client</h2>
    <form action="edit_client.php?id=<?php echo $client['id']; ?>" method="POST">
        Client Code: <input type="text" name="client_code" value="<?php echo $client['client_code']; ?>"><br>
        Name: <input type="text" name="name" value="<?php echo $client['name']; ?>"><br>
        Address: <input type="text" name="address" value="<?php echo $client['address']; ?>"><br>
        Phone Number: <input type="text" name="phone_number" value="<?php echo $client['phone_number']; ?>"><br>
        <input type="submit" value="Update Client">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $client_code = $_POST['client_code'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        
        $stmt = $pdo->prepare("UPDATE client_table SET client_code = ?, name = ?, address = ?, phone_number = ? WHERE id = ?");
        $stmt->execute([$client_code, $name, $address, $phone_number, $id]);
        
        header("Location: Deliver.php");
        exit();
    }
    ?>
</body>
</html>
