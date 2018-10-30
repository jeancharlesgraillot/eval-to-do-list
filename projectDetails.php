<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Projects Sheduler / Project Details</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php require("links.php");?>
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

<?php

$index = ($_GET['index']);

require('header.php');

require('db_access.php');

// Request on database to get elements of project

$req = $db->prepare('SELECT id, name, description, deadline FROM projects WHERE id= :id');
$req->execute(array('id' => $index));

$data = $req->fetch();

?>
<!-- Display the project elements -->
<main>
  <div class="flexBox col-12 d-lg-flex">

    <div class="projectDetailsWrapper col-12 col-lg-4 text-center text-lg-left">
      <h2 class=""><?php echo 'Projet : ' . $data['name'] ?></h2>
      <p class=""><?php echo 'Description : ' . $data['description'] ?></p>
      <p class=""><?php echo 'Date limite : ' . $data['deadline'] ?></p>
    </div>

    <div class="listAdd col-12 col-lg-4 text-lg-right text-center ml-lg-auto">
      <!-- A button to go on the form page to add a list -->
      <a href="listAdd.php?index=<?php echo $data['id']; ?>">
        <button type="button" class="btn btn-primary my-3">Ajouter une liste</button>
      </a>
    </div>

  </div>
  <!-- Request on database to get elements of lists linked to the project -->
  <?php
  $req = $db->prepare('SELECT * FROM lists WHERE id_project = :id_project');
  $req->execute(array(
    'id_project' => $index,
  ));
  $data = $req->fetchAll();

  ?>
  <!-- Display project lists with remaining tasks linked to lists and delete and add list buttons-->
  <div class="row col-12 mx-auto d-flex justify-content-around">
      <!-- a first loop to display lists -->
      <?php
      foreach ($data as $key => $value) {
      $listname = $value['name'];
      ?>

          <div class="listWrap col-12 col-md-6 col-lg-3">
            <div class="listCard mt-3 border border-dark">
              <!-- On click on a list, go on a page with list details -->
              <a href="listDetails.php?index=<?php echo $value['id']; ?>">
                <p class="border-bottom border-dark my-0 listName text-center py-3 blackText font-weight-bold"><?php echo 'Liste : ' . $value['name']; ?></p>

              </a>

              <p class="text-center my-3"><em>Tâches restantes :</em></p>
              <!-- A second loop inside the first with request on database to display remaining tasks linked to lists -->
              <?php
              $reqtask = $db->prepare('SELECT * FROM tasks WHERE id_list = :takeidlist AND done = :todotask');
              $reqtask->execute(array(
                'takeidlist' => $value['id'],
                'todotask' => 0
              ));
              $reqtask = $reqtask->fetchAll();
              foreach ($reqtask as $key => $value){
              ?>

              <p class="text-center my-3"><?php echo $value['name']; ?></p>

              <?php
              }
              ?>

              </div>
              <div class="listDel text-center">
                <!-- A button to delete list -->
                <a href="listDelete.php?index=<?php echo $index ?>&name=<?php echo $listname ?>">
                  <button type="button" class="btn btn-primary my-3">Supprimer</button>
                </a>
              </div>
            </div>
      <?php
      }
      ?>

</main>

<?php require('scripts.php') ?>

</body>

</html>
