<?php
foreach ($req as $data){
?>

<p><?php echo $data['task_name'] ?></p>

<?php
}
?>



$req = $db->query('SELECT l.id list_id, l.name list_name, l.id_project list_id_project, t.name task_name, t.done task_done, t.id_list task_id_list
FROM lists l
RIGHT JOIN tasks t
ON t.id_list = l.id
WHERE l.id_project = '. $index .'
ORDER BY list_id ASC
');


<?php

?>

<?php
foreach ($req as $data){
?>

<p><?php echo $data['task_name'] ?></p>

<?php
}
?>
