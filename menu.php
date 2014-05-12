<?php
    include_once("includes/include_header.php");
    include_once("includes/include_footer.php");
    include_once("create_logica.php");
    $restaurants = new Menu();
?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Beheerscherm 
                        <small>menu</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="menu.php">Menu</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box box-primary">
                               <div class="box-body">
                                    <ul class="todo-list">
                                        <h3 class="box-title">Beheer menu</h3>
                                        <?php 
                                            $restaurants->getAllRestaurants(); 
                                        ?>
                                    </ul>
                                </div><!-- /.box-body -->
                               

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

