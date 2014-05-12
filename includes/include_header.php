<?php 
  include_once("login_logica.php");
    if(!isset($_SESSION['name'])){
        header ("Location: login.php");
    }

?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Restaurant Applicatie</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <script language="javascript" src="calendar/calendar.js"></script>

        <style type="text/css">
        body { font-size: 11px; font-family: "verdana"; }

        pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
        pre .comment { color: #008000; }
        pre .builtin { color:#FF0000;  }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript">
        // CHECK VOORGERECHT
        $(document).ready(function(){
            console.log('ready');
            $(".voorgerecht").on("blur", function(e){
            //var clickedLink = $(this);
            var gerechten = $(".voorgerecht").val();
            console.log(gerechten);
            $(".usernameFeedback").css("display","block");
            $.ajax({
                type: "POST",
                url: "ajax/check_gerecht.php",
                data: { gerechten: gerechten }
            })
                .done(function(result) {
                console.log(result);
                if(result == 'true')
                {
                    $(".voorgerechtFeedback").html("<p id='available'>Yup :), voorgerecht is available!</p>");                
                }
                else
                {
                    $(".voorgerechtFeedback").html("<p id='notavailable'>:( sorry, voorgerecht is already taken!</p>");
                }
            });

            e.preventDefault();
        });

        $(".voorgerecht").on("focus", function(e){
        $(".feedback").css("display","none");
        $(".error").css("display","none");
        });

        // CHECK HOOFDGERECHT
            console.log('ready');
            $(".hoofdgerecht").on("blur", function(e){
            //var clickedLink = $(this);
            var gerechten = $(".hoofdgerecht").val();
            console.log(gerechten);
            $(".usernameFeedback").css("display","block");
            $.ajax({
                type: "POST",
                url: "ajax/check_gerecht.php",
                data: { gerechten: gerechten }
            })
                .done(function(result) {
                console.log(result);
                if(result == 'true')
                {
                    $(".hoofdgerechtFeedback").html("<p id='available'>Yup :), hoofdgerecht is available!</p>");                
                }
                else
                {
                    $(".hoofdgerechtFeedback").html("<p id='notavailable'>:( sorry, hoofdgerecht is already taken!</p>");
                }
            });

            e.preventDefault();
        });

        $(".hoofdgerecht").on("focus", function(e){
        $(".feedback").css("display","none");
        $(".error").css("display","none");
        });

        // CHECK NAGERECHT

        console.log('ready');
            $(".nagerecht").on("blur", function(e){
            //var clickedLink = $(this);
            var gerechten = $(".nagerecht").val();
            console.log(gerechten);
            $(".usernameFeedback").css("display","block");
            $.ajax({
                type: "POST",
                url: "ajax/check_gerecht.php",
                data: { gerechten: gerechten }
            })
                .done(function(result) {
                console.log(result);
                if(result == 'true')
                {
                    $(".nagerechtFeedback").html("<p id='available'>Yup :), nagerecht is available!</p>");                
                }
                else
                {
                    $(".nagerechtFeedback").html("<p id='notavailable'>:( sorry, nagerecht is already taken!</p>");
                }
            });

            e.preventDefault();
        });

        $(".nagerecht").on("focus", function(e){
        $(".feedback").css("display","none");
        $(".error").css("display","none");
        });

        // CHECK DRANK

        console.log('ready');
            $(".drank").on("blur", function(e){
            //var clickedLink = $(this);
            var gerechten = $(".drank").val();
            console.log(gerechten);
            $(".usernameFeedback").css("display","block");
            $.ajax({
                type: "POST",
                url: "ajax/check_gerecht.php",
                data: { gerechten: gerechten }
            })
                .done(function(result) {
                console.log(result);
                if(result == 'true')
                {
                    $(".drankFeedback").html("<p id='available'>Yup :), drank is available!</p>");                
                }
                else
                {
                    $(".drankFeedback").html("<p id='notavailable'>:( sorry, drank is already taken!</p>");
                }
            });

            e.preventDefault();
        });

        $(".drank").on("focus", function(e){
        $(".feedback").css("display","none");
        $(".error").css("display","none");
        });

        // VOORGERECHT UPDATEN

     

        });
        </script>
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Restaurant App
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
               
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left info">
                            <p>Hello, <?php echo $_SESSION['name'] ?></p>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php">
                             <span>Home</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="reservatie.php">
                             <span>Reserveren</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="menu.php">
                             <span>Menu beheren</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="logout.php">
                             <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>