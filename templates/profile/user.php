<?php
/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 12/24/15
 * Time: 8:22 AM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="styles/simple-sidebar.css" rel="stylesheet">
    <style type="text/css">

        /*-------------------------------*/
        /*     Sidebar nav styles        */
        /*-------------------------------*/

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 220px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sidebar-nav li {
            position: relative;
            line-height: 20px;
            display: inline-block;
            width: 100%;
        }

        .sidebar-nav li:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            height: 100%;
            width: 3px;
            background-color: #1c1c1c;
            -webkit-transition: width .2s ease-in;
            -moz-transition: width .2s ease-in;
            -ms-transition: width .2s ease-in;
            transition: width .2s ease-in;

        }

        .sidebar-nav li:first-child a {
            color: #fff;
            background-color: #1a1a1a;
        }

        .sidebar-nav li:nth-child(2):before {
            background-color: #ec1b5a;
        }

        .sidebar-nav li:nth-child(3):before {
            background-color: #79aefe;
        }

        .sidebar-nav li:nth-child(4):before {
            background-color: #314190;
        }

        .sidebar-nav li:nth-child(5):before {
            background-color: #279636;
        }

        .sidebar-nav li:nth-child(6):before {
            background-color: #7d5d81;
        }

        .sidebar-nav li:nth-child(7):before {
            background-color: #ead24c;
        }

        .sidebar-nav li:nth-child(8):before {
            background-color: #2d2366;
        }

        .sidebar-nav li:nth-child(9):before {
            background-color: #35acdf;
        }

        .sidebar-nav li:hover:before,
        .sidebar-nav li.open:hover:before {
            width: 100%;
            -webkit-transition: width .2s ease-in;
            -moz-transition: width .2s ease-in;
            -ms-transition: width .2s ease-in;
            transition: width .2s ease-in;

        }

        .sidebar-nav li a {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 10px 15px 10px 30px;
        }

        .sidebar-nav li a:hover,
        .sidebar-nav li a:active,
        .sidebar-nav li a:focus,
        .sidebar-nav li.open a:hover,
        .sidebar-nav li.open a:active,
        .sidebar-nav li.open a:focus {
            color: #fff;
            text-decoration: none;
            background-color: transparent;
        }

        .sidebar-nav > .sidebar-brand {
            height: 65px;
            font-size: 20px;
            line-height: 44px;
        }

        .sidebar-nav .dropdown-menu {
            position: relative;
            width: 100%;
            padding: 0;
            margin: 0;
            border-radius: 0;
            border: none;
            background-color: #222;
            box-shadow: none;
        }

        /*-------------------------------*/
        /*       Hamburger-Cross         */
        /*-------------------------------*/

        .hamburger {
            position: fixed;
            top: 60px;
            z-index: 999;
            display: block;
            width: 32px;
            height: 32px;
            margin-left: 15px;
            background: transparent;
            border: none;
        }

        .hamburger:hover,
        .hamburger:focus,
        .hamburger:active {
            outline: none;
        }

        .hamburger.is-closed:before {
            content: '';
            display: block;
            width: 100px;
            font-size: 14px;
            color: #fff;
            line-height: 32px;
            text-align: center;
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed:hover:before {
            opacity: 1;
            display: block;
            -webkit-transform: translate3d(-100px, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed .hamb-top,
        .hamburger.is-closed .hamb-middle,
        .hamburger.is-closed .hamb-bottom,
        .hamburger.is-open .hamb-top,
        .hamburger.is-open .hamb-middle,
        .hamburger.is-open .hamb-bottom {
            position: absolute;
            left: 0;
            height: 4px;
            width: 100%;
        }

        .hamburger.is-closed .hamb-top,
        .hamburger.is-closed .hamb-middle,
        .hamburger.is-closed .hamb-bottom {
            background-color: #1a1a1a;
        }

        .hamburger.is-closed .hamb-top {
            top: 5px;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed .hamb-middle {
            top: 50%;
            margin-top: -2px;
        }

        .hamburger.is-closed .hamb-bottom {
            bottom: 5px;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed:hover .hamb-top {
            top: 0;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed:hover .hamb-bottom {
            bottom: 0;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-open .hamb-top,
        .hamburger.is-open .hamb-middle,
        .hamburger.is-open .hamb-bottom {
            background-color: #1a1a1a;
        }

        .hamburger.is-open .hamb-top,
        .hamburger.is-open .hamb-bottom {
            top: 50%;
            margin-top: -2px;
        }

        .hamburger.is-open .hamb-top {
            -webkit-transform: rotate(45deg);
            -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
        }

        .hamburger.is-open .hamb-middle {
            display: none;
        }

        .hamburger.is-open .hamb-bottom {
            -webkit-transform: rotate(-45deg);
            -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
        }

        .hamburger.is-open:before {
            content: '';
            display: block;
            width: 100px;
            font-size: 14px;
            color: #fff;
            line-height: 32px;
            text-align: center;
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-open:hover:before {
            opacity: 1;
            display: block;
            -webkit-transform: translate3d(-100px, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        #floating-panel input[type="textbox"] {
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
            -moz-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
            -ms-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
            -o-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
            box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -ms-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
            background: #eae7e7 url(../icons/map.png) no-repeat;
            border: 1px solid #c8c8c8;
            color: #777;
            font: 13px Helvetica, Arial, sans-serif;
            float: left;
            margin: auto 10px 10px 0;
            padding: 15px 10px 15px 40px;
            width: 60%;
        }

        #floating-panel input[type="textbox"]:focus {
            -webkit-box-shadow: 0 0 2px #ed1c24 inset;
            -moz-box-shadow: 0 0 2px #ed1c24 inset;
            -ms-box-shadow: 0 0 2px #ed1c24 inset;
            -o-box-shadow: 0 0 2px #ed1c24 inset;
            box-shadow: 0 0 2px #ed1c24 inset;
            background-color: #fff;
            border: 1px solid #ed1c24;
            outline: none;
        }

        .sidebar-right {
            height: 100px;
            right: 0;
            float: right;
        }

        /*-- List groups --*/
        .list-group {
            width: 200px;
        }

        .bs-example {
            margin: 20px;
        }
        #map {
            position: relative;
            height: 500px;
            width: 50%;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="scripts/map.js"></script>
    <script type="text/javascript" src="scripts/getblocks.js"></script>
    <?php
    if ($this->client->showMap()) {
        echo '<script async defer ';
        echo "src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBJcflEGoe0V_Le0yzEiYhosX6rwAeZhAY&callback=initMap&libraries=places,geometry' >";
        echo '</script>';
    }
    ?>

</head>

<body>

<div id="wrapper">

    <nav role="navigation" class="navbar navbar-default navbar-static-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Hoods</a>
            </div>
            <!-- Collection of nav links and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse fixed">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php
                        echo $this->client->getLink('home', 'home');
                        ?>">Home</a></li>
                    <li><a href="
                    <?php
                        echo $this->client->getLink('profile', 'page');
                        ?>">Profile</a></li>
                    <li><a href="#">Block</a></li>
                    <li><a href="
                    <?php
                        echo $this->client->getLink('home', 'post');
                        ?>
                    ">Post</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <?php echo $this->client->username; ?>
                            <b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="#">Signout</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Signout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Left Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="<?php
                echo $this->client->getLink('home', 'home');
                ?>">
                    HOODS
                </a>
            </li>
            <li>
                <a href="#">Direct Messages</a>
            </li>
            <li>
                <a href="
                <?php
                if (!$this->client->notaMember)
                    echo $this->client->getLink('home', 'home', array('t' => 'block',
                        'tid' => $this->client->blockid));
                else
                    echo '';
                ?>">Block</a>
            </li>
            <li>
                <a href="#">Friends</a>
            </li>
            <li>
                <a href="#">Neighbours</a>
            </li>
            <li>
                <a href="#">Post</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->
    <button type="button" class="hamburger is-open" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
    </button>
    <!-- Page Content -->
    <div id="page-content-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">
                    Hi, I'm <?php $row=$this->client->getName($this->client->user['uid']);
                                    echo $row['fname']." ".$row['lname']; ?>
                </h1>
                <div class="span12">
                    <input class="img-responsive center-block" type="image" src="images/anon1.jpg" alt="Anon Pic" style="width:400px;height:400px;">
                    <input type="file" id="my_file" accept="image/*" style="display: none;" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-lg-offset-3 ">
                <button id="friend" type="button" onclick="reqfre()" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-user"></span>
                    Request Friendship
                </button>
            </div>
            <div class="col-lg-3 col-lg-offset-1 ">
                <button id="neighbour" type="button" onclick="neigh()" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-home"></span>
                    Be my Neighbour
                </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <label for="comment" style="font-size:24px">Description</label>
                    <textarea readonly class="form-control" rows="5" style="font-size:18px id="comment">
                    <?php
                    echo htmlspecialchars(trim($this->client->getProfile($this->client->user['uid'])['pdesc']));
                    ?>
                    </textarea>
                </div>
            </div>
        </div>
        <!-- /#row -->
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="scripts/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/dialog.js" type="text/javascript"></script>
<script src="scripts/hamburger-cross.js" type="text/javascript"></script>
<script type="text/javascript">
    function reqfre(){
        $.ajax({
            url: 'https://127.0.0.1/hoods/index.php?c=profile&a=friends&friendid=<?php echo $this->client->user['uid']; ?>',
            success: function (data) {
                if(data){
                    console.log(data);
                    document.getElementById('friend').className="btn btn-warning btn-lg";
                }
            },
            data: {
                format: 'json'
            },
            error: function (data) {
                console.log(JSON.stringify(data));
            },
            type: 'GET'
        });
    }
    function neigh(){
        $.ajax({
            url: 'https://127.0.0.1/hoods/index.php?c=profile&a=friends&neighbourid=<?php echo $this->client->user['uid']; ?>',
            success: function (data) {
                if(data){
                    console.log(data);
                    document.getElementById('neighbour').className="btn btn-warning btn-lg";
                }
            },
            data: {
                format: 'json'
            },
            error: function (data) {
                console.log(JSON.stringify(data));
            },
            type: 'GET'
        });
    }
</script>
</body>

</html>
