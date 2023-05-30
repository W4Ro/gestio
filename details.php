<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
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
    <?php include('back.php');?>

    <?php
            // Récupérer l'ID de l'utilisateur à afficher
            $id = $_GET["id"];

            // Récupérer les données de l'utilisateur à partir de la base de données
            $users = getUsers($id);

            // Afficher les données de l'utilisateur dans un tableau
            foreach ($users as $user){
              echo "<table>";
              echo "<tr><th>Nom</th><td>". $user["nom"]. "</td></tr>";
              echo "<tr><th>Prénom</th><td>". $user["prenom"]. "</td></tr>";
              echo "<tr><th>Email</th><td>". $user["email"]. "</td></tr>";
              echo "<tr><th>Contact</th><td>". $user["contact"]. "</td></tr>";
              echo "<tr><th>Section</th><td>". $user["section"]. "</td></tr>";
              
            }
            echo "</table>";

 ?>

</body>
</html>