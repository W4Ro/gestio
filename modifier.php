<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour</title>
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

            // Vérifier si l'ID de l'utilisateur à modifier est présent dans la requête
            if (isset($_GET["id"])) {
            // Récupérer les données de l'utilisateur à partir de la base de données
            $id = $_GET["id"];
            $sql = "SELECT * FROM users WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Vérifier si le formulaire a été soumis
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Récupérer les nouvelles données de l'utilisateur
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $email = $_POST["email"];
                $contact = $_POST["contact"];
                $section = $_POST["section"];

                // Mettre à jour les données de l'utilisateur dans la base de données
                $sql = "UPDATE users SET nom='$nom', prenom='$prenom', email='$email', contact='$contact', section='$section' WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    echo "Les informations de l'utilisateur ont été modifiées avec succès.";
                } else {
                    echo "Une erreur s'est produite lors de la modification des informations de l'utilisateur : ". $conn->error;
                }
                }

                // Afficher le formulaire pour modifier les informations de l'utilisateur
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='id' value='".$user["id"]."'>";
                echo "<label for='nom'>Nom :</label><br>";
                echo "<input type='text' id='nom' name='nom' value='".$user["nom"]."'><br>";
                echo "<label for='prenom'>Prénom :</label><br>";
                echo "<input type='text' id='prenom' name='prenom' value='".$user["prenom"]."'><br>";
                echo "<label for='email'>Email :</label><br>";
                echo "<input type='email' id='email' name='email' value='".$user["email"]."'><br>";
                echo "<label for='contact'>Contact :</label><br>";
                echo "<input type='text' id='contact' name='contact' value='".$user["contact"]."'><br>";
                echo "<label for='section'>Section :</label><br>";
                echo "<input type='text' id='section' name='section' value='".$user["section"]."'><br><br>";
                echo "<input type='submit' value='Modifier'>";
                echo "</form>";
            } else {
                echo "L'utilisateur n'a pas été trouvé dans la base de données.";
            }
            } else {
            echo "L'ID de l'utilisateur à modifier n'a pas été spécifié.";
            }

            // Fermer la connexion
$conn->close();
?>
</body>
</html>