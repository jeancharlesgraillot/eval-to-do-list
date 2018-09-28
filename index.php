<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

<?php

require('header.php');

require('db_access.php');

// Request on database to get elements we choose
$response = $db->query('SELECT name, id, deadline FROM projects ORDER BY deadline LIMIT 0, 8');
?>

<main>

  <div class="projectAdd mx-auto">
    <a href="projectAdd.php">
      <button type="button" class="btn btn-primary my-3">Ajouter un projet</button>
    </a>
  </div>

  <h2 class="text-center h4 mt-4">Liste des projets :</h2>

  <div class="row col-12 mx-auto d-flex justify-content-around">

<?php
while ($data = $response->fetch()){
?>
  <div class="projectWrap col-12 col-md-6 col-lg-3">
    <div class="projectCard mt-3 border border-dark">
      <a href="projectDetails.php?index=<?php echo $data['id']; ?>">
        <p class="projectName text-center pt-2 blackText font-weight-bold"><?php echo 'Projet : ' . $data['name']; ?></p>
        <p class="projectDeadline text-center pt-2 blackText"><?php echo 'Date limite : ' . $data['deadline']; ?></p>
      </a>
    </div>
    <div class="projectDel text-center">
      <a href="projectDelete.php?index=<?php echo $data['id']; ?>">
        <button type="button" class="btn btn-primary my-3">Supprimer</button>
      </a>
    </div>
  </div>



<?php
}
$response->closeCursor();
?>

  </div>

</main>

<?php require('scripts.php') ?>

</body>

</html>
