<?php $title = 'Modifier ce commentaire ?'; ?>

<?php ob_start(); ?>
        <h1>Mon super blog !</h1>
		<?php $originalComment = $comment->fetch();?>
        <p><a href="index.php?action=post&amp;id=<?= $originalComment['post_id'] ?>">Retour aux commentaires</a></p><br />
		
        <h2><strong>Modifier ce commentaire ? :</strong></h2>
        <div class="news">
		    <h3><strong><?= htmlspecialchars($originalComment['author']) ?></strong> le <?= $originalComment['comment_date_fr'] ?></h3>
            <p><?= nl2br(htmlspecialchars($originalComment['comment'])) ?></p><br /><br />
        </div>
		
		<form action="index.php?action=modifyComment&amp;id=<?= $originalComment['id'] ?>" method="post">
			
			<div>
				<label for="comment">Commentaire de remplacement :</label><br /><br />
				<textarea id="comment" name="comment"></textarea><br /><br />
			</div>
			<div>
				<input type="submit" />
			</div>
		</form>
		
         
            
        
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>