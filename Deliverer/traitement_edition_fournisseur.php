<!-- traitement_edition_fournisseur.php -->

<?php
include 'db.php';

// Récupérer l'identifiant du fournisseur à éditer depuis l'URL
$id = $_GET['id'];

// Récupérer les nouvelles données du formulaire
$code = $_POST['code'];
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$telephone = $_POST['telephone'];

// Préparer et exécuter la requête SQL pour mettre à jour les informations du fournisseur
$query = "UPDATE fournisseurs SET code_fournisseur = ?, nom = ?, adresse = ?, telephone = ? WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$code, $nom, $adresse, $telephone, $id]);

// Redirection vers la page d'accueil (liste des fournisseurs)
header("Location: index.php");
exit();
?>
