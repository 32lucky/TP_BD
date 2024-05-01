<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Fournisseurs</title>
</head>
<body>
    <h1>Liste des Fournisseurs</h1>
    <a href="ajouter_fournisseur.php">Ajouter un Fournisseur</a>
    
    <table border="1">
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>
        <?php
        // Inclure le fichier de connexion à la base de données
        include 'db.php';
        
        // Récupérer tous les fournisseurs depuis la base de données
        $query = "SELECT * FROM fournisseurs";
        $result = $pdo->query($query);
        
        // Afficher les fournisseurs dans un tableau
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
