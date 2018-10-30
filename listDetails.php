<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Projects Sheduler / List Details</title>
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

// Request on database to get list elements

$req = $db->prepare('SELECT id, name, id_project FROM lists WHERE id= :id');
$req->execute(array('id' => $index));

$data = $req->fetch();

?>

<main>
  <div class="flexBox col-12 d-md-flex justify-content-md-between mb-5">

    <div class="listDetailsWrapper col-12 col-md-6 text-center text-md-left">
      <h2 class="my-3"><?php echo 'Liste : ' . $data['name'] ?></h2>
    </div>

    <div class="backToLists col-12 col-md-3 text-center">
      <a href="projectDetails.php?index=<?php echo $data['id_project']; ?>">
        <button type="button" class="btn btn-primary my-3">Retour aux listes</button>
      </a>
    </div>


    <div class="taskAdd col-12 col-md-3 text-md-right text-center ml-lg-auto">
      <a href="taskAdd.php?index=<?php echo $data['id']; ?>">
        <button type="button" class="btn btn-primary my-3">Ajouter une tâche</button>
      </a>
    </div>

  </div>
<!-- Request on database to get tasks elements linked to the list -->
<?php

  $req = $db->query('SELECT * FROM tasks WHERE id_list = '. $index .'');

?>
<!-- Display all tasks and details linked to the list with possibility to update a task if it's done or delete it -->
<?php

while ($data = $req->fetch()){

?>
    <!-- to update database for indicate if a task is done or not, a form who send in url id and name of task -->
    <form class="taskWrap col-12 d-md-flex justify-content-md-between mb-3" action="taskUpdateCheck.php?index=<?php echo $index ?>&name=<?php echo $data['name']?>" method="post">

      <div class="taskAndCheck col-12 col-md-4 text-center text-md-left my-auto pt-2">
        <!-- A condition to display a checked box or not in function of boolean in database after update -->
        <?php
        if ($data['done'] == 1){
          echo '<input type="checkbox" name="checkedornot" checked />';
        }else{
          echo '<input type="checkbox" name="checkedornot"/>';
        }
        ?>

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



<?php
}
$req->closeCursor();

?>



</main>

<?php require('scripts.php') ?>

</body>

</html>
