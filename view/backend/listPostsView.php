<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Administrer les articles</h1>
<a href="view/backend/addarticle.php" class="btn btn-success">Ajouter un article</a>
<p>Derniers billets du blog :</p>



<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= $data['title'] ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= $data['content'] ?>
            <br />
        </p>

        <form action="view/backend/editarticle.php" method="post" style= "display: inline;">
                    <input type="hidden" name="id" value="<?= $data['id']?>">
                    <button type="submit" class="btn btn-primary">Editer</button>
                </form>
        <form action="admin.php?action=delete" method="post" style= "display: inline;">
                    <input type="hidden" name="id" value="<?= $data['id']?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>