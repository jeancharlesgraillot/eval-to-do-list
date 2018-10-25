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

$index = ($_GET['index']);

require('header.php');

require('db_access.php');

// Request on database to get elements we choose

$req = $db->prepare('SELECT id, name, id_project FROM lists WHERE id= :id');
$req->execute(array('id' => $index));

$data = $req->fetch();

?>

<main>
  <div class="flexBox col-12 d-md-flex justify-content-md-between mb-5">

    <div class="listDetailsWrapper col-12 col-md-5 text-center text-md-left">
      <h2 class="my-3"><?php echo 'Liste : ' . $data['name'] ?></h2>
    </div>

    <div class="taskAdd col-12 col-md-5 text-md-right text-center ml-lg-auto">
      <a href="taskAdd.php?index=<?php echo $data['id']; ?>">
        <button type="button" class="btn btn-primary my-3">Ajouter une tâche</button>
      </a>
    </div>

  </div>

<?php

  $req = $db->query('SELECT * FROM tasks WHERE id_list = '. $index .'');

?>

<?php

while ($data = $req->fetch()){

?>
  <!-- <div class="taskWrap col-12 d-md-flex justify-content-md-between my-3"> -->
    <form class="taskWrap col-12 d-md-flex justify-content-md-between mb-3" action="taskUpdateCheck.php?index=<?php echo $index ?>&name=<?php echo $data['name']?>" method="post">

      <div class="taskAndCheck col-12 col-md-4 text-center text-md-left my-auto pt-2">
        <input type="checkbox" name="checkedornot" />
        <label><?php echo 'Tâche : ' . $data['name'] ?></label><br />
      </div>

      <div class="taskDeadline col-12 col-md-4 text-center text-md-left my-auto">
        <p class="mb-0"><?php echo 'Date limite : ' . $data['deadline'] ?></p>
      </div>

      <div class="taskDelete col-12 col-md-2 text-md-right text-center ml-lg-auto">
        <a href="taskDelete.php?index=<?php echo $index ?>&name=<?php echo $data['name']?>">
          <button type="button" class="btn btn-primary my-2">Supprimer</button>
        </a>
      </div>
      <div class="taskUpdate col-12 col-md-2 text-md-right text-center ml-lg-auto">
        <input class="btn btn-primary my-2" type="submit" value="Update" />
      </div>

    </form>
  <!-- </div> -->


<?php
}
$req->closeCursor();

?>



</main>

<?php require('scripts.php') ?>

</body>

</html>
