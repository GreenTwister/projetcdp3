<?php
require 'templateConnexion.php';
?>
<form action="index.php?action=connexion" method="post" style="padding-left:200px ;  width: 30%;" >
	 <p>Votre pseudo</p>
	<p><input name ="login" type="texte" class="form-control"></input></p>
	<p>Votre mot de passe</p>
	<p><input name ="password" type="password" class="form-control"> </input></p>
	<button class="btn btn-primary">Envoyer</button>
</form>