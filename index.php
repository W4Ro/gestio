<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="navbar">
                <div class="logo"><a href="#">Kyodai Gestion</a></div>
                <div class="buttons">
                    <a href="ind.php"><button>Ajouter</button></a>
                </div>
                <form method="post" action="recherche.php">
                <div class="logo"><input type="text" name="recherche" placeholder="Rechercher"></div><input type="text" name="recherche" placeholder="Rechercher">
                    <button type="submit">search</button>
                </form>
            </div>
        </nav>
    </header>
    <?php include('back.php');?>

    <?php
            // Vérifier si le formulaire de recherche a été soumis
            if (isset($_POST["recherche"])) {
              // Récupérer la valeur de la recherche à partir du formulaire
              $recherche = $_POST["recherche"];

              // Récupérer les données des utilisateurs depuis la base de données
              $users = getUsers($recherche);

              // Afficher les données des utilisateurs dans un tableau
              echo "<table>";
              echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Contact</th><th>Section</th><th>Modifier</th><th>Détails</th><th>Supprimer</th></tr>";
              foreach ($users as $user) {
                echo "<tr>";
                echo "<td>". $user["nom"]. "</td>";
                echo "<td>". $user["prenom"]. "</td>";
                echo "<td>". $user["email"]. "</td>";
                echo "<td>". $user["contact"]. "</td>";
                echo "<td>". $user["section"]. "</td>";
                echo "<td><a href='modifier.php?id=". $user["id"]. "'><button>Modifier</button></a></td>";
                echo "<td><a href='details.php?id=". $user["id"]. "'><button>Détails</button></a></td>";
                echo "<td><a href='supprimer.php?id=". $user["id"]. "'><button>Supprimer</button></a></td>";
                echo "</tr>";
              }
              echo "</table>";
            } else {
              // Récupérer les données des utilisateurs depuis la base de données
              $users = getUsers();

              // Afficher les données des utilisateurs dans un tableau
              echo "<table>";
              echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Contact</th><th>Section</th><th>Modifier</th><th>Détails</th><th>Supprimer</th></tr>";
              foreach ($users as $user) {
                echo "<tr>";
                echo "<td>". $user["nom"]. "</td>";
                echo "<td>". $user["prenom"]. "</td>";
                echo "<td>". $user["email"]. "</td>";
                echo "<td>". $user["contact"]. "</td>";
                echo "<td>". $user["section"]. "</td>";
                echo "<td><a href='modifier.php?id=". $user["id"]. "'><button>Modifier</button></a></td>";
                echo "<td><a href='details.php?id=". $user["id"]. "'><button>Détails</button></a></td>";
                echo "<td><a href='supprimer.php?id=". $user["id"]. "'><button>Supprimer</button></a></td>";
                echo "</tr>";
              }
              echo "</table>";
            }

?>

</body>
</html>