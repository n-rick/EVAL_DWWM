<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Enrick FICADIERE">
    <title>DELETE </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

<?php
$id=$_GET['id']; 
$title=$_GET['title'];

try {
    require_once("db.php");
    $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $cnx->exec("SET NAMES 'UTF8';");

    $sql = "DELETE FROM posts WHERE Id = :id ";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $msg = "Titre ".$title." effacé avec succés. <br>";
    header('location:index.php');
        
}   catch (Exception $ex) {
        die ('Erreur : ' .$ex->getMessage());
}
echo $msg;

?>

</body>

</html>