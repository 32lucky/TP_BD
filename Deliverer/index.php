<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Fournisseurs</title>
    <link rel="stylesheet" href="style3.css">
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
    <h1>Liste des Fournisseurs</h1>
        </div>
    <a href="ajouter_fournisseur.php" id="add">Ajouter un Fournisseur</a>
    
    <table >
        <tr class="head">
            <th>Code</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'db.php';
        
        $query = "SELECT * FROM fournisseurs";
        $result = $pdo->query($query);
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['code_fournisseur']}</td>";
            echo "<td>{$row['nom']}</td>";
            echo "<td>{$row['adresse']}</td>";
            echo "<td>{$row['telephone']}</td>";
            echo "<td>";
            echo "<a href='editer_fournisseur.php?id={$row['id']}'>Éditer</a> | ";
            echo "<a href='supprimer_fournisseur.php?id={$row['id']}' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce fournisseur ?\")'>Supprimer</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
