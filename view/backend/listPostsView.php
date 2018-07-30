<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Administrer les articles</h1>
<a href="view/backend/addarticle.php" class="btn btn-success">Ajouter un article</a>
<p>Derniers billets du blog :</p>



<?php
while ($data = $posts->fetch())
{
?>
    <div>
        <div class="col-xs-5">
            <div class="card">
                <div class="card-block">
                    <h3 class="card-title">
                        <?= $data['title'] ?>
                        <em>le <?= $data['creation_date_fr'] ?></em>
                    </h3>
                    
                    <p class="card-text">
                        <?= $data['content'] ?>
                        <br />
                    </p>

                    <form action="view/backend/editarticle.php" method="post" style= "display: inline;">
                                <input type="hidden" name="id" value="<?= $data['id']?>">
                                <input type="hidden" name="title" value="<?= $data['title']?>">
                                <input type="hidden" name="content" value="<?= $data['content']?>">
                                <button type="submit" class="btn btn-primary">Editer</button>
                            </form>
                    <form action="admin.php?action=delete" method="post" style= "display: inline;">
                                <input type="hidden" name="id" value="<?= $data['id']?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                </div>
        </div>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>