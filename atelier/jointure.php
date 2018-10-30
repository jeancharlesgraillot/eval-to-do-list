<?php

require('atelier.php');

$response = $db->query('SELECT users.name users_name, users.id users_id, cats.name cats_name, cats.user_id cats_users_id, cats.id cats_id
FROM users INNER JOIN cats ON users.id = cats.user_id WHERE users.id = 1');

$data = $response -> fetchAll();
echo '<pre>';
print_r($data);
echo '</pre';

?>
