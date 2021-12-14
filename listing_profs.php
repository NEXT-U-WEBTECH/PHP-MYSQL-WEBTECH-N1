<?php
require_once 'connection.php';

$sql = 'SELECT id,nom,prenom,DATE_FORMAT(date_creation_profil, "%d/%m/%Y") AS  date_creation_profil FROM  profs ';
$retval = mysqli_query($conn, $sql);

$results = array();

// En cas d'erreur " Use of undefined constant MYSQLI_ASSOC - assumed 'MYSQLI_ASSOC' "  vous changez la constante  MYSQL_ASSOC  en MYSQLI_ASSOC
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {

    $results[] = $row;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'templates/head.php'; ?>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <?php include 'templates/menu.php'; ?>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <?php include 'templates/nav.php'; ?>
            <!-- Page content-->
            <div class="container-fluid" style="margin-top:2%">

                <a href="./add-fiche-prof.php"><button type="button" class="btn btn-primary">Ajouter une nouvelle fiche de prof</button> </a>

                <?php


                if (!$retval) {  ?>
                    <div class="alert alert-danger" role="alert">
                        <a href="#" class="alert-link">L'affichage a échoué</a>
                    </div>
                    <?php  } else {

                    if (count($results) > 0) {   ?>

                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOM</th>
                                    <th scope="col">PRENOM</th>
                                    <th scope="col">DATE CREATION PROFIL</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>

                            <?php
                            for ($i = 0; $i < count($results); $i++) {

                            ?>



                                <tbody>


                                    <?php

                                    ?>

                                    <tr>
                                        <th scope="row"><?= $results[$i]["id"]  ?> </th>
                                        <td><?= $results[$i]["nom"]  ?></td>
                                        <td><?= $results[$i]["prenom"]  ?></td>
                                        <td><?= $results[$i]["date_creation_profil"]  ?></td>

                                        <td><a href="./edit-fiche-prof.php?id_prof=<?= $results[$i]["id"] ?>"><button type="button" class="btn btn-primary">Modifier la fiche de prof</button> </a>

                                            <a href="./delete-fiche-prof.php?id_prof=<?= $results[$i]["id"] ?>"><button type="button" class="btn btn-primary">Supprimer la fiche de prof</button> </a>
                                        </td>


                                    </tr>

                                <?php   }   ?>

                                </tbody>

                        </table>


                    <?php  } else { ?>

                        <div class="alert alert-warning" role="alert" style="margin-top:2%">
                            <a href="#" class="alert-link">Aucune fiche n'est disponible</a>
                        </div>

                    <?php  } ?>

                <?php  }
                mysqli_close($conn);  ?>




            </div>
        </div>
    </div>
    <?php include 'templates/footer.php'; ?>
</body>

</html>