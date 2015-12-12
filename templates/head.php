<head>
    <meta charset="utf-8">
    <title>Welcome to the hoods</title>
    <?php
    echo '<link rel="stylesheet" type="text/css" href="styles/' . $this->client->getstyle() . '.css" />';
    echo '<style type="text/css">.error {color: #FF0000;}</style>';
    ?>

    <?php
    if ($this->client->scriptspresent) {
        foreach ($this->client->getscript() as $script) {
            echo '<script type="text/javascript" src="scripts/';
            echo $script;
            echo '.js" ></script>';
        }
    }
    ?>

    <?php
    if ($this->client->showMap()) {
        echo '<script async defer ';
        echo "src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBJcflEGoe0V_Le0yzEiYhosX6rwAeZhAY&callback=initMap&libraries=places,geometry' >";
        echo '</script>';
        echo '<script ';
        echo 'src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" >';
        echo '</script>';
    }
    ?>

</head>
<body>