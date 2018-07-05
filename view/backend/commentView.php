<?php
$title = 'Commentaire(s) '; ?>
<?php ob_start(); ?>
        <h1>Gerer les commentaires </h1>
		<p> Voici les commentaires signalés ! </p>
		<?php
while ($data = $signaled->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['author']) ?>
            <em>le <?= $data['comment_date'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['comment'])) ?>
        </p>
        <p>
        	<form action="admin.php?action=deleteSignaled" method="post" style= "display: inline;">
                    <input type="hidden" name="id" value="<?= $data['id']?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
        </p>

    </div>

<?php 
}
$content = ob_get_clean(); 
require('templateAdmin.php'); ?>