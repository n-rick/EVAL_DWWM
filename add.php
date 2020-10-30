<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Enrick FICADIERE">
    <title>AJOUTER </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

<?php
    if($_POST){
        try{
            require_once("db.php");
            $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $cnx->exec("SET NAMES 'utf8';");

            $titre = $_POST["titre"];
            $description = $_POST["description"];
            $date = $_POST["date"];
            $sql = "INSERT INTO posts (post_title, description, post_at) VALUES (:title, :description, :date)";
            $stmt = $cnx->prepare($sql);
            $stmt-> bindParam(':title', $titre);
            $stmt-> bindParam(':description', $description);
            $stmt-> bindParam(':date', $date);
            $stmt->execute();
            header('location:index.php');
            
        } catch (Exception $ex) {
            die('Erreur : '.$ex->getMessage());
        }
}
?>
    <!-- CREATION DU FORMULAIRE VIDE-->
    <div class="container">
        <h2>AJOUTER UN ARTICLE</h2>
        <div class="row">
            <form method="post" action="" class="col-12 col-md-6">
                <button class=" btn btn-success float-right" type="button" name="backbtn"><a class="text-decoration-none text-dark" href="index.php">Retour à la liste</a></button>
                <div class="form-group">
                    <label for="titre">TITRE :</label>
                    <input type="text" minlenght="5" maxlenght="10" required class="form-control" id="titre" name="titre" placeholder="Saisir un titre...">
                </div>
                <div class="form-group">
                    <label for="description">DESCRITION :</label>
                    <textarea class="form-control" id="description" name="description" required rows="3" placeholder="Saisir une description..."></textarea>
                </div>
                <div class="form-group">
                    <label for="date">DATE :</label>
                    <input type="date" min="1970-01-01" max="<?php echo date('Y-m-d'); ?>" required class="form-control" id="date" name="date" placeholder="Indiquer la date">
                </div>
                <button class=" btn btn-success" type="submit" name="button">AJOUTER</button>
            </form>
        </div>
    </div>

</body>

</html>