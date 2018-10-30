<?php

$index = ($_GET['index']);
$name = htmlspecialchars($_POST['name']);
$deadline = htmlspecialchars($_POST['deadline']);

require('db_access.php');

if (isset($name) AND !empty($name) AND isset($index) AND !empty($index) AND isset($deadline) AND !empty($deadline)) {

  // Insertion of project informations in database
  $req = $db->prepare('INSERT INTO tasks (name, done, deadline, id_list) VALUES(:name, :done, :deadline, :id_list)');
  $req->execute(array(
      'name' => $name,
      'done' => 0,
      'deadline' => $deadline,
      'id_list' => $index
      ));

  echo "Votre liste a bien été ajoutée !";
  header('refresh:1;url=listDetails.php?index=' . $index);

}else{
  echo "Erreur !";
  header('refresh:1;url=listDetails.php?index=' . $index);
}
