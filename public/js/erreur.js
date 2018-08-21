var erreurElt = document.createElement("div"); // Création d'un élément li
erreurElt.id = "erreur"; // Définition de son identifiant
erreurElt.textContent = "Mauvais identifiant"; // Définition de son contenu textuel
// Remplacement de l'élément identifié par "perl" par le nouvel élément
document.getElementById("erreur").replaceChild(erreurElt, document.getElementById("starter-template"));