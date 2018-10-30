<?php

$index = ($_GET['index']);
$name = ($_GET['name']);

require('db_access.php');

if (isset($index) AND !empty($index) AND isset($name) AND !empty($name)) {

  $req = $db->prepare('DELETE FROM lists WHERE id_project= :id AND name= :name');
  $req->execute(array(
    'id' => $index,
    'name' => $name
  ));

  echo "Votre liste a bien été supprimé !";
  header('refresh:1;url=projectDetails.php?index=' . $index);
}else {
  echo "Erreur !";
  header('refresh:1;url=projectDetails.php?index=' . $index);
}

?>
