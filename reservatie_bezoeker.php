<?php
    include_once("includes/include_header_bezoeker.php");
    include_once("includes/include_footer_bezoeker.php");
    include_once("reserveer_logica.php");
    $restaurants = new Tafels();
?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Beheerscherm
                        <small>reservaties</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="reservatie.php">Reservatie</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box box-primary">
                               <div class="box-body">
                                    <ul class="todo-list">
                                        <h3 class="box-title">Reserveren</h3>
                                        <?php 
                                            $restaurants->getAllRestaurantsBezoeker(); 
                                        ?>
                                    </ul>
                                </div><!-- /.box-body -->
                               

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

