<?php
require 'template.php';
?>
<form action="index.php?action=connexion" method="post" style="padding-left:100px ;  width: 50%;" >
	 <p>Votre pseudo</p>
	<p><input name ="login" type="texte" class="form-control"></input></p>
	<p>Votre mot de passe</p>
	<p><input name ="password" type="password" class="form-control"> </input></p>
	<button class="btn btn-primary">Envoyer</button>
</form>