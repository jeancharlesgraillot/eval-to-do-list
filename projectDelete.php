<?php

$index = ($_GET['index']);

require('db_access.php');

if (isset($index) AND !empty($index)) {

  $req = $db->prepare('DELETE FROM projects WHERE id= :id');
  $req->execute(array('id' => $index));

  echo "Votre projet a bien été supprimé !";
  header('refresh:1;url=index.php');
}else {
  echo "Erreur !";
  header('refresh:1;url=index.php');
}

?>
