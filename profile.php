<?php
    include_once("includes/include_header.php");
    include_once("includes/include_footer.php");
    include_once("create_logica.php");
    include_once("restaurant_logica.php");
    require_once('calendar/classes/tc_calendar.php');
    include_once("reserveer_logica.php");
    include_once("uitvoeren.php");
    $restaurant = $_GET['restaurant'];
    $_SESSION['restaurant'] = $restaurant;
    $tafel = new Tafels();
    $restaurants = new Restaurant();

?>

    <body class="skin-black">

            <aside class="right-side">
                <section class="content-header">
                        <div class="box box-primary">
                            <div class="box-body">
                                            <ul class="todo-list">
                                                <h3 class="box-title">Jouw restaurants</h3>
                                                <?php 
                                                    $restaurants->getAllRestaurants(); 
                                                ?>
                                            </ul>
                            </div><!-- /.box-body -->
                        </div>
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
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Aanmaak tafels voor je restaurant <?php echo $restaurant?></h3> 
                            </div>
                            <div class="box-body">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Tafels van 2</label>
                                        <input type="text" class="form-control" name="Hoeveelheid2" placeholder="Hoeveelheid"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Tafels van 4</label>
                                        <input type="text" class="form-control" name="Hoeveelheid4" placeholder="Hoeveelheid"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Tafels van 6</label>
                                        <input type="text" class="form-control" name="Hoeveelheid6" placeholder="Hoeveelheid"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Tafels van 8</label>
                                        <input type="text" class="form-control" name="Hoeveelheid8" placeholder="Hoeveelheid"/>
                                    </div>
                                        <div class="box-footer clearfix">
                                            <input type="submit" class="pull-right btn btn-default" id="btncreate" name="btncreate" value="Aanmaken tafels">
                                        </div>
                                </form>
                            </div>
                        </div>
                </section>
            </aside>
        </div>

