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

// Vérifier si le formulaire a été soumis
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

// Fermer la connexion
$conn->close();
?>
  <?php
      function getUsers() {
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

        // Récupérer les données des utilisateurs depuis la base de données
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        // Stocker les données des utilisateurs dans un tableau
        $users = array();
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $users[] = $row;
          }
        }

        // Fermer la connexion
        $conn->close();

        return $users;
      }


 ?>
  