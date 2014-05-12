<?php
    include_once("includes/include_header.php");
    include_once("includes/include_footer.php");
    include_once("create_logica.php");
    $restaurant = $_GET['restaurant'];
    $_SESSION['restaurant'] = $restaurant;
    echo $feedback;

      if(isset($_POST['submit']) && empty($_POST['gerecht']))
      {
        $feedback = 'Je moet een gerecht invullen!';
      }

      if(!empty($_POST['gerecht']))
      {

        $gerecht = new Menu();
        $gerecht->Username = $_POST['gerecht'];

        $available = $gerecht->gerechtAvailable();
        if($available == true)
        {

          $gerecht->Save(); //INSERT USER INTO TABLE

          if(isset($gerecht->errors) && !empty($gerecht->errors))
          {
            if(isset($gerecht->errors['errorCreate']))
            {
              $error = $gerecht->errors['errorCreate'];
            }
          }
          else
          {
            $feedback = $gerecht->feedbacks['Signedup'];
          }
        }
        else
        {
          if(isset($gerecht->errors) && !empty($gerecht->errors))
          {
            if(isset($gerecht->errors['errorAvailable']))
            {
              $error = $gerecht->errors['errorAvailable'];
            }
          }
        }

      }


    $gerecht = new Menu();
?>
    <body class="skin-black">
            <aside class="right-side">
                <section class="content-header">
                    <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Aanmaak menu</h3> 
                            </div>
                            <div class="box-body">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Voorgerechten</label>
                                        <input type="text"  class="voorgerecht activitymessage form-control" name="gerecht" placeholder="Voorgerecht"/>
                                        <div class="voorgerechtFeedback"></div>
                                        <input type="text"  class="activitymessage2 form-control" name="gerechtprijs" placeholder="Prijs"/>
                                        <input type="hidden"  class="activitymessage3" value=<?php echo "'" . $_SESSION['restaurant'] . "'" ?> />
                                        <div class="box-footer clearfix">
                                            <input type="submit" class="voorgerecht-knop pull-right btn btn-default" id="btnvoorgerecht" name="btnvoorgerecht" value="Voorgerecht aanmaken">
                                        </div>
                                    </div>
                                </form>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Hoofdgerechten</label>
                                        <input type="text" class="hoofdgerecht gerecht form-control" name="gerecht" placeholder="Hoofdgerecht"/>
                                        <div class="hoofdgerechtFeedback"></div>
                                        <input type="text" class="form-control" name="gerechtprijs" placeholder="Prijs"/>

                                        <div class="box-footer clearfix">
                                            <input type="submit" class="pull-right btn btn-default" id="btnhoofdgerecht" name="btnhoofdgerecht" value="Hoofdgerecht aanmaken">
                                        </div>
                                    </div>
                                </form>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Nagerechten</label>
                                        <input type="text" class="nagerecht form-control" name="gerecht" placeholder="Nagerecht"/>
                                        <div class="nagerechtFeedback"></div>
                                        <input type="text" class="form-control" name="gerechtprijs" placeholder="Prijs"/>

                                        <div class="box-footer clearfix">
                                            <input type="submit" class="pull-right btn btn-default" id="btnnagerecht" name="btnnagerecht" value="Nagerecht aanmaken">
                                        </div>
                                    </div>
                                </form>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Dranken</label>
                                        <input type="text" class="drank form-control" name="gerecht" placeholder="Drank"/>
                                        <div class="drankFeedback"></div>
                                        <input type="text" class="form-control" name="gerechtprijs" placeholder="Prijs"/>

                                        <div class="box-footer clearfix">
                                            <input type="submit" class="pull-right btn btn-default" id="btndrank" name="btndrank" value="Drank aanmaken">
                                        </div>
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                  
                            <div class="box">
                                <div class="box-header">
                                    <h2 class="box-title">Overzicht menu</h2>
                                </div>
                                <div class="box-header">
                                    <h3 class="box-title" id="headerbold">Voorgerechten</h3>
                                </div>
                                <div class="box-body no-padding">
                                    
                                            <?php
                                                $gerecht->Delete();
                                                $gerecht->getAllVoorgerechten();
                                            ?>
                                    
                                </div>
                            </div>
                            <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title" id="headerbold">Hoofdgerechten</h3>
                                </div>
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                            <?php
                                                $gerecht->getAllHoofdgerechten();
                                            ?>
                                    </table>
                                </div>
                            </div>
                            <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title" id="headerbold">Nagerechten</h3>
                                </div>
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                            <?php
                                                $gerecht->getAllNagerechten();
                                            ?>
                                    </table>
                                </div>
                             </div>
                            <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title" id="headerbold">Dranken</h3>
                                </div>
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                            <?php
                                                $gerecht->getAllDranken();
                                            ?>
                                    </table>
                                </div>
                            </div>
                       
                </section>
            </aside>
        </div>

