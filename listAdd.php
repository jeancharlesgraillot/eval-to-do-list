<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Projects Sheduler / List Add</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php require("links.php");?>
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <?php require("header.php");
        $index = ($_GET['index']);
  ?>

  <main>

    <div class="formCenter mx-auto">

        <p class="text-center my-4 h3">Formulaire d'ajout de liste :</p>

        <form class="text-center" action="listAddCheck.php?index=<?php echo $index; ?>" method="post">
          <p>
            <label for="name">Nom de la liste :</label><br>
            <input type="text" name="name" value="" required>
          </p>
          <input type="submit" name="" value="Ajouter">
      </form>

    </div>

  </main>


<?php require("scripts.php") ?>

</body>

</html>
