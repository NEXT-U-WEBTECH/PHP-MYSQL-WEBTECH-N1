<?php
require_once 'connection.php';


$sql = "SELECT * FROM profs";

$results = mysqli_query($conn, $sql);		 

$nbr_profs = $results->num_rows;

?>

<!DOCTYPE html>
<html lang="en">

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
            <div class="container-fluid">

                <div class="jumbotron"  style="margin-top:5%">
                    <div class="row w-100">
                        <div class="col-md-3">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="card border-info shadow text-info p-3 my-card" style="width:20%;margin-bottom:5%"><img src="assets/img/users_icon.png" /></div>
                               
                                <div class="text-succes" style="width:30%;margin-top:15%;margin-bottom:5%;margin-left:49%">
                                   <h1> <?= $nbr_profs; ?></h1>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="card border-success mx-sm-1 p-3">
                                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                                <div class="text-success text-center mt-3">
                                    <h4>Eyes</h4>
                                </div>
                                <div class="text-success text-center mt-2">
                                    <h1>9332</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-danger mx-sm-1 p-3">
                                <div class="card border-danger shadow text-danger p-3 my-card"><span class="fa fa-heart" aria-hidden="true"></span></div>
                                <div class="text-danger text-center mt-3">
                                    <h4>Hearts</h4>
                                </div>
                                <div class="text-danger text-center mt-2">
                                    <h1>346</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-warning mx-sm-1 p-3">
                                <div class="card border-warning shadow text-warning p-3 my-card"><span class="fa fa-inbox" aria-hidden="true"></span></div>
                                <div class="text-warning text-center mt-3">
                                    <h4>Inbox</h4>
                                </div>
                                <div class="text-warning text-center mt-2">
                                    <h1>346</h1>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include 'templates/footer.php'; ?>
</body>

</html>