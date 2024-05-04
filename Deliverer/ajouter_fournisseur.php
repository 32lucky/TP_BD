<!-- ajouter_fournisseur.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Fournisseur</title> 
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    
    
        
    
    <form class="form" action="traitement_ajout_fournisseur.php" method="POST">
    <p class="title">Be a Fournisseur </p>
        <div class="flex">
        <label id="firstname"  for="nom">
            <input class="input" type="text" id="nom" name="nom" required>
            <span>Nom du Fournisseur:</span>
        </label>

       
    </div>  
            
    <label for="adresse">
        <input class="input" type="text" id="adresse" name="adresse" required>
        <span>Adresse:</span>
    </label> 
        
    <label  for="telephone">
        <input class="input" type="text" id="telephone" name="telephone" required>
        <span>Phone number</span>
    </label>
    <label  for="password">
        <input class="input" type="password" id="password" name="password" required>
        <span>password</span>
    </label>
    
    
    
    <button class="submit" value="Ajouter">Submit</button>
    </form>

</body>
</html>
