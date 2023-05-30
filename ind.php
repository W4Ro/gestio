<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="navbar">
              <div class="logo"><a href="index.php">Kyodai Gestion</a></div>
                <div class="buttons">
                    <a href="ind.php"><button>Ajouter</button></a>
                </div>
                <form method="post" action="recherche.php">
                <div class="logo"><input type="text" name="recherche" placeholder="Rechercher">
                    <button type="submit">search</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="form-container">
      <form id="add-user-form" action="back.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
    
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
    
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>
    
        <label for="section">Section:</label>
        <select id="section" name="section" required>
          <option value="Marketing">Création contenue</option>
          <option value="Marketing">Marketing</option>
          <option value="Dev">Dev</option>
          <option value="Artistique">Artistiques</option>
        </select>
    
        <button type="submit" class="submit-button">Ajouter</button>
      </form>
    </div>

</body>
</html>