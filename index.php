<?php
    include_once("includes/include_header.php");
    include_once("includes/include_footer.php");
    include_once("restaurant_logica.php");
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
                                        <h3 class="box-title">Jouw restaurants</h3>
                                        <?php 
                                            $restaurants->getAllRestaurants(); 
                                        ?>
                                    </ul>
                                </div><!-- /.box-body -->
                                <div class="box-header">
                                    <h3 class="box-title">Voeg restaurant toe</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="restaurantnaam">Restaurant naam:</label>
                                            <input type="text" class="form-control" name="restaurantnaam" id="restaurantnaam" placeholder="Enter restaurant naam">
                                        </div<
                                        <div class="form-group">
                                            <label for="restaurantstraat">Straat:</label>
                                            <input type="text" class="form-control" name="restaurantstraat" id="restaurantstraat" placeholder="Enter straat">
                                        </div>
                                        <div class="form-group">
                                            <label for="restaurantstad">Stad:</label>
                                            <input type="text" class="form-control" name="restaurantstad" id="restaurantstad" placeholder="Enter stad">
                                        </div>
                                        <div class="form-group">
                                            <label for="restauranttelefoon">Telefoonnummer:</label>
                                            <input type="text" class="form-control" name="restauranttelefoon" id="restauranttelefoon" placeholder="Enter telefoon">
                                        </div>
                                        <div class="form-group">
                                            <label for="restauranturen">Openingsuren:</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="restauranturen"></textarea>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-primary" name="btntoevoegen" id="btntoevoegen" value="Toevoegen" />
                                    </div>
                                </form>
                            </div><!-- /.box -->
                   


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

