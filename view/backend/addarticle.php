<?php ob_start(); ?>
<form action="../../admin?action=addArticle" method="post">
			<div class="form-group">
				<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  				<script>tinymce.init({ selector:'textarea' });</script>
				<label>Titre de l'article :</label><br /><br />
				<input type='texte' name ='titrearticle'><br /><br />
			</div>
			<div class="form-group">
				<label>Votre article:</label><br /><br />
				<textarea name="article"></textarea><br /><br />
			</div>
			<div class="form-group">
				<input class="btn btn-success "type="submit" />
			</div>

		</form>

<?php
$content = ob_get_clean();
require('templateEdit.php'); ?>