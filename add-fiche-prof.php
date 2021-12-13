<?php
require_once 'connection.php';

if(isset($_POST)  && !empty($_POST)){

      // var_dump($_POST);

      $control_form_err = false;

      if(! get_magic_quotes_gpc() ) {
        $nom = addslashes ($_POST['nom']);
        $prenom = addslashes ($_POST['prenom']);
        $date_creation = addslashes ($_POST['datepicker']);
     } else {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_creation = $_POST['datepicker'];
     }

     if(!empty($_POST['nom'])  &&  !empty($_POST['prenom'] ) && !empty($_POST['datepicker'])){

        $sql = "INSERT INTO profs ". "(nom, prenom, date_creation_profil) "."VALUES ". "('$nom','$prenom','$date_creation')";
        mysqli_select_db( $conn, 'profs' );
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
                $control_form_err = true;
         }

     }


  
  mysqli_close($conn);


}
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
                    <h2>Créer un nouveau profil enseignant</h2>

                <form  action ="<?php $_PHP_SELF ?>" method= "POST">


                    <?php   if(isset($_POST)  && !empty($_POST)){  ?>

                      <?php   if(!$control_form_err){  ?>

                      <div class="alert alert-success" role="alert">
                          <a href="#" class="alert-link">L'enregistrement a été effectuer avec succès</a>
                      </div>

                      <?php   }  ?> 

                      <?php   if($control_form_err){  ?>

                      <div class="alert alert-danger" role="alert">
                          <a href="#" class="alert-link">L'enregistrement a échoué</a>
                      </div>

                      <?php   }  ?>  

                    <?php   }  ?>  
                      <div class="form-group">
                           <label for="labelNom">Nom</label>
                           <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter le nom">
                           <?php   if(isset($_POST['nom'])  && empty($_POST['nom'])){  ?>

                            <div class="alert alert-danger" role="alert">
                                     <a href="#" class="alert-link">Le nom ne doit pas etre vide</a>
                             </div>

                           <?php   }  ?> 
                       
                       </div>
                       <div class="form-group">
                           <label for="labelPrenom">Prenom</label>
                           <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter le prenom">
                       
                       </div>

                       <?php   if(isset($_POST['prenom'])  && empty($_POST['prenom'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le prenom ne doit pas etre vide</a>
                          </div>

                       <?php   }  ?> 

                       <div class="form-group"  style="margin-bottom:1%">
                           <label for="labelDate">Date création profil</label>                         
                           <div class="input-group">
                                 <input type="date" placeholder="Choisir une date" class="form-control" id="datepicker" name="datepicker">        
                            </div>  
                            
                            <?php   if(isset($_POST['datepicker'])  && empty($_POST['datepicker'])){  ?>

                               <div class="alert alert-danger" role="alert">
                                   <a href="#" class="alert-link">La date ne doit pas etre vide</a>
                               </div>

                            <?php   }  ?> 
                       
                       </div>

                       <button type="submit" class="btn btn-primary">Enregister</button>
                 </form>
                   
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <?php  include 'templates/footer.php'; ?>
    </body>
</html>