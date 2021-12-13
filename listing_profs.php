<?php
require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
         <?php  include 'templates/head.php'; ?>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
            <?php  include 'templates/menu.php'; ?>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                  <?php  include 'templates/nav.php'; ?>
                <!-- Page content-->
                <div class="container-fluid">

                    <a href="./add-fiche-prof.php"><button type="button" class="btn btn-primary">Ajouter une nouvelle fiche de prof</button> </a>   
                   
                </div>
            </div>
        </div>
        <?php  include 'templates/footer.php'; ?>
    </body>
</html>