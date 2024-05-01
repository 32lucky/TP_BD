<!-- supprimer_fournisseur.php -->

<?php
include 'db.php';

// Récupérer l'identifiant du fournisseur à supprimer depuis l'URL
$id = $_GET['id'];

// Préparer et exécuter la requête SQL pour supprimer le fournisseur
$query = "DELETE FROM fournisseurs WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

// Redirection vers la page d'accueil (liste des fournisseurs)
header("Location: index.php");
exit();
?>
