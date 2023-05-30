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

// Vérifier si le formulaire d'ajout a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer les données du formulaire
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $email = $_POST["email"];
  $contact = $_POST["contact"];
  $section = $_POST["section"];

  // Insérer les données dans la table "users"
  $sql = "INSERT INTO users (nom, prenom, email, contact, section)
  VALUES ('$nom', '$prenom', '$email', '$contact', '$section')";

  if ($conn->query($sql) === TRUE) {
    // Envoyer une en-tête HTTP de redirection vers la page de confirmation
    header("Location: index.php");
    // Arrêter l'exécution du code restant
    exit;
  } else {
    echo "Error: ". $sql. "<br>". $conn->error;
  }
}

// Vérifier si le formulaire de suppression a été soumis
if (isset($_GET["id"])) {
  // Récupérer l'ID de l'utilisateur à supprimer
  $id = $_GET["id"];

  // Supprimer l'utilisateur de la table "users"
  $sql = "DELETE FROM users WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    // Envoyer une en-tête HTTP de redirection vers la page de confirmation
    header("Location: index.php");
    // Arrêter l'exécution du code restant
    exit;
  } else {
    echo "Error: ". $sql. "<br>". $conn->error;
  }
}

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
    echo "<td><a href='modifier.php?id=". $row["id"]. "' ><button>Modifier</button></a></td>";
    echo "<td><a href='details.php?id=". $row["id"]. "' ><button>Détails</button></a></td>";
    echo "<td><a href='index.php?id=". $row["id"]. "'><button>Supprimer</button></a></td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

// Fermer la connexion
$conn->close();
?>