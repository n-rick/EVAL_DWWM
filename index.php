<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Enrick FICADIERE">
    <title>EVAL DWWM2 </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <!-- PARTIE PHP-->
    <?php
    echo "<div><h1 class='d-flex justify-content-center alert alert-dark text-dark'>EVAL DWMM2 - Enrick FICADIERE</h1></div>";
    try {
        require_once("db.php");
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $cnx->exec("SET NAMES 'utf8';");

        $result = $cnx->query('SELECT * FROM posts');
        $rows = $result->fetchAll();
        $titre = [];
        $description = [];
        $date = [];
        $id = [];

        foreach ($rows as $row) {
            $titre[] = $row[1];
            $description[] = $row[2];
            $date[] = $row[3];
            $id[] = $row[0];
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    echo "<br />";

    // IMPLEMENTATION DE LA BDD DANS UN TALBEAU
    echo '<button class=" col-md-1 offset-md-8 btn btn-success" type="submit"><a class="text-decoration-none text-dark" href="add.php"><img src="./crud-icon/add.png" alt="image d\'ajout"> CREATE</a></button>';
    $table = '<table class="table table-bordered col-12 col-lg-6 mx-auto">';
    $table .= '<thead>
        <tr class="table-secondary">
        <th scope="col"> TITRE </th>
        <th class="d-flex justify-content-center" width"" scope="col"> DESCRIPTION </th>
        <th width=13% scope ="col"> DATE </th>
        <th scope="col"> ACTION </th>
    </tr>';
        for ($i = 0; $i < count($rows); $i++) {
            $table .= '<tr>
        <th scope="row">' . $titre[$i] . '</th>
        <td>' . $description[$i] . '</td>
        <td>' . $date[$i] . '</td>
        <td class=" d-flex justify-content-center"> <a href="delete.php?id='.$id[$i].'"><img src="./crud-icon/delete.png" alt="image de suppression"></a>
        <a href="edit.php?id='.$id[$i].'"><img src="crud-icon/edit.png" alt="image d\'édition"></a> </td>
    </tr>';
        }
        $table .= '</thead></table></div>';
        echo $table;
    ?>
</body>

<!--PARTIE HTML -->
<!-- FORMULAIRE -->
<!-- <table class="table table-bordered col-12 col-lg-6 mx-auto">
    <thead>
        <tr class="table-secondary"> 
            <th scope="col"> TITRE </th>
            <th scope="col"> DESCRIPTION </th>
            <th scope="col"> DATE </th>
            <th scope="col"> ACTION </th>
        </tr>
        <tr>
            <th scope="row"> </th>
            <td> </td>
            <td> </td>
            <td class=" d-flex justify-content-center"> <a href="delete.php"><img src="crud-icon\delete.png" alt="image de suppression"></a> <a href="edit.php"><img src="crud-icon/edit.png" alt="image d'ajout"></a></td>
        </tr>
        <tr>
            <th scope="row"> </th>
            <td> </td>
            <td> </td>
            <td class="d-flex justify-content-center"> <a href="delete.php"><img src="crud-icon/delete.png" alt="image de suppression"></a> <a href="edit.php"><img src="crud-icon/edit.png" alt="image d'ajout"></a></td>
        </tr>
    </thead>

</table> -->
<!-- FIN DU FORMULAIRE -->

</html>