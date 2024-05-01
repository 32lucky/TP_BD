<?php
include 'db.php';

// Fetch clients from database
$stmt = $pdo->query("SELECT * FROM client_table");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Client Management</title>
</head>
<body>
    <h2>Client List</h2>
    <a href="add_client.php">Add New Client</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
            <th></th>
        </tr>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?php echo $client['id']; ?></td>
                <td><?php echo $client['name']; ?></td>
                <td><?php echo $client['address']; ?></td>
                <td><?php echo $client['phone_number']; ?></td>
                <td><?php echo $client['Email']; ?></td>
                <td><?php echo $client['Password']; ?></td>
                <td>
                    <a href="edit_client.php?id=<?php echo $client['id']; ?>">Edit</a>
                    <a href="delete_client.php?id=<?php echo $client['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
