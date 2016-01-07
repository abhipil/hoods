<?php
function call($controller, $action)
{
    require_once('controllers/' . $controller . '_controller.php');
    require_once('models/' . $controller . '_model.php');
    require_once('views/' . $controller . '_view.php');

    $params = NULL;
    $_controller = $controller;
    //$view=null;
    //$var = ucfirst($controller.'Model');
    //$client = eval("new $var()");
//    if (isset($_GET['page_error']))
//        $params = $_GET['page_error'];
//    else {
        if (isset($_GET['lat']))
            $params = array($_GET['lat'], $_GET['lng']);
        else {
            if (isset($_GET))
                $params = $_GET;
        }
//    }
    switch ($controller) {
        case 'login':
            $client = new LoginModel();
            $view = new LoginView($client);
            $controller = new LoginController($client);
            break;
        case 'register':
            $client = new RegisterModel();
            $controller = new RegisterController($client);
            $view = new RegisterView($client);
            break;
        case 'home':
            $client = new HomeModel();
            $controller = new HomeController($client);
            $view = new HomeView($client);
            break;
        case 'profile':
            $client = new ProfileModel();
            $controller = new ProfileController($client);
            $view = new ProfileView($client);
            break;
        case 'block':
            $client = new BlockModel();
            $controller = new BlockController($client);
            $view = new BlockView($client);
            break;
    }

    $controller->{$action}($params);
    $view->{$_controller}($params);
}

// we're adding an entry for the new controller and its actions
$controllers = array('login' => ['login', 'trylogin', 'updatevisittim'],
    'register' => ['register', 'tryreg', 'address', 'validaddr', 'jsonblocks', 'block'],
    'home' => ['search','thread','post', 'profile', 'home'],
    'profile' => ['page','uploadPic','user','friends'],
    'post' => ['post'],
    'block' => ['block','approve']
);
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('page', 'error');
    }
} else {
    call('page', 'error');
}
?>