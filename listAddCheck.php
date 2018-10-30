<?php

$index = ($_GET['index']);
$name = htmlspecialchars($_POST['name']);

require('db_access.php');

if (isset($name) AND !empty($name) AND isset($index) AND !empty($index)) {

  // Insertion of list informations in database
  $req = $db->prepare('INSERT INTO lists (name, id_project) VALUES(:name, :id_project)');
  $req->execute(array(
      'name' => $name,
      'id_project' => $index
      ));

  echo "Votre liste a bien été ajoutée !";
  header('refresh:1;url=projectDetails.php?index=' . $index);

}else{
  echo "Erreur !";
  header('refresh:1;url=projectDetails.php?index=' . $index);
}










?>
