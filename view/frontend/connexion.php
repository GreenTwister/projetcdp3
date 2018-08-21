<?php
ob_start();
?>
<form action="index.php?action=connexion" method="post" class="form-group" >
	 <p>Votre pseudo</p>
	<p><input name ="login" type="texte" class="form-control"></input></p>
	<p>Votre mot de passe</p>
	<p><input name ="password" type="password" class="form-control"> </input></p>
	<button class="btn btn-primary pull-right">Envoyer</button>
</form>
<?php
$content2 = ob_get_clean();
require 'templateConnexion.php';