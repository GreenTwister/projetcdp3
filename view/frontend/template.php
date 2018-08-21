<!DOCTYPE html>
<html lang="fr">
<head>
  <style type="text/css">
    .labarre{ padding-top: 70px; }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">
        <title><?= $title ?></title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"> Blog Ecrivain </a>
        <a class="navbar-brand" href="index.php?action=login"> Connexion </a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="labarre">
      <?php echo  $content; ?>
    </div>
  </div>
</body>
</html>