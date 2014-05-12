<?php
    include_once("includes/include_header_bezoeker.php");
    include_once("includes/include_footer_bezoeker.php");
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
                                        <h3 class="box-title">Reserveren</h3>
                                        <?php 
                                            $restaurants->getAllReserverenBezoeker(); 
                                        ?>
                                    </ul>
                                </div><!-- /.box-body -->
                               
                    <div class="box box-primary">
                        <form action="" method="post">
                         <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                  <tr>
                                    <td>
                                      <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                        <tr>
                                          <td>
                                            <form name="form1" method="post" action="">
                                              <p class="largetxt"><b>Kies een datum</b></p>
                                              <table border="0" cellspacing="0" cellpadding="2">
                                                <tr>
                                                  <td nowrap>Datum :</td>
                                                  <td>
                                                    <?php
                                                      $myCalendar = new tc_calendar("date1", true);
                                                      $myCalendar->setIcon("calendar/images/iconCalendar.gif");
                                                      $myCalendar->setDate(date('d'), date('m'), date('Y'));
                                                      $myCalendar->setPath("calendar/");
                                                      $myCalendar->setYearInterval(2014, 2016);
                                                      $myCalendar->dateAllow('2014-01-01', '2020-03-01');
                                                      //$myCalendar->setHeight(350);
                                                      //$myCalendar->autoSubmit(true, "form1");
                                                      $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-13", "2011-04-25"), 0, 'month');
                                                      
                                                      //$myCalendar->rtl = true;
                                                      $myCalendar->writeScript();

                                                      

                                                      ?></td>
                                                  <td><input type="submit" name="createTafels" id="button" value="Bekijk de beschikbare tafels" ></td>
                                                </tr>
                                              </table>
                                </table>

                     
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Beschikbare tafels van 2 personen</h3>
                                    <?php  $tafel->gereserveerd2(); ?>
                                </div>
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                            <?php
                                                $tafel->som2();
                                                $tafel->getAllTafels2();
        
                                                $tafel->ReserverenTafel2();
                                            ?>
                                    </table>
                                </div>
                            </div>
                            <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title">Beschikbare tafels van 4 personen</h3>
                                    <?php  $tafel->gereserveerd4(); ?>
                                </div>
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                            <?php
                                                $tafel->som4();
                                                $tafel->getAllTafels4();
                                            ?>
                                    </table>
                                </div>
                            </div>
                            <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title">Beschikbare tafels van 6 personen</h3>
                                     <?php  $tafel->gereserveerd6(); ?>
                                </div>
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                            <?php
                                                $tafel->som6();
                                                $tafel->getAllTafels6();
                                            ?>
                                    </table>
                                </div>
                             </div>
                            <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title">Beschikbare tafels van 8 personen</h3>
                                     <?php  $tafel->gereserveerd8(); ?>
                                </div>
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                            <?php
                                                $tafel->som8();
                                                $tafel->getAllTafels8();
                                            ?>
                                    </table>
                                </div>
                            </div>
                        </form>
                </section>
            </aside>
        </div>

