<?php
/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 12/24/15
 * Time: 11:44 PM
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
        #map {
            position: relative;
            height: 500px;
            width: 50%;
        }
        .list-group-horizontal .list-group-item {
            display: inline-block;
        }
        .list-group-horizontal .list-group-item {
            margin 0 auto:
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
    <script type="text/javascript" src="scripts/map1.js"></script>
    <script type="text/javascript" src="scripts/getblocks.js"></script>
    <?php
    if ($this->client->showMap()) {
        echo '<script async defer ';
        echo "src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBJcflEGoe0V_Le0yzEiYhosX6rwAeZhAY&callback=initMap&libraries=places,geometry' >";
        echo '</script>';
    }
    ?>
    <script type="text/javascript">

    </script>

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
                <a href="<?php
                echo $this->client->getLink('home', 'home');
                ?>" class="navbar-brand">Hoods</a>
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
                <form action="<?php
                        echo $this->client->getLink('home','search');
                    ?>" method="post" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a data-toggle="dropdown" role="button" class="dropdown-toggle" href="#" aria-haspopup="true"
                           aria-expanded="false">
                            <?php echo $this->client->username; ?>
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
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
                <a href="<?php
                if (!$this->client->notaMember)
                    echo $this->client->getLink('home', 'home', array('t' => 'dm',
                        'tid' => $this->client->userid));
                else
                    echo '';
                ?>">Direct Messages</a>
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
                <a href="<?php
                if (!$this->client->notaMember)
                    echo $this->client->getLink('home', 'home', array('t' => 'friends'));
                else
                    echo '';
                ?>">Friends</a>
            </li>
            <li>
                <a href="<?php
                if (!$this->client->notaMember)
                    echo $this->client->getLink('home', 'home', array('t' => 'neighbours'));
                else
                    echo '';
                ?>">Neighbours</a>
            </li>
            <li>
                <a href="<?php
                if (!$this->client->notaMember)
                    echo $this->client->getLink('home', 'home', array('t' => 'neighbours'));
                else
                    echo '';
                ?>">Post</a>
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
                    Checkout the block
                </h1>
            </div>
        </div>
        <div class="row">
            <h2 class="col-lg-12">
                <h2 class="text-center">
                    <?php
                        echo htmlspecialchars(trim($this->client->getBlockName()));
                    ?>
                </h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-lg-offset-3">
                <div id="map"></div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-6 col-lg-offset-3">

                <p class="text-center" style="font-size: 24px;">Membership Requests</p>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 text-center">
                        <div class="list-group list-group-horizontal">
                            <p class="list-group-item active pull-left" > Requestor</p>
                            <p class="list-group-item active" > Approvals</p>
                        </div>
                    </div>
                </div>
                <?php
                    $i = 0;
                    foreach ($this->client->getRequests(true) as $requests) {
                        echo "<div class=\"row\">"
                            ."<div class=\"col-xs-12 col-sm-12 col-md-8 col-lg-9 text-center\">"
                            ."<div class=\"list-group list-group-horizontal\">";
                        echo "<p "
                            ." class='list-group-item pull-left'>"
                            ."<a href='"
                            . $this->client->getLink('profile', 'user', array('u' => $requests['uname']))
                            ."'>"
                            .$requests['uname']
                            ."</a>"
                            ."</p>";
                        $j=0;
                        $params=array('r' =>$requests['reqid'],'p' =>4-$requests['approvals']);
//                        print_r($requests); die();
                        while($j<3) {
                            if(isset($requests['approve'.($j+1)])) {
                                echo "<p "
                                    . " class='list-group-item '>"
                                    . "<a href='"
                                    . $this->client->getLink('profile', 'user', array('u' => $this->client->getUsername($requests['approve' . ($j + 1)])))
                                    . "'>"
                                    . $this->client->getUsername($requests['approve' . ($j + 1)])
                                    . "</a>"
                                    . "</p>";
                                $params['a'.($j+1)]=$requests['approve'.($j+1)];
                            }
                            $j+=1;
                        }
                        $i++;
                        echo "<a href='"
                            .$this->client->getLink('block', 'approve', $params)
                            . "' class=\"list-group-item btn btn-info btn-sm btn-block\"><span class=\"glyphicon glyphicon-ok\"></span>"
                            . 'Approve'
                            . "</a>";
                        echo "</div>"
                            ."</div>"
                            ."</div>";
                    }
                    if ($i == 0) {
                        echo "<a href='#' class='list-group-item'>";
                        echo "No Active Requests";
                        echo "</a>";
                    }
                ?>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
</div>

<!-- jQuery -->
<script src="scripts/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/dialog.js" type="text/javascript"></script>
<script src="scripts/hamburger-cross.js" type="text/javascript"></script>
<script type="text/javascript">

    window.onload = function() {
            <?php
                $rows = $this->client->getAllBlockBounds($this->client->blockid);
            ?>
            var triangleCoords = [];
            <?php $i=0;
                foreach($rows as $row){
                    echo "triangleCoords.push({"
                        ."lat: parseFloat(".$row['lat']."),"
                        ."lng: parseFloat(".$row['lng'].")});\n";
                }
            ?>
            console.log(triangleCoords);
            setbounds(triangleCoords);
    };
</script>
</body>

</html>
