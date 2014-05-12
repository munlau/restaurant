<?php
    include_once("includes/include_header_bezoeker.php");
    include_once("includes/include_footer_bezoeker.php");
    include_once("restaurant_logica.php");
    $restaurant = $_GET['restaurant'];
    $_SESSION['restaurant'] = $restaurant;
    $restaurants = new Restaurant();
?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Beheerscherm
                        <small>restaurants</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box box-primary">
                               <div class="box-body">
                                    <ul class="todo-list">
                                        <h3 class="box-title">Lijst van alle restaurants</h3>
                                        <?php 
                                            $restaurants->getAllRestaurantsBezoeker(); 
                                        ?>
                                    </ul>
                                </div><!-- /.box-body -->
                    </div><!-- /.box -->
                     <div class="box box-primary">
                               <div class="box-body">
                                    <ul class="todo-list">
                                        <h3 class="box-title">Info gekozen restaurant</h3>
                                        <?php 
                                            $restaurants->getInfo(); 
                                        ?>
                                    </ul>
                                </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

