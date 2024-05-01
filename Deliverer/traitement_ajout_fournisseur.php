<!-- traitement_ajout_fournisseur.php -->

<?php
include 'db.php';

// Récupérer les données du formulaire
$code = $_POST['code'];
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$telephone = $_POST['telephone'];

// Préparer et exécuter la requête SQL pour insérer un nouveau fournisseur
$query = "INSERT INTO fournisseurs (code_fournisseur, nom, adresse, telephone) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$code, $nom, $adresse, $telephone]);

// Redirection vers la page d'accueil (liste des fournisseurs)
header("Location: index.php");
exit();
?>
