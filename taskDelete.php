<?php

$index = ($_GET['index']);
$name = ($_GET['name']);

require('db_access.php');

if (isset($index) AND !empty($index) AND isset($name) AND !empty($name)) {

  $req = $db->prepare('DELETE FROM tasks WHERE id_list= :id AND name= :name');
  $req->execute(array(
    'id' => $index,
    'name' => $name
  ));

  echo "Votre tâche a bien été supprimée !";
  header('refresh:1;url=listDetails.php?index=' . $index);
}else {
  echo "Erreur !";
  header('refresh:1;url=listDetails.php?index=' . $index);
}

?>
