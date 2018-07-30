<?php $title = 'Blog Écrivain'; ?>

<?php ob_start(); ?>
<h1>Mon Blog Écrivain!</h1>
<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
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
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                    </p>
                </br>
                </div>
            </div>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>