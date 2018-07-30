<?php $title = $post['title']; ?>

<?php ob_start(); ?>
        <h1>Administrer les articles !</h1>
        <p><a href="admin.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= $post['title']; ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= $post['content']; ?>
            </p>
        </div>

       
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>