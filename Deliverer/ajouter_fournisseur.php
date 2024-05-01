<!-- ajouter_fournisseur.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Fournisseur</title>
</head>
<body>
    <h1>Ajouter un Fournisseur</h1>
    <form action="traitement_ajout_fournisseur.php" method="POST">
        <label for="code">Code du Fournisseur:</label>
        <input type="text" id="code" name="code" required><br>
        <label for="nom">Nom du Fournisseur:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" required><br>
        <label for="telephone">Téléphone:</label>
        <input type="text" id="telephone" name="telephone" required><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
