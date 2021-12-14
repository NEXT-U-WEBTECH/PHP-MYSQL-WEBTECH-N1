<?php

require_once 'connection.php';

$id_prof = $_GET["id_prof"];

$control_form_err = false;

$show_form = true;

if (empty($id_prof)) {

    header('Location:  listing_profs.php');
    exit;
}

$sql = " SELECT id,nom,prenom,date_creation_profil FROM  profs  WHERE id='" . $id_prof . "' ";

$retval = mysqli_query($conn, $sql);

$results = array();
if ($retval) {

    while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        $results[] = $row;
    }

    if (count($results) <= 0) {

        header('Location:  listing_profs.php');
        exit;
    }
}

if (isset($_POST)  && !empty($_POST)) {

    // var_dump($_POST);

    $sql = 'DELETE FROM profs where id=' . $id_prof;


    if (!empty($_POST['yes_delete'])) {


        $show_form = false;

        $retval = mysqli_query($conn, $sql);

        if (!$retval) {

            $control_form_err = true;
        }
    } else {

        header('Location:  listing_profs.php');
        exit;
    }
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

                <h2>Message de confirmation de suppression de la fiche [<?= $results[0]["nom"] . '.' . $results[0]["prenom"] ?>]</h2>

                <div class="row">

                    <?php if (!$show_form) {   ?>

                        <?php if (!$control_form_err) {   ?>

                            <div class="alert alert-success" role="alert">
                                <a href="#" class="alert-link">La suppression a été effectuer avec succès</a>
                            </div>

                        <?php }   ?>

                    <?php }   ?>

                    <?php if ($show_form) {   ?>

                        <table style="margin-left:20%;width:10%;margin-top:2%">

                            <tr>

                                <td>

                                    <form name="confirmDeleteNon" action="<?php $_PHP_SELF ?>" method="POST">

                                        <button type="submit" btn btn-primary btn-lg btn-block" name="non_delete" value="0">NOM</button>

                                        <input type="hidden" name="id_prof" value="<?= $id_prof ?>" />


                                    </form>


                                </td>

                                <td>

                                    <form name="confirmDeleteYes" action="<?php $_PHP_SELF ?>" method="POST">

                                        <button type="submit" btn btn-primary btn-lg btn-block name="yes_delete" value="1">OUI</button>

                                        <input type="hidden" name="id_prof" value="<?= $id_prof ?>" />


                                    </form>

                                </td>
                            </tr>
                        </table>

                    <?php }   ?>
                </div>

            </div>
        </div>
    </div>
    <?php include 'templates/footer.php'; ?>
</body>

</html>