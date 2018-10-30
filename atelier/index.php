<?php

require('atelier.php');

$response = $db->query('SELECT * FROM users ORDER BY name');

$data = $response -> fetchAll();
echo '<pre>';
print_r($data);
echo '</pre';
?>
