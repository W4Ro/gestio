// Récupérer le formulaire
var addUserForm = document.getElementById("add-user-form");

// Ajouter un écouteur d'événements sur la soumission du formulaire
addUserForm.addEventListener("submit", function(event) {
  // Empêcher le formulaire de se soumettre normalement
  event.preventDefault();

  // Envoyer les données du formulaire à travers une requête AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "back.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    // Afficher le pop-up Bootstrap après la soumission du formulaire
    var addUserModal = document.getElementById("add-user-modal");
    addUserModal.style.display = "block";
  };
  xhr.send(new FormData(addUserForm));
});

// Ajouter un écouteur d'événements sur le pop-up Bootstrap
var addUserModal = document.getElementById("add-user-modal");
addUserModal.addEventListener("click", function(event) {
  // Fermer le pop-up Bootstrap lorsque l'utilisateur clique en dehors de lui
  if (event.target == addUserModal) {
    addUserModal.style.display = "none";
  }
});