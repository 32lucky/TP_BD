<!DOCTYPE html>
<html>
<head>
    <title>Add New Client</title>
</head>
<body>
    <h2>Add New Client</h2>
    <form action="add_client.php" method="POST">
        Client Code: <input type="text" name="client_code"><br>
        Name: <input type="text" name="name"><br>
        Address: <input type="text" name="address"><br>
        Phone Number: <input type="text" name="phone_number"><br>
        <input type="submit" value="Add Client">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include 'db.php';
        
        $client_code = $_POST['client_code'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        
        $stmt = $pdo->prepare("INSERT INTO client_table (client_code, name, address, phone_number) VALUES (?, ?, ?, ?)");
        $stmt->execute([$client_code, $name, $address, $phone_number]);
        
        header("Location: index.php");
        exit();
    }
    ?>
</body>
</html>
