<?php ob_start(); ?>
<form action="../../admin?action=updateArticle" method="post">
			<div class="form-group">
				<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  				<script>tinymce.init({ selector:'textarea' });</script>
				<label>Titre de l'article :</label><br /><br />
				<input type='texte' name ='newtitrearticle' ><br /><br />
			</div>
			<div class="form-group">
				<label>Votre article:</label><br /><br />
				<textarea name="newarticle"></textarea><br /><br />
			</div>
			<div class="form-group">
				<input class="btn btn-success "type="submit" />
				<input type="hidden" name="id" value="<?= $_POST['id']?>">
			</div>

		</form>

<?php
$content = ob_get_clean();
require('templateEdit.php'); ?>