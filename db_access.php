<?php

try
{
  $db = new PDO('mysql:host=localhost;dbname=to_do_list_eval;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>
