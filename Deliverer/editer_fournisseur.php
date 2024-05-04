<!-- editer_fournisseur.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer un Fournisseur</title>
</head>
<body>
    <h1>Éditer un Fournisseur</h1>
    <?php
    include 'db.php';

    // Récupérer l'identifiant du fournisseur à éditer depuis l'URL
    $id = $_GET['id'];

    // Récupérer les informations du fournisseur à partir de la base de données
    $query = "SELECT * FROM fournisseurs WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $fournisseur = $stmt->fetch(PDO::FETCH_ASSOC);

    // Afficher le formulaire pré-rempli avec les informations du fournisseur
    if ($fournisseur) {
        ?>
        <form action="traitement_edition_fournisseur.php?id=<?php echo $id; ?>" method="POST">
           
            <label for="nom">Nom du Fournisseur:</label>
            <input type="text" id="nom" name="nom" value="<?php echo $fournisseur['nom']; ?>" required><br>
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" value="<?php echo $fournisseur['adresse']; ?>" required><br>
            <label for="telephone">Téléphone:</label>
            <input type="text" id="telephone" name="telephone" value="<?php echo $fournisseur['telephone']; ?>" required><br>
            <label for="telephone">Password:</label>
            <input type="text" id="password" name="password" value="<?php echo $fournisseur['password']; ?>" required><br>
            <input type="submit" value="Enregistrer les modifications">
        </form>
        <?php
    } else {
        echo "Fournisseur non trouvé.";
    }
    ?>
</body>
</html>
