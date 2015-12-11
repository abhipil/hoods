<?php
require_once('includes/global.inc.php');
if (isset($_GET['c']) && isset($_GET['a'])) {
    $controller = $_GET['c'];
    $action = $_GET['a'];
} else {
    $controller = 'login';
    $action = 'login';
}
require_once('routes.php');
?>