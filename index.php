<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Projects Sheduler</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php require("links.php");?>
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

<!-- Add a project -->
  <div class="projectAdd mx-auto">
    <a href="projectAdd.php">
      <button type="button" class="btn btn-primary my-3">Ajouter un projet</button>
    </a>
  </div>

  <h2 class="text-center h4 my-4">Liste des projets :</h2>
<!-- Display projects -->
  <div class="row col-12 mx-auto d-flex justify-content-around">

<?php
while ($data = $response->fetch()){
?>
  <div class="projectWrap col-12 col-md-6 col-lg-3">
    <div class="projectCard mt-3 border border-dark">
      <!-- Go on project details page on click on it sending project id in url -->
      <a href="projectDetails.php?index=<?php echo $data['id']; ?>">
        <p class="border-bottom border-dark py-3 projectName text-center pt-2 blackText font-weight-bold"><?php echo 'Projet : ' . $data['name']; ?></p>
        <p class="my-3 projectDeadline text-center blackText"><?php echo 'Date limite : ' . $data['deadline']; ?></p>
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
