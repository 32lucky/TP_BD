<!-- traitement_ajout_fournisseur.php -->

<?php
include 'db.php';



$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$telephone = $_POST['telephone'];
$password = $_POST['password'];


// Préparer et exécuter la requête SQL pour insérer un nouveau fournisseur
$query = "INSERT INTO fournisseurs ( nom, adresse, telephone,password) VALUES ( ?, ?, ?,?)";
$stmt = $pdo->prepare($query);
$stmt->execute([ $nom, $adresse, $telephone,$password]);

// Redirection vers la page d'accueil (liste des fournisseurs)
header("Location: ../home.html");
exit();
?>
