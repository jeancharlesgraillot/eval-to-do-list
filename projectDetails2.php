<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php require("links.php");?>
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

<?php

$index = $_GET['index'];

require('header.php');

require('db_access.php');

// Request on database to get elements we choose

$req = $db->prepare('SELECT * FROM projects WHERE id= :id');
$req->execute(array('id' => $index));

$data = $req->fetch();

?>

<main>
  <div class="flexBox col-12 d-lg-flex">

    <div class="projectDetailsWrapper col-12 col-lg-4 text-center text-lg-left">
      <h2 class=""><?php echo 'Projet : ' . $data['name'] ?></h2>
      <p class=""><?php echo $data['description'] ?></p>
      <p class=""><?php echo 'Date limite : ' . $data['deadline'] ?></p>
    </div>

    <div class="listAdd col-12 col-lg-4 text-lg-right text-center ml-lg-auto">
      <a href="listAdd.php?index=<?php echo $data['id']; ?>">
        <button type="button" class="btn btn-primary my-3">Ajouter une liste</button>
      </a>
    </div>

  </div>

<?php
  $index = $_GET['index'];

  $req = $db->query('SELECT * FROM lists WHERE id_project = ' . $index . '');
?>

  <div class="row col-12 mx-auto d-flex justify-content-around">

<?php
while ($data = $req->fetch()){
?>
    <div class="listWrap col-12 col-md-6 col-lg-3">
      <div class="listCard mt-3 border border-dark">
        <a href="listDetails.php?index=<?php echo $data['projects_id']; ?>">
          <p class="my-0 listName text-center pt-2 blackText font-weight-bold"><?php echo 'Liste : ' . $data['name']; ?></p>

        </a>
      </div>
      <div class="listDel text-center">
        <a href="listDelete.php?index=<?php echo $data['projects_id']; ?>">
          <button type="button" class="btn btn-primary my-3">Supprimer</button>
        </a>
      </div>
    </div>

  <?php
  }
  $req->closeCursor();
  ?>

  </div>
</main>

<?php require('scripts.php') ?>

</body>

</html>
