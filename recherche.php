<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
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
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

// Vérifier si le formulaire de recherche a été soumis
if (isset($_POST["recherche"])) {
  // Récupérer la valeur de la recherche à partir du formulaire
  $recherche = $_POST["recherche"];

  // Récupérer les données des utilisateurs depuis la base de données
  $sql = "SELECT * FROM users WHERE nom LIKE '%$recherche%' OR prenom LIKE '%$recherche%'";
  $result = $conn->query($sql);

  // Afficher les données des utilisateurs dans un tableau
  if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Contact</th><th>Section</th><th>Modifier</th><th>Détails</th><th>Supprimer</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>". $row["nom"]. "</td>";
      echo "<td>". $row["prenom"]. "</td>";
      echo "<td>". $row["email"]. "</td>";
      echo "<td>". $row["contact"]. "</td>";
      echo "<td>". $row["section"]. "</td>";
      echo "<td><a href='modifier.php?id=". $row["id"]. "'><button>Modifier</button></a></td>";
      echo "<td><a href='details.php?id=". $row["id"]. "'><button>Détails</button></a></td>";
      echo "<td><a href='supprimer.php?id=". $row["id"]. "'><button>Supprimer</button></a></td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
} else {
  // Récupérer les données des utilisateurs depuis la base de données
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);

  // Afficher les données des utilisateurs dans un tableau
  if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Contact</th><th>Section</th><th>Modifier</th><th>Détails</th><th>Supprimer</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>". $row["nom"]. "</td>";
      echo "<td>". $row["prenom"]. "</td>";
      echo "<td>". $row["email"]. "</td>";
      echo "<td>". $row["contact"]. "</td>";
      echo "<td>". $row["section"]. "</td>";
      echo "<td><a href='modifier.php?id=". $row["id"]. "'><button>Modifier</button></a></td>";
      echo "<td><a href='details.php?id=". $row["id"]. "'><button>Détails</button></a></td>";
      echo "<td><a href='supprimer.php?id=". $row["id"]. "'><button>Supprimer</button></a></td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
}

// Fermer la connexion
$conn->close();
?>
</body>
</html>