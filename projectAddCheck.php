<?php

$name = htmlspecialchars($_POST['name']);
$description = htmlspecialchars($_POST['description']);
$deadline = htmlspecialchars($_POST['deadline']);

require('db_access.php');

if (isset($name) AND !empty($name) AND isset($description) AND !empty($description)
AND isset($deadline) AND !empty($deadline)) {

  // Insertion of project informations in database
  $req = $db->prepare('INSERT INTO projects (name, description, deadline) VALUES(:name, :description, :deadline)');
  $req->execute(array(
      'name' => $name,
      'description' => $description,
      'deadline' => $deadline,
      ));

  echo "Votre projet a bien été enregistré";
  header('refresh:1;url=index.php');

}else{
  echo "Erreur !";
  header('refresh:1;url=projectAdd.php');
}















?>
