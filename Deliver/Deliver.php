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
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<header>
        <nav>
            <div class="container">
            <div class="image">
                <a href="#Home">
                 <img src="images\test_3_-removebg-preview.png" alt="" class="image-main">
                </a>
            </div>
            <div class="texts">
                <a href="#home" class="texts-nav">Home</a>
                <a href="#Services" class="texts-nav">Services</a>
                <a href="#Join"class="texts-nav">Join-us</a>
                <div class="dropdown">
                    <button class="dropbtn">Order
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      <a href="Deliver\add_client.php" class="texts-nav">Deliver</a>
                      <a href="Deliverer\ajouter_fournisseur.php" class="texts-nav">Become a seller </a>
                      <a href="#" class="texts-nav">Become a deliverer</a>
                    </div>
                  </div> 
            </div>
        </div>
        </nav></header>
        <div class="main-text"> 
    <h1>Client List</h1>
    </div>
   
    <a href="add_client.php" style="text-decoration: none ; " id="add">Add New Client</a>
    

    <table class="table" >
        <tr class="head">
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
                    <a class="outil" href="edit_client.php?id=<?php echo $client['id']; ?>">Edit</a>
                    <a class="outil" href="delete_client.php?id=<?php echo $client['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
