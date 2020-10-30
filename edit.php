<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Enrick FICADIERE">
    <title>EDIT </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <?php

    @$ancienTitre = $_GET['title'];
    @$ancienneDescrip = $_GET['description'];
    @$ancienneDate = $_GET['date'];

    if ($_POST) {
        try {
            require_once("db.php");
            $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $cnx->exec("SET NAMES 'UTF8';");

            $id = $_GET['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date = $_POST['date'];

            $resultat = $cnx->prepare('UPDATE posts SET post_title = :title, description = :description, post_at = :date WHERE Id = :id');
            $resultat->bindParam(':id', $id);
            $resultat->bindParam(':title', $title);
            $resultat->bindParam(':description', $description);
            $resultat->bindParam(':date', $date);

            $resultat->execute();


            header('location:index.php');
        } catch (Exception $ex) {
            die('Erreur : ' . $ex->getMessage());
        }
    }

    ?>
    <div class="container">
        <h2> MODIFIER L'ARTICLE</h2>
        <div class="row">
            <form method="post" action="" class="col-12 col-md-6">
                <button class=" btn btn-success float-right" type="button" name="backbtn"><a class="text-decoration-none text-dark" href="index.php">Retour à la liste</a></button>
                <div class="form-group">
                    <label for="titre">Saisir le titre :</label>
                    <input type="text" required class="form-control" id="titre" name="titre" placeholder="Entrer le titre..." value="<?= $ancienTitre ?>">
                </div>
                <div class="form-group">
                    <label for="description">Saisir la description :</label>
                    <textarea class="form-control" id="description" name="description" required rows="6" placeholder="Saisir une description..."><?= $ancienneDescrip ?></textarea>
                </div>
                <div class="form-group">
                    <label for="date">Saisir une date :</label>
                    <input type="date" min="1970-01-01" max='<?php echo date('Y-m-d'); ?>' required class="form-control" id="date" name="date" placeholder="Saisir une date..." value="<?= $ancienneDate ?>">
                </div>
                <button class=" btn btn-success" type="submit" name="button">SAUVEGARDER</button>
            </form>
        </div>
    </div>
</body>

</html>