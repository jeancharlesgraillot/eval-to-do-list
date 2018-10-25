<?php
  // if ($data['done'] == 1) {
  //
  // }
  $index = ($_GET['index']);
  $name = ($_GET['name']);
  $checkedornot = 0; // unchecked by default

  require('db_access.php');

// $req = $db->query('SELECT done FROM tasks WHERE id_list = '. $index .'');

// while ($data = $req->fetch()){

  if (!empty($_POST['checkedornot'])) {

    $checkedornot = 1; // checked

    $req = $db->prepare('UPDATE tasks SET done = :newdone WHERE id_list = :newid_list AND name = :newname');
    $req->execute(array(
    	'newdone' => $checkedornot,
      'newid_list' => $index,
      'newname' => $name
    	));

  }else{

    $checkedornot = 0;

    $req = $db->prepare('UPDATE tasks SET done = :newdone WHERE id_list = :newid_list AND name = :newname');
    $req->execute(array(
      'newdone' => $checkedornot,
      'newid_list' => $index,
      'newname' => $name
      ));

  }

// }
// $req->closeCursor();

echo "L'exécution de la tâche a été mise à jour !";
header('refresh:1;url=listDetails.php?index=' . $index);

?>
