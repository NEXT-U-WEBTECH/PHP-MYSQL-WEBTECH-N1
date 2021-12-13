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
                <div class="container-fluid" style="margin-top:2%">

                    <a href="./add-fiche-prof.php"><button type="button" class="btn btn-primary">Ajouter une nouvelle fiche de prof</button> </a>   

                    <?php

                       $sql = "SELECT id,nom,prenom,date_creation_profil FROM  profs ";
                       $retval = mysqli_query( $conn, $sql );
                       if(! $retval ) {  ?>
                          <div class="alert alert-danger" role="alert">
                                  <a href="#" class="alert-link">L'affichage  a échoué</a>
                           </div>
                       <?php  }else{   ?>


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
                             <tbody>
                                 
                                  <?php   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {  ?>

                                    <tr>
                                        <th scope="row"><?= $row["id"]  ?> </th>
                                        <td><?= $row["nom"]  ?></td>
                                        <td><?= $row["prenom"]  ?></td>
                                        <td><?= $row["date_creation_profil"]  ?></td>

                                        <td><a href="./edit-fiche-prof.php?id_prof=<?= $row["id"] ?>"><button type="button" class="btn btn-primary">Modifier la fiche de prof</button> </a> 

                                        <a href="./delete-fiche-prof.php?id_prof=<?= $row["id"] ?>"><button type="button" class="btn btn-primary">Supprimer la fiche de prof</button> </a>   </td>

                                        
                                    </tr>
                   
                                   <?php   }   ?>                             
                           
                            
                             </tbody>

                            </table> 

                           <?php   }   ?>

                      
                          <?php mysqli_close($conn);    ?>                       
                     
                </div>
            </div>
        </div>
        <?php  include 'templates/footer.php'; ?>
    </body>
</html>